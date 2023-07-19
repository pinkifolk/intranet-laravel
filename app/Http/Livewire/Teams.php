<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Teams extends Component
{
    public $data;
    public $name, $job, $ext, $birthday, $email, $img;
    public function showInfo($id)
    {
        $d = User::find($id);
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
        $gent = User::where('department_id', 4)->where('type', 1)->get();
        $it = User::where('department_id', 3)->where('type', 1)->get();
        $personalIt = User::where('type', 3)->get();
        $sales = User::where('department_id', 5)->where('type', 1)->get();
        $personalSales = User::where('type', 3)->get();
        $adm = User::where('department_id', 1)->where('type', 1)->get();
        $personalAdm = User::where('type', 3)->get();
        $ope = User::where('department_id', 4)->whereIn('type', [1, 2])->get();
        $personalOpe = User::where('type', 3)->get();
        $salesTerr = User::where('department_id', 6)->whereIn('type', [1, 2])->get();
        $personalTerr = User::where('type', 3)->get();
        $mkt = User::where('department_id', 7)->where('type', 2)->get();


        $team_venta = User::where('type', 3)->where('department_id', 5)->get();
        return view('livewire.teams', compact('gent', 'it', 'sales', 'personalIt', 'personalSales', 'adm', 'personalAdm', 'ope', 'personalOpe', 'salesTerr', 'personalTerr', 'mkt'));
    }
}
