<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormativesController extends Controller
{
    public function index()
    {
        return view('admin.normative');
    }
}
