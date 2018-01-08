<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use App\Hocky;
use App\Lop;
use App\Hocsinh;
class TotalPointcontroller extends Controller
{
    //
    public function index()
    {
        # code...
        $namhoc = Namhoc::all();
        $hocky = Hocky::all();
        $lop = Lop::all();
        return view('Thongke.LH.HKLH',['namhoc' => $namhoc, 'hocky' => $hocky, 'lop' => $lop]);
    }

    public function getSearch(Request $request)
    {
		
        $namhoc = Namhoc::all();
        $hocky = Hocky::all();
        $lop = Lop::all();


        $this->validate($request,
            [
                'txtLop' => 'required',
                'txtNamhoc' => 'required',
                'txtHocky'  => 'required'
            ],
            [
                'txtLop.required' => 'Chưa chọn lớp.',
                'txtNamhoc.required'    => 'Chưa chọn năm học.',
                'txtHocky.required'     => 'Chưa chọn học kỳ.'
            ]
        );

        # code...
        $keyword = array(
            'namhoc' => $request->get('txtNamhoc'),
            'lop'    => $request->get('txtLop'),
            'hocky'  => $request->get('txtHocky')
        );


        $hocsinh = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->where('PHANLOP.MaNamHoc','=',$keyword['namhoc'])
            ->where('PHANLOP.MaLop','=',$keyword['lop'])
            ->select('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh','LOP.MaLop')
            ->paginate(20);
           
        $thongke = DB::table('HOCSINH')
            ->leftJoin('KQ_HOC_KY_TONG_HOP','KQ_HOC_KY_TONG_HOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->leftJoin('HOCKY','KQ_HOC_KY_TONG_HOP.MaHocKy','=','HOCKY.MaHocKy')
            ->leftJoin('NAMHOC','KQ_HOC_KY_TONG_HOP.MaNamHoc','=','NAMHOC.MaNamHoc')
            ->leftJoin('HOCLUC','KQ_HOC_KY_TONG_HOP.MaHocLuc','=','HOCLUC.MaHocLuc')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->where('KQ_HOC_KY_TONG_HOP.MaNamHoc','=',$keyword['namhoc'])
            ->where('LOP.MaLop','=',$keyword['lop'])
            ->where('KQ_HOC_KY_TONG_HOP.MaHocKy','=',$keyword['hocky'])
            ->select('HOCLUC.TenHocLuc','HOCKY.TenHocKy','NAMHOC.TenNamHoc','HOCSINH.MaHocSinh','KQ_HOC_KY_TONG_HOP.DTBMonHocKy')
            ->get();
        
        return view('Thongke.LH.HKLH', ['keyword' => $keyword, 'namhoc' => $namhoc, 'hocky' => $hocky, 'lop' => $lop,'hocsinh' => $hocsinh,'thongke' => $thongke,'MaNH'=> $request->get('txtNamhoc')]);
    }

    public function objectpoint(Request $request)
    {
        # code...
        $diemmon = DB::table('DIEM');
        $hocky = Hocky::all();
        $hocsinh_id = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->where('HOCSINH.MaHocSinh','=',$request->get('MaHS'))
            ->select('HOCSINH.HoTen','LOP.TenLop','PHANLOP.MaLop','HOCSINH.MaHocSinh')
            ->get();
        
        return view('Thongke.LH.DanhsachDiem',['hocsinh_id' => $hocsinh_id,'hocky' => $hocky,'namhoc' => $request->get('MaNH')]);
    }
}
