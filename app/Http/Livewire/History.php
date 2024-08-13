<?php

namespace App\Http\Livewire;

use App\Models\History as ModelsHistory;
use Carbon\Carbon;
use Livewire\Component;

class History extends Component
{
    public $title,$date,$description,$edit_id,$color;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'date' => 'required'
    ];
    public function storeHistory(){
        $this->validate();
        ModelsHistory::insert([
            'date' => Carbon::create($this->date)->format('Y-m-d'),
            'title' => $this->title,
            'detail' => $this->description,
            'color' => $this->color,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Historia creada correctamente');
        $this->resert();
    }
    public function edit($id){
        $data = ModelsHistory::find($id);
        $this->edit_id = $data->id;
        $this->date = Carbon::create($data->date)->format('d-m-Y');
        $this->title = $data->title;
        $this->description = $data->detail;
        $this->color = $data->color;

    }
    public function editHistoryData() {
        $this->validate();
        ModelsHistory::where('id',$this->edit_id)->update([
            'date' => Carbon::create($this->date)->format('Y-m-d'),
            'title' => $this->title,
            'detail' => $this->description,
            'color' => $this->color,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Historia editada correctamente');
        $this->resert();
    } 
    function del($id)
    {
        $data = ModelsHistory::find($id);
        $this->edit_id = $data->id;
    }
    function delHistoryData()
    {
        ModelsHistory::where('id', $this->edit_id)->delete();       
        session()->flash('message', 'Historia eliminada correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->title = null;
        $this->date = null;
        $this->description = null;
        $this->color = null;
    }
    public function render()
    {
        $resultSearch= ModelsHistory::get();
        return view('livewire.history',compact('resultSearch'));
    }
}
