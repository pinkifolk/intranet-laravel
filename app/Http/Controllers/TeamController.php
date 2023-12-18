<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('equipo');
    }
    public function department(Department $department)
    {
        return view('department', compact('department'));
    }
}
