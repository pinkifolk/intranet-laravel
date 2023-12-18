<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Mail;
use App\Mail\infoToTeam;

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
            'image' => 'file',
        ]);
        $url_base_file = "public/news/";
        $url_public_file = "storage/news/";
        if (empty($request->image)) {
            return redirect()->route('news.index')->with('error', 'No se creó la noticia porque no se cargó una imagen.');
        } else {
            $name = $request->image->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        $news = new News;
        $news->title = $request->input('title');
        $news->slug = SlugService::createSlug(News::class, 'slug', $request->title);
        $news->description = $request->input('description');
        $news->imagen = $url_pdf;
        $news->save();
        return redirect()->route('news.index')->with('message', 'Noticia creada correctamente');
    }
    function edit(News $news)
    {
        return view('admin.edit-news', [
            'news' => $news
        ]);
    }
    function update(Request $request, News $news)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'file',
        ]);
        $url_base_file = "public/news/";
        $url_public_file = "storage/news/";
        if (empty($request->image)) {
            return redirect()->route('news.index')->with('error', 'No se creó la noticia porque no se cargó una imagen.');
        } else {
            $name = $request->image->store($url_base_file);
            $storageName = basename($name);
            $url_pdf = $url_public_file . $storageName;
        }
        $news->title = $request->input('title');
        $news->slug = SlugService::createSlug(News::class, 'slug', $request->title);
        $news->description = $request->input('description');
        $news->imagen = $url_pdf;
        $news->save();
        return redirect()->route('news.index')->with('message', 'Noticia actualizada correctamente');
    }
    function release()
    {
        return view('admin.release');
    }
    function releaseStore(Request $request)
    {
       $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);
        if ($request->get('onlyOne') == 'on') {
            $userRegister = User::where('id', '=', auth()->user()->id)->get();
            $msg="Mensaje enviado correctamente a su correo";
        } else {
            $userRegister = User::where('id', '>', 1)->get();
            $msg="Mensaje enviado correctamente a todos los colaboradores";
        }
        try {

            $url_base_file = "public/attachment";
            $url_public_file = "storage/attachment/";

            $originalName = $request->file->getClientOriginalName();

            if (empty($request->file)) {
                $url_file = null;
            } else {
                $name = $request->file->store($url_base_file);
                $storageName = basename($name);
                $url_file = $url_public_file . $storageName;
            }

            foreach ($userRegister as $recipient) {
                Mail::to($recipient->email)->send(new infoToTeam($request, $url_file, $originalName));
            }
            return redirect()->route('releases.release')->with('message', $msg);
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }
    function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $url_base_file = "public/news";
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs($url_base_file, $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/news/' . $fileName);
            $msg = "Imagen cargada correctamente";
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
