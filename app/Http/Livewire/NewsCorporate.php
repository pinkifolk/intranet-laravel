<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsCorporate extends Component
{
    public $search;
    public $edit_id;
    function del($id)
    {
        $data = News::find($id);
        $this->edit_id = $data->id;
    }
    function delnew()
    {
        try {

            News::where('id', $this->edit_id)->delete();
            session()->flash('message', 'Noticia eliminada correctamente');
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }
    public function render()
    {
        $news_get =
            News::take(20)->where('title', 'like', '%' . $this->search . '%')->orderBy('created_at','desc')->get();
        return view('livewire.news-corporate', ['resultSearch' => $news_get]);
    }
}
