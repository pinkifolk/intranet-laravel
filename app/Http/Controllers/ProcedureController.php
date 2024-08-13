<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {       
        $get_asign = Procedures::select('orders')->groupBy('orders')->get();
        return view('procedimientos', compact('get_asign'));
    }
    public function show($request) {
        $procedure_get = Procedures::where('orders',$request)->get();
        return view('proceduresDetail',compact('procedure_get'));
    }
}
