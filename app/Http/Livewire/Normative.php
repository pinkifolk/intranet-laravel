<?php

namespace App\Http\Livewire;

use App\Models\Normatives;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Normative extends Component
{
    use WithFileUploads;
    public $search;
    public $title, $description, $file, $edit_id, $old_file;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'file' => 'file'
    ];
    public function storeNormativeData()
    {
        $this->validate();

        $url_base_file = "public/normatives";
        $url_public_file = "storage/normatives/";

        if (empty($this->file)) {
            $url_pdf = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;;
        }

        Normatives::insert([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Normativa creada correctamente');
        $this->resert();
    }
    function edit($id)
    {
        $data = Normatives::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->description = $data->detail;
        $this->old_file = $data->url_pdf;
    }
    function del($id)
    {
        $data = Normatives::find($id);
        $this->edit_id = $data->id;
    }
    function delNormativeData()
    {
        Normatives::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Normativa eliminada correctamente ☹');
    }
    function editNormativeData()
    {
        $this->validate();
        $url_base_file = "public/normatives/";
        $url_public_file = "storage/normatives/";
        if (empty($this->file)) {
            $url_pdf = $this->old_file;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        Normatives::where('id', $this->edit_id)->update([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Normativa editada correctamente');
        $this->resert();
    }
    function resert()
    {
        $this->title = '';
        $this->description = '';
        $this->file = '';
    }
    public function render()
    {
        $normative_get =
            Normatives::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.normatives', ['resultSearch' => $normative_get]);
    }
}
