<?php

namespace App\Http\Controllers;

use App\Models\Normatives;
use Illuminate\Http\Request;

class NormativeController extends Controller
{
    public function index()
    {
        $normativa_get = Normatives::get();
        return view('normativas', compact('normativa_get'));
    }
}
