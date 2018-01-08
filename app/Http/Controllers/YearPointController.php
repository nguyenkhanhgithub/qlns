<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use App\Lop;

class YearPointController extends Controller
{
    //
    public function index()
    {
        # code...
        $namhoc = Namhoc::all();
        $lop = Lop::all();
        return view('Thongke.KQ.CanamLH',['namhoc' => $namhoc, 'lop' => $lop]);
    }

    public function getSearch(Request $request)
    {
        $namhoc = Namhoc::all();
        $lop = Lop::all();

        $this->validate($request,
            [
                'txtNamhoc' => 'required',
                'txtLop'    => 'required'
            ],
            [
                'txtNamhoc.required' =>'Chưa chọn năm học!',
                'txtLop.required'   => 'Chưa chọn lớp học!'
            ]
        );
        $keyword = array(
            'namhoc' => $request->get('txtNamhoc'),
            'lop'    => $request->get('txtLop')
        );

        # code...
        $hocsinh = DB::table('hocsinh')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->where('PHANLOP.MaNamHoc','=',$keyword['namhoc'])
            ->where('PHANLOP.MaLop','=',$keyword['lop'])
            ->select('HOCSINH.HoTen','HOCSINH.NgaySinh','LOP.MaLop','LOP.TenLop','HOCSINH.MaHocSinh')
            ->paginate(20);
        $diem = DB::table('KQ_CA_NAM_TONG_HOP')
            ->join('HOCLUC','HOCLUC.MaHocLuc','=','KQ_CA_NAM_TONG_HOP.MaHocLuc')
            ->where('MaNamHoc','=',$keyword['namhoc'])
            ->where('MaLop','=',$keyword['lop'])
            ->select('KQ_CA_NAM_TONG_HOP.MaHocSinh','KQ_CA_NAM_TONG_HOP.DTBCaNam','HOCLUC.TenHocLuc')
            ->get();

        return view('Thongke.KQ.CanamLH',['namhoc' => $namhoc, 'lop' => $lop,'keyword' => $keyword, 'hocsinh' => $hocsinh ,'diem' => $diem]);
    }
}
