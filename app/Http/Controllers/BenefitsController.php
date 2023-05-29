<?php

namespace App\Http\Controllers;

use App\Models\Benefits;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BenefitsController extends Controller
{
    public function index()
    {
        $benefit_get = Benefits::get();
        return view('admin.benefits', compact('benefit_get'));
    }
    public function store(Request $request)
    {
        $url_base_file = "public/benefits/";
        $url_public_file = "storage/benefits/";
        $name = $request->file('file')->store($url_base_file);
        $storageName = basename($name);
        $url_pdf = $url_public_file . $storageName;

        Benefits::insert([
            'title' => $request->title,
            'detail' => $request->description,
            'url_pdf' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('benefits.index')->with("beneficio creado");
    }
}
