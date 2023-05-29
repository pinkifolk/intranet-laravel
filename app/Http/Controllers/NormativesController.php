<?php

namespace App\Http\Controllers;

use App\Models\Normatives;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NormativesController extends Controller
{
    public function index()
    {
        $normative_get = Normatives::get();
        return view('admin.normative', compact('normative_get'));
    }
    public function store(Request $request)
    {
        $url_base_file = "public/normatives/";
        $url_public_file = "storage/normatives/";
        $name = $request->file('file')->store($url_base_file);
        $storageName = basename($name);
        $url_pdf = $url_public_file . $storageName;
        Normatives::insert([
            'title' => $request->title,
            'detail' => $request->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('normative.index')->with("normativa creada");
    }
}
