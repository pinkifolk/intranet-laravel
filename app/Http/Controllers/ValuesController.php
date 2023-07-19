<?php

namespace App\Http\Controllers;

use App\Models\Values;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function index()
    {
        return view('admin.outvalues');
    }
}
