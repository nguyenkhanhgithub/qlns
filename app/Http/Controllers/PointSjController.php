<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use session;
use App\Namhoc;
use App\Hocky;
use App\Monhoc;
class PointSjController extends Controller
{
    //
    public function index()
    {
        # code...
        $monhoc = Monhoc::all();
        $namhoc = Namhoc::all();
        $hocky = Hocky::all();
        return view('Thongke.DTBMon.DTBMON',['monhoc' =>  $monhoc,'namhoc' => $namhoc, 'hocky' => $hocky]);
    }

    public function getSearch(Request $request)
    {
        $monhoc = Monhoc::all();
        $namhoc = Namhoc::all();
        $hocky = Hocky::all();

        $this->validate($request,
            [
                'txtMonhoc' => 'required',
                'txtNamhoc' => 'required',
                'txtHocky'  => 'required'
            ],
            [
                'txtMonhoc.required' => 'Chưa chọn môn học.',
                'txtNamhoc.required'    => 'Chưa chọn năm học.',
                'txtHocky.required'     => 'Chưa chọn học kỳ.'
            ]
        );
        
        $keyword = array(
            'hocky' => $request->get('txtHocky'),
            'namhoc' => $request->get('txtNamhoc'),
            'monhoc' => $request->get('txtMonhoc')
        );


        # code...
        $hocsinh = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->select('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh','LOP.TenLop')
            ->paginate(20);

        $diem = DB::table('KQ_HOC_KY_MON_HOC')
            ->where('MaNamHoc','=',$keyword['namhoc'])
            ->where('MaHocKy','=',$keyword['hocky'])
            ->where('MaMonHoc','=',$keyword['monhoc'])
            ->select('KQ_HOC_KY_MON_HOC.DTBMonHocKy','KQ_HOC_KY_MON_HOC.MaHocSinh')
            ->get();

        return view('Thongke.DTBMon.DTBMON',['monhoc' =>  $monhoc,'namhoc' => $namhoc, 'hocky' => $hocky, 'keyword' => $keyword, 'hocsinh' => $hocsinh,'diem' => $diem]);
    }
}
