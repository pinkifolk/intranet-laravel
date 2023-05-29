<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department_get = Department::get();
        return view('admin.department', compact('department_get'));
    }
    public function store(Request $request)
    {
        Department::create($request->all());
        return redirect()->route('department.index')->with("departamento creado");
    }
}
