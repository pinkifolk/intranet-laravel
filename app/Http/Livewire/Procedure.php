<?php

namespace App\Http\Livewire;

use App\Models\Procedures;
use Livewire\Component;

class Procedure extends Component
{
    public $search;
    public function render()
    {
        $getProcesures = Procedures::take(5)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.procedure', ['resultSearch' => $getProcesures]);
    }
}
