<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('equipo2');
    }
}
