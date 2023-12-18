<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Departament extends Component
{

    use WithFileUploads;
    public $search;
    public $name, $description, $file, $edit_id, $file_old,$url_img;
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        //'file' => 'file|mimes:jpg,jpeg,png,bmp,tiff'
    ];
    public function storeDepartData()
    {
         $this->validate();
        try {
            $url_base_file = "public/departments";
            $url_public_file = "storage/departments/";

            if (empty($this->file)) {
                session()->flash('error', 'El campo imagen no puede ser nulo');
                $this->resert();
            } else {
                $name = $this->file->store($url_base_file);
                $storageName = basename($name);
                $url_img = $url_public_file . $storageName;;
            }

            if (Department::where('name', '=', $this->name)->first()) {
                session()->flash('error', 'El Departamento ya existe');
            } else {
                Department::insert([
                    'name' => $this->name,
                    'detail' => $this->description,
                    'url_img' => $url_img,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                session()->flash('message', 'Departamento creado correctamente');
                $this->resert();
            }
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }
    function edit($id)
    {
        $data = Department::find($id);
        $this->edit_id = $data->id;
        $this->name = $data->name;
        $this->description = $data->detail;
        $this->file_old = $data->url_img;
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
     function delimg()
    {
        $this->file_old = '';
    }
    function editDepartData()
    {
        $this->validate();
         try{
            $url_base_file = "public/departments";
            $url_public_file = "storage/departments/";

            if (empty($this->file)) {
                //session()->flash('error', 'El campo imagen no puede ser nulo');
                $this->url_img ='';
            } else {
                $name = $this->file->store($url_base_file);
                $storageName = basename($name);
                $this->url_img = $url_public_file . $storageName;
                  
            }
            Department::where('id', $this->edit_id)->update([
                'name' => $this->name,
                'detail' => $this->description,
                'url_img' => $this->url_img,
                'updated_at' => Carbon::now()
            ]);
          
            session()->flash('message', 'Departamento editado correctamente');
            $this->resert();
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }
    function resert()
    {
        $this->name = '';
         $this->description = '';
        $this->file = '';
    }
    public function render()
    {
        $departament_get =
            Department::take(20)->where('name', 'like', '%' . $this->search . '%')->where('id', '>', 1)->get();
        return view('livewire.departament', ['resultSearch' => $departament_get]);
    }
}
