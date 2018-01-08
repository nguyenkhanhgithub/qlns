<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Phancong;
use App\Monhoc;
use App\Lop;
use App\Namhoc;
use App\Khoilop;
use App\Giaovien;
use Session;

class AssignmentController extends Controller
{
    //
    public function pcgiaovien($id){

        $monhoc = Monhoc::all();
        $lop = Lop::all();
        $namhoc = Namhoc::all();
        $khoilop = Khoilop::all();
        $giaovien_id = Giaovien::find($id);
        return view('Giaovien.Phancong.Phancong',['lop' => $lop, 'namhoc' => $namhoc, 'khoilop' => $khoilop, 'giaovien_id' => $giaovien_id]);
    }

}
