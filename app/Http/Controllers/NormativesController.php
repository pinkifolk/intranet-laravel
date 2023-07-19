<?php

namespace App\Http\Controllers;

use App\Models\Normatives;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NormativesController extends Controller
{
    public function index()
    {
        return view('admin.normative');
    }
}
