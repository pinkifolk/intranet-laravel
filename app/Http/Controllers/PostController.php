<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('noticias');
    }
    public function getfive()
    {
        $news_get = News::get();
        return view('inicio', compact('news_get'));
    }
}
