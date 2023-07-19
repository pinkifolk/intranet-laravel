<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Administrators extends Controller
{
    function index()
    {
        $admin_get = User::where('is_admin', 1)->get();
        return view('admin.administrator', compact('admin_get'));
    }
}
