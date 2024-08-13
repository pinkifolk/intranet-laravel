<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Procedures;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Procedure extends Component
{
    use WithFileUploads;

    public $search;
    public $title, $description, $file, $edit_id, $old_file,$orders,$newOrders;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'orders' => 'required',
        'file' => 'file'
    ];
    public function storeProcedureData()
    {
        $this->validate();

        $url_base_file = "public/procedures";
        $url_public_file = "storage/procedures/";

        if (empty($this->file)) {
            $url_pdf = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;;
        }

        Procedures::insert([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'orders' => $this->orders,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Procedimiento creado correctamente');
        $this->resert();
    }
    function createOrdersData(){
        $this->orders = $this->newOrders;
    }
    function edit($id)
    {
        $data = Procedures::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->description = $data->detail;
        $this->orders = $data->orders;
        $this->old_file = $data->url_pdf;
    }
    function del($id)
    {
        $data = Procedures::find($id);
        $this->edit_id = $data->id;
    }
    function delProcedureData()
    {
        Procedures::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Procedimiento eliminado correctamente ☹');
    }
    function editProcedureData()
    {
        $this->validate();
        $url_base_file = "public/procedures/";
        $url_public_file = "storage/procedures/";
        if (empty($this->file)) {
            $url_pdf = $this->old_file;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        Procedures::where('id', $this->edit_id)->update([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'orders' => $this->orders,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Procedimiento editado correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->title = '';
        $this->description = '';
        $this->file = '';
        $this->orders = '';
        $this->newOrders = '';
    }
    public function render()
    {
        $asign = Procedures::select('orders')->groupBy('orders')->get();
        $getProcesures = Procedures::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.procedure', ['resultSearch' => $getProcesures],['resultOrders' => $asign]);
    }
}
