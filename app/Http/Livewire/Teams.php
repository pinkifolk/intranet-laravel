<?php

namespace App\Http\Livewire;

use App\Models\Personal;
use Illuminate\Support\Facades\DB;
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
        $team = Personal::where('department_id', 5)->get();
        $gent = Personal::where('department_id', 3)->where('type', 1)->get();
        $it = Personal::where('department_id', 2)->where('type', 1)->get();
        $personalIt = Personal::where('parent', 4)->get();
        $sales = Personal::where('department_id', 5)->where('type', 1)->get();
        $personalSales = Personal::where('parent', 5)->get();
        $adm = Personal::where('department_id', 1)->where('type', 1)->get();
        $personalAdm = Personal::where('parent', 10)->get();
        $ope = Personal::where('department_id', 4)->whereIn('type', [1, 2])->get();
        $personalOpe = Personal::where('parent', 19)->get();
        $salesTerr = Personal::where('department_id', 6)->whereIn('type', [1, 2])->get();
        $personalTerr = Personal::where('parent', 32)->get();
        $mkt = Personal::where('department_id', 7)->where('type', 2)->get();


        // $team->transform(function ($item) {
        //     $child = Personal::all()->where('id', [$item->node]);
        //     if ($child->count()) {
        //         $item->child = $child;
        //     }
        //     return $item;
        // });


        $team_venta = Personal::where('type', 3)->where('department_id', 5)->get();
        return view('livewire.teams', compact('gent', 'it', 'sales', 'personalIt', 'personalSales', 'adm', 'personalAdm', 'ope', 'personalOpe', 'salesTerr', 'personalTerr', 'mkt'));
    }
}
