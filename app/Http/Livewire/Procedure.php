<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Procedure extends Component
{
    public $conuter = 0;

    public function increment()
    {
        $this->conuter++;
    }
    public function render()
    {
        return view('livewire.procedure');
    }
}
