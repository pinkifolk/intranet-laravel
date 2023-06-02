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
        $this->name = $d->name;
        $this->job = $d->job_title;
        $this->ext = $d->extension;
        $this->birthday = $d->birthday;
        $this->email = $d->email;
        $this->img = $d->route_img;
    }

    public function render()
    {
        $team_get = Personal::get();
        return view('livewire.teams', ['team' => $team_get]);
    }
}
