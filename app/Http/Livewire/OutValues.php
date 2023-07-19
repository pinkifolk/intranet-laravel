<?php

namespace App\Http\Livewire;

use App\Models\Values;
use Carbon\Carbon;
use Livewire\Component;

class OutValues extends Component
{

    public $search;
    public $title, $description, $file, $edit_id, $old_file;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];
    public function storeValuesData()
    {
        $this->validate();

        Values::insert([
            'title' => $this->title,
            'detail' => $this->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Valor creado correctamente');
        $this->resert();
    }
    function edit($id)
    {
        $data = Values::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->description = $data->detail;
    }
    function del($id)
    {
        $data = Values::find($id);
        $this->edit_id = $data->id;
    }
    function delValuesData()
    {
        Values::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Valor eliminado correctamente ☹');
    }
    function editValuesData()
    {
        $this->validate();
        Values::where('id', $this->edit_id)->update([
            'title' => $this->title,
            'detail' => $this->description,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Valor editado correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->title = '';
        $this->description = '';
    }
    public function render()
    {
        $outValues_get =
            Values::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.out-values', ['resultSearch' => $outValues_get]);
    }
}
