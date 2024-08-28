<?php

namespace App\Http\Livewire;

use App\Models\Campaign as ModelsCampaign;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Campaign extends Component
{
    use WithFileUploads;
    public $search;
    public $title,$descripcion,$validTo,$file,$edit_id;
    protected $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'validTo' => 'required',
    ];

    function storeCampaignData(){
        $this->validate();
        $url_base_file = "public/campaing";
        $url_public_file = "storage/campaing/";

        if (empty($this->file)) {
            $url_image = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_image = $url_public_file . $storageName;;
        }

        ModelsCampaign::insert([
            'title' => $this->title,
            'detail' => $this->descripcion,
            'url_image' => $url_image,
            'valid_to' => $this->validTo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Campaña creada correctamente');
        $this->resert();

    }
    function edit($id){
        $data = ModelsCampaign::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->descripcion = $data->detail;
        $this->validTo = $data->valid_to;

    }
    function editCampaignData() {
        $this->validate();
        $url_base_file = "public/campaing";
        $url_public_file = "storage/campaing/";

        if (empty($this->file)) {
            $url_image = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_image = $url_public_file . $storageName;;
        }
        ModelsCampaign::where('id',$this->edit_id)->update([
            'title' => $this->title,
            'detail' => $this->descripcion,
            'url_image' => $url_image,
            'valid_to' => $this->validTo,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Campaña editada correctamente');
        $this->resert();
        
    }
    function del($id){
        $data = ModelsCampaign::find($id);
        $this->edit_id = $data->id;
    }
    function delCampaignData() {
        ModelsCampaign::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Campaña eliminada correctamente');
        $this->resert();
    }
    
    function resert()
    {
        $this->title = '';
        $this->descripcion = '';
        $this->file = '';
        $this->validTo = '';
    }
    public function render()
    {
        $get_campaign = ModelsCampaign::get();
        return view('livewire.campaign',['resultSearch' => $get_campaign]);
    }
}
