<?php

namespace App\Http\Livewire;

use App\Models\Benefits;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Benefit extends Component
{
    use WithFileUploads;

    public $search;
    public $title, $description, $file, $edit_id, $old_file;
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'file' => 'file'
    ];
    public function storeBenefitData()
    {
        $this->validate();

        $url_base_file = "public/benefits";
        $url_public_file = "storage/benefits/";

        if (empty($this->file)) {
            $url_pdf = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;;
        }

        Benefits::insert([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Beneficio creado correctamente');
        $this->resert();
    }
    function edit($id)
    {
        $data = Benefits::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->description = $data->detail;
        $this->old_file = $data->url_pdf;
    }
    function del($id)
    {
        $data = Benefits::find($id);
        $this->edit_id = $data->id;
    }
    function delBenefitData()
    {
        Benefits::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Beneficio eliminado correctamente ☹');
    }
    function editBenefitData()
    {
        $this->validate();
        $url_base_file = "public/benefits/";
        $url_public_file = "storage/benefits/";
        if (empty($this->file)) {
            $url_pdf = $this->old_file;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        Benefits::where('id', $this->edit_id)->update([
            'title' => $this->title,
            'detail' => $this->description,
            'url_pdf' => $url_pdf,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Beneficio editado correctamente');
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
        $benefit_get =
            Benefits::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.benefits', ['resultSearch' => $benefit_get]);
    }
}
