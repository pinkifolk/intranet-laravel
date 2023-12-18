<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Department;
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
        $gent = User::where('department_id', 13)->where('type', 1)->get();
        
        $it = User::where('department_id', 3)->where('type', 2)->get();
        $personalIt = User::where('department_id', 3)->where('type', 4)->get();
        
        $sales = User::where('department_id', 6)->where('type', 3)->get();
        $personalSales = User::where('department_id', 6)->where('type', 4)->get();
        
        $adm = User::where('department_id', 2)->where('type', 2)->get();
        $admBoss1 = User::where('id', 49)->get();
        $admBoss2 = User::where('id', 69)->get();
        $admBoss3 = User::where('id', 56)->get();
        $personalAdm1 = User::where('id', 71)->get();
        $personalAdm2 = User::where('id', 77)->get();
        $personalAdm3 = User::where('id', 72)->get();
        
        $ope = User::where('department_id', 5)->whereIn('type', [2,3])->get();
        $personalOpe = User::where('department_id', 5)->where('type', 4)->get();
        
        $salesTerr = User::where('department_id', 7)->where('type', 2)->get();
        $personalTerr = User::where('department_id', 7)->where('type', 4)->get();
        
        $mkt = User::where('department_id', 8)->where('type', 4)->get();
        $aam = User::where('department_id', 14)->where('type', 2)->get();
        $personalaam = User::where('department_id', 14)->whereIn('type', [3,4])->get();

        $dep = Department::where('id', '>', 1)->get();
        $team_venta = User::where('type', 3)->where('department_id', 5)->get();
        return view('livewire.teams', compact(
            'gent', 
            'it', 
            'sales', 
            'personalIt', 
            'personalSales', 
            'adm', 
            'admBoss1',
            'personalAdm1',
            'admBoss2',
            'personalAdm2',
            'admBoss3',
            'personalAdm3', 
            'ope', 
            'personalOpe', 
            'salesTerr', 
            'personalTerr', 
            'mkt',
            'aam',
            'personalaam',
            'dep'
            ));
    }
}
