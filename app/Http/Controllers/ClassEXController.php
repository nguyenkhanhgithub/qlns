<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Session;
use App\Khoilop;

class ClassEXController extends Controller
{
    //
    public function index(Request $request)
    {
    	# code...
    	$khoilop = Khoilop::all();
    	return view('Thicu.Dethi.Khoithi',['khoilop' => $khoilop]);
    }
}
