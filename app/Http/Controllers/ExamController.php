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
    public function index()
    {
      # code...
      $monhoc = Monhoc::all();
      return view('Thicu.Dethi.Dethi',['monhoc'=>$monhoc]);
    }
}
