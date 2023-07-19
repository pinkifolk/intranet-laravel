<?php

namespace App\Http\Controllers;

use App\Models\Benefits;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BenefitsController extends Controller
{
    public function index()
    {
        return view('admin.benefits');
    }
}
