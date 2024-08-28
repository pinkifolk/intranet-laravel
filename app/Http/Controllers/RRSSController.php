<?php

namespace App\Http\Controllers;

use App\Models\RRSS;
use Illuminate\Http\Request;

class RRSSController extends Controller
{
    public function index(){
        $get_rrss = RRSS::get();
        return view('rrss',compact('get_rrss'));
    }
    public function rrss(){
        return view('admin.rrss');
    }
}
