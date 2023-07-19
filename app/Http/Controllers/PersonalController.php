<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    public function index()
    {
        return view('admin.personal');
    }
}
