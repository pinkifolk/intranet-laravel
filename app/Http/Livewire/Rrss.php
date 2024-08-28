<?php

namespace App\Http\Livewire;

use App\Models\RRSS as ModelsRRSS;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Rrss extends Component
{
    use WithFileUploads;
    public $search;
    public $body,$file,$edit_id,$user,$avatar,$url_img_old;
    protected $rules=[
        'body' => 'required'
    ];
    
    function storeRRSSData(){
        $this->validate();

        $url_base_file = "public/rrss";
        $url_public_file = "storage/rrss/";

        if (empty($this->file)) {
            $url_image = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_image = $url_public_file . $storageName;;
        }
        ModelsRRSS::insert([
            'detail' => $this->body,
            'url_img' => $url_image,
            'name' => auth()->user()->name.' '.auth()->user()->last_name,
            'avatar' => auth()->user()->route_img,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Publicación creada correctamente');
        $this->resert();

    }
    function edit($id) {
        $data = ModelsRRSS::find($id);
        $this->edit_id = $data->id;
        $this->body = $data->detail;
        $this->url_img_old = $data->url_img;

    }
    function editRRSSData(){
        $this->validate();

        $url_base_file = "public/campaing";
        $url_public_file = "storage/campaing/";

        if (empty($this->file)) {
            $url_image = $this->url_img_old;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_image = $url_public_file . $storageName;;
        }
        ModelsRRSS::where('id', $this->edit_id)->update([
            'detail' => $this->body,
            'url_img' => $url_image,
            'name' => auth()->user()->name.' '.auth()->user()->last_name,
            'avatar' => auth()->user()->route_img,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Publicación editada correctamente');
        $this->resert();
    }

    function del($id){
        $data = ModelsRRSS::find($id);
        $this->edit_id = $data->id;
    }

    function delRRSSData(){
        ModelsRRSS::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Publicación eliminada correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->body = '';
        $this->file = '';
    }
    public function render()
    {
        $get_rrss = ModelsRRSS::get();
        return view('livewire.rrss',['resultSearch' => $get_rrss]);
    }
}
