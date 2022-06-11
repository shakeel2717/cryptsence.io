<?php

namespace App\Http\Livewire\admin;

use App\Models\user\Withdraw;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PendingWithdraw extends PowerGridComponent
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
     * @return Builder<\App\Models\user\Withdraw>
     */
    public function datasource(): Builder
    {
        return Withdraw::query()
            ->join('users', 'users.id', '=', 'withdraws.user_id')
            ->join('coins', 'coins.id', '=', 'withdraws.coin_id')
            ->select('withdraws.*', 'users.name as user_name', 'coins.name as coin_name')
            ->where('withdraws.status', 'pending');
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
        return [
            "User" => [
                'name'
            ],
            "Coin" => [
                'name'
            ],
        ];
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
            ->addColumn('user_id')
            ->addColumn('coin_id')
            ->addColumn('amount')
            ->addColumn('address')
            ->addColumn('created_at_formatted', fn (Withdraw $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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

            Column::make('USER', 'user_name')
                ->makeInputRange(),

            Column::make('COIN', 'coin_name')
                ->makeInputRange(),

            Column::make('AMOUNT', 'amount')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('ADDRESS', 'address')
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
     * PowerGrid Withdraw Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', 'Approve')
                ->class('cursor-pointer text-white px-3 bg-theme-9 py-2 m-1 rounded text-sm')
                ->route('admin.withdrawals.approve', ['id' => 'id'])
                ->target(""),

            Button::make('edit', 'Reject')
                ->class('cursor-pointer text-white px-3 bg-theme-6 py-2 m-1 rounded text-sm')
                ->route('admin.withdrawals.reject', ['id' => 'id'])
                ->target(""),

            // Button::make('destroy', 'Reject')
            //     ->class('cursor-pointer text-white px-3 bg-theme-6 py-2 m-1 rounded text-sm')
            //     ->route('admin.withdrawals.reject', ['id' => 'id'])
            //     ->method('delete')
            //     ->target(""),

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Withdraw Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($withdraw) => $withdraw->id === 1)
                ->hide(),
        ];
    }
    */
}