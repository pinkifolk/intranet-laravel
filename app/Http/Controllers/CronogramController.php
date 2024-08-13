<?php

namespace App\Http\Controllers;

use App\Models\Cronogram as ModelsCronogram;
use Carbon\Carbon;

class CronogramController extends Controller
{
    public function index() {
        $get_cronogram = ModelsCronogram::all()->groupBy(
            function($date) {
                return Carbon::parse($date->date)->format('Y-m');
            }
        );
        return view('cronogram',compact('get_cronogram'));
    }
    public function admin() {
        return view('admin.cronogram');
    }
    public function donwload(){
        $master = storage_path('app/public/files/Maestro de Celebraciones.xlsx');
        return response()->download($master);
    }
}
