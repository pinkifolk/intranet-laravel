<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        return view('equipo');
    }
    public function department(Department $department)
    {
        $id = $department->id;
        $query=User::query();
        switch ($id){
            case 2 : 
                $query->whereIn('department_id', [13,2])->whereIn('type', [1,2,3,4])->whereNotIn('id',[93])->orderBy('type','asc');
                break;
            case 3 :
                $query->where('department_id',3)->whereIn('type',[2,4])->orderBy('type','asc'); 
                break;
            case 5 :
                $query->where('department_id',5)->whereIn('type',[2,3,4])->orderBy('type','asc'); 
                break;
            case 6 : 
                $query->where('department_id',6)->whereIn('type',[3,4])->orderBy('type','asc');
                break;
            case 7 : 
                $query->where('department_id',7)->whereIn('type',[2,4])->orderBy('type','asc');
                break;
            case 8 : 
                $query->where('department_id',8)->where('type',4)->orderBy('type','asc');
                break;
            case 11 : 
                $query->where('department_id',2)->whereIn('id',[56,72])->orderBy('type','asc');
                break;
            case 12 : 
                $query->where('department_id',8)->where('type',4)->orderBy('type','asc');
                break;
            case 13 : 
                $query->where('department_id',13)->where('type',1);
                break;
            case 14 : 
                $query->where('department_id',14)->whereIn('type',[2,3,4])->orderBy('type','asc');
                break;
            default:
                $query->where('department_id',$id);
                break;
            
        }
        

        $response = $query->get();

        $grid = 5;
        if($response->count() < 5){
            $grid= $response->count();
        }

        return view('department', compact('department','response','grid'));
    }
}
