<?php

namespace App\Http\Controllers;

use App\Models\Benefits;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefit_get = Benefits::get();
        return view('beneficios', compact('benefit_get'));
    }
}
