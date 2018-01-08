<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use App\Lop;
use App\Hocky;
use App\Monhoc;
use App\Diem;
use App\Phanlop;
use App\Hocsinh;
use App\Loaidiem;
use Session;

class PointsController extends Controller
{
    //
    public function index(Request $request){
        $namhoc = Namhoc::all();
        $lop = Lop::all();
        $hocky = Hocky::all();
        return view('Mon-Diem.Diem.DiemMon',['namhoc' => $namhoc, 'lop' => $lop,'hocky' => $hocky]);
    }

    public function getSearch(Request $request){

        $namhoc = Namhoc::all();
        $hocky = Hocky::all();

        $this->validate($request,
            [
                'txtLop' => 'required',
                'txtNamhoc' => 'required',
                'txtHocky'  => 'required',
                'txtMonhoc' => 'required'
            ],
            [
                'txtLop.required' => 'Chưa chọn lớp.',
                'txtNamhoc.required'    => 'Chưa chọn năm học.',
                'txtHocky.required'     => 'Chưa chọn học kỳ.',
                'txtMonhoc.required'    => 'Chưa chọn môn hoc.'
            ]
        );

        $keyword = array(
            'lop_tk' => $request->get('txtLop'),
            'namhoc_tk' => $request->get('txtNamhoc'),
            'hocky_tk'  => $request->get('txtHocky'),
            'monhoc_tk' => $request->get('txtMonhoc')
        );
        $monhoc = DB::table('MONHOC')
            ->join('PHANCONG','PHANCONG.MaMonHoc','=','MONHOC.MaMonHoc')
            ->where('PHANCONG.MaNamHoc','=',$request->get('txtNamhoc'))
            ->where('PHANCONG.MaLop','=',$request->get('txtLop'))
            ->select('MONHOC.MaMonHoc','MONHOC.TenMonHoc')
            ->groupBy('MONHOC.MaMonHoc')
            ->get();

        $lop = DB::table('LOP')
            ->where('MaNamHoc','=',$keyword['namhoc_tk'])
            ->select('*')
            ->get();


        $all = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->join('PHANCONG','PHANCONG.MaLop','=','LOP.MaLop')
            ->join('MONHOC','MONHOC.MaMonHoc','=','PHANCONG.MaMonHoc')
            ->LeftJoin('DIEM','DIEM.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->where('LOP.MaLop','=',$keyword['lop_tk'])
            ->where('MONHOC.MaMonHoc','=',$keyword['monhoc_tk'])
            ->where('LOP.MaNamHoc','=',$keyword['namhoc_tk'])
            ->select('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh')
            ->groupBy('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh')
            ->paginate(10);
        

        $diem = DB::table('DIEM')
            ->rightJoin('HOCSINH','DIEM.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->select('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh',
                DB::raw("
                    max(CASE WHEN DIEM.MaLoai = 'LD0001' THEN DIEM.Diem END) AS DiemMieng,
                    max(CASE WHEN DIEM.MaLoai = 'LD0002' THEN DIEM.Diem END) AS Diem15P,
                    max(CASE WHEN DIEM.MaLoai = 'LD0003' THEN DIEM.Diem END) AS Diem45P,
                    max(CASE WHEN DIEM.MaLoai = 'LD0004' THEN DIEM.Diem END) AS DiemThi
                ")
            )
            ->where('DIEM.MaLop','=',$keyword['lop_tk'])
            ->where('DIEM.MaNamHoc','=',$keyword['namhoc_tk'])
            ->where('DIEM.MaHocKy','=',$keyword['hocky_tk'])
            ->where('DIEM.MaMonHoc','=',$keyword['monhoc_tk'])
            ->groupBy('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.NgaySinh')
            ->get();

        return view('Mon-Diem.Diem.DiemMon',['namhoc' => $namhoc, 'lop' => $lop,'hocky' => $hocky,'monhoc' => $monhoc,'diem' => $diem,'keyword' => $keyword,'all' => $all]);
    }

    public function getInsert(Request $request,$id){

        $namhoc = Namhoc::all();
        $hocky = Hocky::all();
        $monhoc = Monhoc::all();
        $loaidiem = Loaidiem::all();

        $hocsinh = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->select('HOCSINH.HoTen','LOP.TenLop','LOP.MaLop','HOCSINH.MaHocSinh')
            ->where('HOCSINH.MaHocSinh','=',$id)
            ->get();

        return view('Mon-Diem.Diem.insertDiem',['hocsinh' => $hocsinh, 'namhoc' => $namhoc, 'hocky' => $hocky, 'monhoc' => $monhoc, 'loaidiem' => $loaidiem]);
    }

    public function postInsert(Request $request, $id){

        $this->validate($request,
            [
                'txtDiem'     => 'required|min:1|max:10|numeric',
                'txtNamhoc' => 'required',
                'txtHocky'  => 'required',
                'txtLoaiDiem' => 'required',
                'txtMonhoc'   => 'required',
            ],
            [
                'txtNamhoc.required' => 'Chưa chọn năm học.',
                'txtHocky.required'  => 'Chưa chọn học kỳ.',
                'txtLoaiDiem.required'  => 'Chưa chọn loại điểm.',
                'txtMonhoc.required'    => 'Chưa chọn môn học.',
                'txtDiem.required'      => 'Chưa nhập điểm.',
                'txtDiem.min'           => 'Số điểm tối thiểu là 1.',
                'txtDiem.max'           => 'Số điểm tối đa là 10.'
            ]
        );

        $diem = new Diem;
        $diem->MaHocSinh = $id;
        $diem->MaMonHoc = $request->txtMonhoc;
        $diem->MaHocKy = $request->txtHocky;
        $diem->MaNamHoc = $request->txtNamhoc;
        $diem->MaLop = $request->txtMaLop;
        $diem->MaLoai = $request->txtLoaiDiem;
        $diem->Diem = $request->txtDiem;

        $diem_check = DB::table('DIEM')
            ->select('DIEM.MaHocSinh')
            ->where('MaHocSinh','=',$id)
            ->where('MaNamHoc','=',$request->txtNamhoc)
            ->where('MaHocKy','=',$request->txtHocky)
            ->where('MaLoai','=',$request->txtLoaiDiem)
            ->where('MaMonHoc','=',$request->txtMonhoc)
            ->get();
        if(count($diem_check) > 0){
            return redirect('manage/diem/getInsert/'.$id)->with('notification','danger');
        }else{
            $diem->save();
            return redirect('manage/diem/getInsert/'.$id)->with('notification','success');
        }
    }


}
