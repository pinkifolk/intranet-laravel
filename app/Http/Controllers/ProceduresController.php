<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProceduresController extends Controller
{
    public function index()
    {
        return view('admin.procedures');
    }
    public function store(Request $request)
    {
        $name = $request->file('file')->store('public/procedures');
        $storageName = basename($name);
        $request->file($storageName);

        return $request;
        // Procedures::created($request);
    }
}
