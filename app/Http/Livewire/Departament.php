<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Carbon\Carbon;
use Livewire\Component;

class Departament extends Component
{

    public $search;
    public $name, $edit_id;
    protected $rules = [
        'name' => 'required',
    ];
    public function storeDepartData()
    {
        $this->validate();
        Department::insert([
            'name' => $this->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Departamento creado correctamente');
        $this->resert();
    }
    function edit($id)
    {
        $data = Department::find($id);
        $this->edit_id = $data->id;
        $this->name = $data->name;
    }
    function del($id)
    {
        $data = Department::find($id);
        $this->edit_id = $data->id;
    }
    function delDepartData()
    {
        Department::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Departamento eliminado correctamente ☹');
    }
    function editDepartData()
    {
        $this->validate();
        Department::where('id', $this->edit_id)->update([
            'name' => $this->name,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Departamento editado correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->name = '';
    }
    public function render()
    {
        $departament_get =
            Department::take(20)->where('name', 'like', '%' . $this->search . '%')->where('id', '>', 1)->get();
        return view('livewire.departament', ['resultSearch' => $departament_get]);
    }
}
