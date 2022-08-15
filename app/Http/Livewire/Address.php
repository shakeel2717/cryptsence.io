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
        if ($this->address0 != "") {
            $user = User::find(auth()->user()->id);
            // checking if this is already in use
            $security0 = User::where('address0', $this->address0)->count();
            $security1 = User::where('address1', $this->address0)->count();
            $security2 = User::where('address2', $this->address0)->count();
            $this->emit('eventName');
            if ($security0 > 0 || $security1 > 0 || $security2 > 0) {
                $this->address0 = "";
                $this->emit('address0Duplicate');
            } else {
                $user->address0 = $this->address0;
                $user->save();
                $this->emit('addressSaved');
            }
        } else {
            $user = User::find(auth()->user()->id);
            $user->address0 = $this->address0;
            $user->save();
            $this->emit('addressRemoved');
        }
    }

    public function address1()
    {
        if ($this->address1 != "") {
            $user = User::find(auth()->user()->id);
            // checking if this is already in use
            $security0 = User::where('address0', $this->address1)->count();
            $security1 = User::where('address1', $this->address1)->count();
            $security2 = User::where('address2', $this->address1)->count();
            $this->emit('eventName');
            if ($security0 > 0 || $security1 > 0 || $security2 > 0) {
                $this->address1 = "";
                $this->emit('address0Duplicate');
            } else {
                $user->address1 = $this->address1;
                $user->save();
                $this->emit('addressSaved');
            }
        } else {
            $user = User::find(auth()->user()->id);
            $user->address1 = $this->address1;
            $user->save();
            $this->emit('addressRemoved');
        }
    }

    public function address2()
    {
        if ($this->address2 != "") {
            $user = User::find(auth()->user()->id);
            // checking if this is already in use
            $security0 = User::where('address0', $this->address2)->count();
            $security1 = User::where('address1', $this->address2)->count();
            $security2 = User::where('address2', $this->address2)->count();
            $this->emit('eventName');
            if ($security0 > 0 || $security1 > 0 || $security2 > 0) {
                $this->address2 = "";
                $this->emit('address0Duplicate');
            } else {
                $user->address2 = $this->address2;
                $user->save();
                $this->emit('addressSaved');
            }
            
        } else {
            $user = User::find(auth()->user()->id);
            $user->address2 = $this->address2;
            $user->save();
            $this->emit('addressRemoved');
        }
    }

    public function render()
    {
        return view('livewire.address');
    }
}
