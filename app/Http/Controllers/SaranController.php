<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function saran(){
        $welcomes = Welcome::all();
        return view('saran.saran',compact('welcomes'));
    }
}
