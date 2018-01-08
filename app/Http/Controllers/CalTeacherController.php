<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Thu;
use App\Monhoc;
use App\Tiethoc;
use App\Giaovien;
use App\Tuanhoc;
use App\Lop;

class CalTeacherController extends Controller
{
    //
    public function index()
    {
        $monhoc = Monhoc::all('MaMonHoc','TenMonHoc');
        $giaovien = Giaovien::all('MaGiaoVien','TenGiaoVien');
        $thu = Thu::all('id','TenThu');
        $tiethoc = Tiethoc::all('id','TenTiet');
        $tuanhoc = Tuanhoc::all();
        $max_date = Tuanhoc::select('id')->orderBy('BatDau','desc')->first();
        $lop = Lop::all();
        # code...
        return view('Lichtuan.Lich.LichCB',['thu' => $thu,'monhoc' => $monhoc, 'giaovien' => $giaovien ,'tiethoc' => $tiethoc, 'tuanhoc' => $tuanhoc,'max_date' => $max_date,'lop' => $lop]);
    }
}
