<?php

namespace App\Http\Livewire;

use App\Models\Gallery as ModelsGallery;
use App\Models\GalleryImg;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Core\File;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;
    public $search;
    public $title, $description, $edit_id;
    public $files = [];
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'files.*' => 'required|mimes:png,jpg,jpeg|max:5000000',
        'files' => 'required|max:5000000'
    ];

    public function storeNewGallery()
    {
        $this->validate();
        $url_base_file = "public/gallery";
        $url_public_file = "storage/gallery/";

        if (empty($this->files)) {
            $url_img = null;
        } else {
            $galleria = ModelsGallery::create([
                'title' => $this->title,
                'slug' =>  SlugService::createSlug(ModelsGallery::class, 'slug', $this->title),
                'descripcion' => $this->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $id = $galleria->id;
            foreach ($this->files as $file) {
                $name = $file->store($url_base_file);
                $storageName = basename($name);
                $url_img = $url_public_file . $storageName;
                GalleryImg::create([
                    'gallery_id' => $id,
                    'url_img' => $url_img,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        session()->flash('message', 'Galeria creada correctamente');
        $this->resert();
    }
    function add($id)
    {
        $data = ModelsGallery::find($id);
        $this->edit_id = $data->id;
    }
    function addImagesData()
    {
        $this->validate([
            'files.*' => 'required|mimes:png,jpg,jpeg|max:5000000',
            'files' => 'required|max:5000000'
        ]);
        $url_base_file = "public/gallery";
        $url_public_file = "storage/gallery/";
        foreach ($this->files as $file) {
            $name = $file->store($url_base_file);
            $storageName = basename($name);
            $url_img = $url_public_file . $storageName;
            GalleryImg::create([
                'gallery_id' => $this->edit_id,
                'url_img' => $url_img,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        session()->flash('message', 'Imagenes agregada correctamente');
        $this->resert();
    }
    function edit($id)
    {
        $data = ModelsGallery::find($id);
        $this->edit_id = $data->id;
        $this->title = $data->title;
        $this->description = $data->description;
    }

    function editImagesData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        ModelsGallery::where('id', $this->edit_id)->update([
            'title' => $this->title,
            'descripcion' => $this->description,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Galeria editada correctamente');
        $this->resert();
    }
    function del($id)
    {
        $data = ModelsGallery::find($id);
        $this->edit_id = $data->id;
    }
    function delImagesData()
    {
        GalleryImg::where('gallery_id', $this->edit_id)->delete();
        ModelsGallery::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Galeria eliminada correctamente ');
    }


    function resert()
    {
        $this->title = '';
        $this->description = '';
        $this->files = [];
    }
    public function render()
    {
        $get_gallery = ModelsGallery::take(20)->where('title', 'like', '%' . $this->search . '%')->get();
        return view(
            'livewire.gallery',
            [
                'resultSearch' => $get_gallery
            ]
        );
    }
}
