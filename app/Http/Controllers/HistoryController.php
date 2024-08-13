<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $get_data = History::get();
        $dep = Department::where('id','>', 1)->get();
        return view('historia',compact('get_data','dep'));
    }
    public function admin(){
        return view('admin.history');
    }
}
