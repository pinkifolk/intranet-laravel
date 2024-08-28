<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    function index(){
        $fecha = Carbon::now();
        $get_campaign = Campaign::get();
        return view('campaign',compact('get_campaign','fecha'));
    }
    function campaign(){
        return view('admin.campaign');
    }
}
