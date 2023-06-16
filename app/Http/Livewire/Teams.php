<?php

namespace App\Http\Livewire;

use App\Models\Personal;
use Livewire\Component;

class Teams extends Component
{
    public $data;
    public $name, $job, $ext, $birthday, $email, $img;
    public function showInfo($id)
    {
        $d = Personal::find($id);
        $this->data = $d->id;
        $this->name = $d->name . " " . $d->last_name;
        $this->job = $d->job_title;
        $this->ext = $d->extension;
        $this->birthday = date('d-m-Y', strtotime($d->birthday));
        $this->email = $d->email;
        $this->img = $d->route_img;
    }

    public function render()
    {
        $team_get = Personal::get();
        return view('livewire.teams', ['team' => $team_get]);
    }
}
