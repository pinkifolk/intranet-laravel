<?php

namespace App\Http\Controllers;

use App\Models\Procedures;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    public function index()
    {
        $procedures_get = Procedures::get();
        return view('admin.procedures', compact('procedures_get'));
    }
    public function store(Request $request)
    {
        $url_base_file = "public/procedures/";
        $url_public_file = "storage/procedures/";
        $name = $request->file('file')->store($url_base_file);
        $storageName = basename($name);
        $url_pdf = $url_public_file . $storageName;

        Procedures::insert([
            'title' => $request->title,
            'detail' => $request->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('procedures.index')->with("procedimiento creado");
    }
}
