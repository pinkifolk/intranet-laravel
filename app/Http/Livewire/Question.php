<?php

namespace App\Http\Livewire;

use App\Models\Questions;
use Carbon\Carbon;
use Livewire\Component;


class Question extends Component
{
    public $search; 
    public $ask,$answer,$edit_id;
    protected $rules =[
        'ask'=>'required',
        'answer'=>'required',
    ];
    function storeQuestionData() {
        $this->validate();

        Questions::insert([
            'ask' => $this->ask,
            'answer' => $this->answer,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'FAQ creada correctamente');
        $this->resert();
    }
    function edit($id) {
        $data = Questions::find($id);
        $this->edit_id = $data->id;
        $this->ask = $data->ask;
        $this->answer = $data->answer;    
    }
    function editQuestionData(){
        $this->validate();
        Questions::where('id', $this->edit_id)->update([
            'ask' => $this->ask,
            'answer' => $this->answer,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'FAQ editada correctamente');
        $this->resert();
    }
    function del($id){
        $data = Questions::find($id);
        $this->edit_id= $data->id;
    }
    function delQuestionData(){
        Questions::where('id', $this->edit_id)->delete();
        session()->flash('message', 'FAQ eliminada correctamente');
    }
    function resert()
    {
        $this->ask = '';
        $this->answer = '';
    }
    public function render()
    {
        $getFAQ = Questions::take(20)->where('ask', 'like', '%' . $this->search . '%')->get();
        return view('livewire.question',['resultSearch' => $getFAQ]);
    }
}
