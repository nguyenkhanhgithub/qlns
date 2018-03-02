<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Monhoc;
use App\Tracnghiem;
class ExamController extends Controller
{
    //
    public function index(Request $request)
    {
      # code...
     	$monhoc = Monhoc::all();
    	$MaKhoiLop = $request->get('idKhoi');
      	return view('Thicu.Dethi.Dethi',['monhoc'=>$monhoc, 'idKhoi' => $MaKhoiLop]);
    }
}
