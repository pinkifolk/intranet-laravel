<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    public function index()
    {
        return view('admin.procedures');
    }
}
