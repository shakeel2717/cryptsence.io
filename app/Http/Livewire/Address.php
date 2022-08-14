<?php

namespace App\Http\Livewire;

use App\Models\CtseAddress;
use App\Models\User;
use Livewire\Component;

class Address extends Component
{
    public $address0;
    public $address1;
    public $address2;

    public function mount()
    {
        $this->address0 = auth()->user()->address0;
        $this->address1 = auth()->user()->address1;
        $this->address2 = auth()->user()->address2;
    }

    public function address0()
    {
        $user = User::find(auth()->user()->id);
        $user->address0 = $this->address0;
        $user->save();
    }

    public function address1()
    {
        $user = User::find(auth()->user()->id);
        $user->address1 = $this->address1;
        $user->save();
    }

    public function address2()
    {
        $user = User::find(auth()->user()->id);
        $user->address2 = $this->address2;
        $user->save();
    }
    
    public function render()
    {
        return view('livewire.address');
    }
}
