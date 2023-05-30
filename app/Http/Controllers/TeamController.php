<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team_get = Personal::get();
        return view('equipo', compact('team_get'));
    }
}
