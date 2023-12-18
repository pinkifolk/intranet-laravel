<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    function index()
    {
         $countPerson = User::where('department_id','>',1)->count();
        $countNews = News::all()->count();
        return view('admin.dashboard', [
            'person' => $countPerson,
            'news' => $countNews
        ]);
    }
}
