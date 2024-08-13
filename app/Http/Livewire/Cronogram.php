<?php

namespace App\Http\Livewire;

use App\Imports\ImportClass;
use App\Models\Cronogram as ModelsCronogram;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Cronogram extends Component
{
    use WithFileUploads;
    public $title,$date,$file,$edit_id;
    public function storeCronogram(){
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new ImportClass, $this->file->getRealPath());

        session()->flash('message', 'Archivo importado con éxito!');
        $this->reset();
    }
    function edit($id)
    {
        $data = ModelsCronogram::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->date = Carbon::create($data->date)->format('d-m-Y');

    }
    function editCronogramData() {
        $this->validate([
            'title' => 'required',
            'date' => 'required'
        ]);
        ModelsCronogram::where('id',$this->edit_id)->update([
            'title' => $this->title,
            'date' => Carbon::create($this->date)->format('Y-m-d'),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Cronograma editado correctamente ');
        $this->reset();
    }
    function del($id)
    {
        $data = ModelsCronogram::find($id);
        $this->edit_id = $data->id;
    }
    function delCronogramData()
    {
        ModelsCronogram::where('id', $this->edit_id)->delete();       
        session()->flash('message', 'Cronograma eliminado correctamente ');
        $this->reset();
    }
    function resert()
    {
        $this->title = null;
        $this->date = null;
        $this->file = null;
    }
    public function render()
    {
        $resultSearch= ModelsCronogram::get();
        return view('livewire.cronogram',compact('resultSearch'));
    }
}
