<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    function index()
    {
        return view('admin.news');
    }
    function create()
    {
        return view('admin.new');
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $url_base_file = "public/news/";
        $url_public_file = "storage/news/";
        if (empty($request->image)) {
            return redirect()->route('news.index')->with('message', 'No se creó la noticia porque no se cargó una imagen.');
        } else {
            $name = $request->image->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        News::insert([
            'title' => $request->title,
            'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            'description' => $request->description,
            'imagen' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('news.index')->with('message', 'Noticia creada correctamente');
    }
    function edit(News $item)
    {
        return view('admin.edit-news', [
            'retunItem' => $item
        ]);
    }
    function update(News $retunItem, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        return $retunItem;
    }
    function release()
    {
        return view('admin.release');
    }
    function releaseStore(Request $request)
    {
        return $request;
    }
}
