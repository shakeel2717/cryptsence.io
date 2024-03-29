<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllUser extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('username')
            ->addColumn('ctse', function (User $model) {
                return balance('ctse', $model->id);
            })
            ->addColumn('usdt', function (User $model) {
                return balance('usdt.trc20', $model->id);
            })
            ->addColumn('usdttotal', function (User $model) {
                return balanceIn('usdt.trc20', $model->id);
            })
            ->addColumn('reward', function (User $model) {
                return number_format(ReferralBalance($model->id), 2);
            })
            ->addColumn('business', function (User $model) {
                return myPurchase($model->id);
            })
            ->addColumn('refer')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->makeInputRange(),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('USERNAME', 'username')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('CTSE', 'ctse'),
            Column::make('USDT', 'usdt'),
            Column::make('USDT Total', 'usdttotal'),
            Column::make('Reward', 'reward'),
            Column::make('Business', 'business'),


            Column::make('REFER', 'refer')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', 'Login')
                ->class('bg-theme-9 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
                ->target("")
                ->route('admin.user.login', ['id' => 'id']),

                Button::make('suspend', 'Suspend')
                ->class('btn btn-danger')
                ->emit('suspend', ['id' => 'id']),

            Button::make('activate', 'Activate')
                ->class('btn btn-success')
                ->emit('activate', ['id' => 'id']),


            Button::make('winner', 'Winner')
                ->class('bg-theme-1 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
                ->target("")
                ->route('admin.user.winner', ['user' => 'id']),

            // Button::make('destroy', 'Delete')
            //     ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //     ->route('user.destroy', ['user' => 'id'])
            //     ->method('delete')
        ];
    }



    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'suspend',
                'activate',
            ]
        );
    }


    public function suspend($id)
    {
        $user = User::find($id['id']);
        $user->status = "suspend";
        $user->save();
    }


    public function activate($id)
    {
        $user = User::find($id['id']);
        $user->status = "activate";
        $user->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */

    
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            // Rule::button('edit')
            //     ->when(fn($user) => $user->id === 1)
            //     ->hide(),


            //Hide button edit for ID 1
            Rule::button('suspend')
                ->when(fn ($user) => $user->status === "suspend")
                ->hide(),

            Rule::button('activate')
                ->when(fn ($user) => $user->status === "activate" || $user->status === "pending")
                ->hide(),
        ];
    }
    
}
