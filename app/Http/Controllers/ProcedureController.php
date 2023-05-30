<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedure_get = Procedures::get();
        return view('procedimientos', compact('procedure_get'));
    }
}
