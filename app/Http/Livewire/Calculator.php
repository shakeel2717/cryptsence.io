<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{

    public $total = 0;
    public $amount = 100;
    public $duration = 7;

    public function mount()
    {
        $this->total = calculator($this->amount, $this->duration);
    }

    public function updated()
    {
        $this->total = calculator($this->amount, $this->duration);

    }

    public function render()
    {
        return view('livewire.calculator');
    }
}
