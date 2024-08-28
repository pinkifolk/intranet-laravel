<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){
        $get_faq = Questions::get();
        return view('question', compact('get_faq'));
    }
    public function question(){    
        return view('admin.qaf');
    }
}
