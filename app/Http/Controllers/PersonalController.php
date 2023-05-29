<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Personal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal_get = Personal::get();
        $department_get = Department::get();
        return view('admin.personal', compact('personal_get', 'department_get'));
    }
    public function store(Request $request)
    {
        $url_base_file = "public/personal/";
        $url_public_file = "storage/personal/";
        $name = $request->file('file')->store($url_base_file);
        $storageName = basename($name);
        $url_pdf = $url_public_file . $storageName;

        Personal::insert([
            'name' => $request->name,
            'last_name' => $request->lastName,
            'job_title' => $request->jobTitle,
            'extension' => $request->extension,
            'department_id' => $request->department,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'email_personal' => $request->emailPersonal,
            'img_alt' => strtolower($request->name . "_" . $request->lastName),
            'title_alt' => strtolower($request->name . "_" . $request->lastName),
            'route_img' => $url_pdf,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'estado' => 1

        ]);



        return redirect()->route('personal.index')->with("Colaborador creado");
    }
}
