<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsCorporate extends Component
{
    public $search;
    public function render()
    {
        $news_get =
            News::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.news-corporate', ['resultSearch' => $news_get]);
    }
}
