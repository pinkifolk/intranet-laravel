<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $get_all = News::orderBy('created_at', 'desc')->paginate(10);
        return view('noticias', compact('get_all'));
    }
    public function show($slug)
    {
        $get_news = News::where('slug', $slug)->firstOrFail();
        return view('detail', [
            'get_news' => $get_news
        ]);
    }
    public function getseven()
    {
        $news_five_first = News::orderBy('created_at', 'desc')->take(4)->get();
        $news_four_first = News::orderBy('created_at', 'desc')->skip(6)->take(4)->get();
        return view('inicio', compact('news_five_first', 'news_four_first'));
    }
}
