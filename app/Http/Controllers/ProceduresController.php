<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    public function index()
    {
        $procedures_get = Procedures::get();
        return view('admin.procedures', compact('procedures_get'));
    }
}
