<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $get_galley = Gallery::with('photos')->get();
        return view('galeria', [
            'result' => $get_galley
        ]);
    }
    public function admin()
    {
        return view('admin.gallery');
    }
    public function show($slug)
    {
        $get_detail = Gallery::where('slug', $slug)->with('photos')->firstOrFail();
        return view(
            'detailGallery',
            ['result' => $get_detail->photos]
        );
    }
}
