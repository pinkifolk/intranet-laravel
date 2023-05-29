<?php

namespace App\Http\Controllers;

use App\Models\Values;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function index()
    {
        $values_get = Values::get();
        return view('admin.outvalues', compact('values_get'));
    }
    public function store(Request $request)
    {
        $url_base_file = "public/normatives/";
        $url_public_file = "storage/normatives/";
        $name = $request->file('file')->store($url_base_file);
        $storageName = basename($name);
        $url_pdf = $url_public_file . $storageName;
        Values::insert([
            'title' => $request->title,
            'detail' => $request->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('values.index')->with("valor cargado");
    }
}
