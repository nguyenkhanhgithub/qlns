<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Hocsinh;
use App\Nghenghiep;
use App\Dantoc;
use App\Tongiao;

class StudentController extends Controller
{
    //
    public function index(){

        $ngheN = Nghenghiep::all();
        $hocsinh = DB::table('HOCSINH')
            
            ->leftJoin('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->leftJoin('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->leftJoin('DANTOC','DANTOC.MaDanToc','=','HOCSINH.MaDanToc')
            ->leftJoin('TONGIAO','TONGIAO.MaTonGiao','=','HOCSINH.MaTonGiao')
            ->select('HOCSINH.MaHocSinh','HOCSINH.HoTen','HOCSINH.GioiTinh','HOCSINH.NgaySinh','HOCSINH.MaTonGiao','HOCSINH.MaDanToc','HOCSINH.NoiSinh','HOCSINH.HoTenCha','HOCSINH.HoTenMe','HOCSINH.MaNNghiepCha','HOCSINH.MaNNghiepMe','DANTOC.TenDanToc','TONGIAO.TenTonGiao','PHANLOP.MaHocSinh as MaHSPL')
            ->paginate(20);
        return view('Hocsinh.Hocsinh.DanhsachHS',['hocsinh' => $hocsinh,'ngheN' => $ngheN]);
    }

    public function getUpdate($id){
        $hocsinh = Hocsinh::find($id);
        $dantoc = Dantoc::all();
        $ngheN = Nghenghiep::all();
        $tongiao = Tongiao::all();
        return view('Hocsinh.Hocsinh.updateHS',['hocsinh' => $hocsinh, 'dantoc' => $dantoc, 'ngheN' => $ngheN, 'tongiao' => $tongiao]);
    }

    public function postUpdate(Request $request, $id)
    {
        # code...
        $this->validate($request,
            [
                'txtNgaySinh' => 'required',
                'txtDanToc'   => 'required',
                'txtTonGiao'  => 'required',
                'txtHoTenCha' => 'required',
                'txtHoTenMe'  => 'required',
                'txtNNCha'    => 'required',
                'txtNNMe'     => 'required',    
            ],
            [
                'txtNgaySinh.required'  => 'Chưa chọn ngày sinh.',
                'txtDanToc.required'  => 'Chưa chọn dân tộc.',
                'txtTonGiao.required'   => 'Chưa chọn tôn giáo.',
                'txtHoTenCha.required'  => 'Chưa nhập họ tên cha.',
                'txtHoTenMe.required'   => 'Chưa nhập họ tên mẹ.',
                'txtNNCha.required'     => 'Chưa chọn nghề nghiệp cha.',
                'txtNNMe.required'      => 'Chưa chọn nghề nghiệp mẹ.'
            ]
        );
        $hocsinh = Hocsinh::find($id);
        $hocsinh->NgaySinh = $request->txtNgaySinh;
        $hocsinh->GioiTinh = $request->rdGioiTinh;
        $hocsinh->MaDanToc = $request->txtDanToc;
        $hocsinh->MaTonGiao = $request->txtTonGiao;
        $hocsinh->HoTenCha = $request->txtHoTenCha;
        $hocsinh->HoTenMe = $request->txtHoTenMe;
        $hocsinh->MaNNghiepCha = $request->txtNNCha;
        $hocsinh->MaNNghiepMe = $request->txtNNMe;
        $hocsinh->save();
        return redirect('manage/hocsinh/getUpdate/'.$id)->with('notification','Cập nhật thành công.');
    }

    public function getInsert()
    {
        $dantoc = Dantoc::all();
        $ngheN = Nghenghiep::all();
        $tongiao = Tongiao::all();
        return view('Hocsinh.Hocsinh.insertHS',['dantoc' => $dantoc, 'ngheN' => $ngheN, 'tongiao' => $tongiao]);
    }

    public function postInsert(Request $request)
    {

        # code...
        $this->validate($request,
            [
                'txtHoTen'    => 'required',
                'txtNgaySinh' => 'required',
                'txtDanToc'   => 'required',
                'txtTonGiao'  => 'required',
                'txtHoTenCha' => 'required',
                'txtHoTenMe'  => 'required',
                'txtNNCha'    => 'required',
                'txtNNMe'     => 'required',
            ],
            [
                'txtNgaySinh.required'  => 'Chưa chọn ngày sinh.',
                'txtDanToc.required'  => 'Chưa chọn dân tộc.',
                'txtHoTen.required'     => 'Chưa nhập họ tên.',
                'txtTonGiao.required'   => 'Chưa chọn tôn giáo.',
                'txtHoTenCha.required'  => 'Chưa nhập họ tên cha.',
                'txtHoTenMe.required'   => 'Chưa nhập họ tên mẹ.',
                'txtNNCha.required'     => 'Chưa chọn nghề nghiệp cha.',
                'txtNNMe.required'      => 'Chưa chọn nghề nghiệp mẹ.'
            ]
        );
        $max = max_id('HOCSINH','MaHocSinh','5');
        $max_id = $max[0]->max+1;
        $hocsinh = new Hocsinh;
        $hocsinh->MaHocSinh = "HS00".$max_id;
        $hocsinh->HoTen = $request->txtHoTen;
        $hocsinh->NgaySinh = $request->txtNgaySinh;
        $hocsinh->MaDanToc = $request->txtDanToc;
        $hocsinh->MaTonGiao = $request->txtTonGiao;
        $hocsinh->HoTenCha = $request->txtHoTenCha;
        $hocsinh->HoTenMe = $request->txtHoTenMe;
        $hocsinh->MaNNghiepCha = $request->txtNNCha;
        $hocsinh->MaNNghiepMe = $request->txtNNMe;
        $hocsinh->save();
        return redirect('manage/hocsinh/getInsert/')->with('notification','Thêm thành công.');
    }

    public function getDelete($id){
        $hocsinh = Hocsinh::find($id)->delete();
        return redirect('manage/hocsinh/index')->with('notification','Xóa thành công.');
    }
}
