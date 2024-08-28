<?php

namespace App\Http\Controllers;

use App\Models\Values;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index($type)
    {
        $values_get = Values::where('id',$type)->get();
        return view('nuestros-valores', compact('values_get'));
        
    }
}
