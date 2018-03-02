<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Giaovien;
use App\Monhoc;

class TeacherController extends Controller
{
    //
    public function index()
    {
        # code...
        $monhoc = Monhoc::all();
        $giaovien = DB::table('GIAOVIEN')
            ->leftJoin('PHANCONG','PHANCONG.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->leftJoin('LOP','LOP.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->select('GIAOVIEN.*','PHANCONG.MaGiaoVien as GVPC','LOP.MaGiaoVien as GVCN')
            ->groupBy('GIAOVIEN.MaGiaoVien')
            ->get();
        $giaovien_mon = DB::table('GIAOVIEN')
            ->join('PHANCONG','PHANCONG.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->join('MONHOC','MONHOC.MaMonHoc','=','PHANCONG.MaMonHoc')
            ->select('MONHOC.TenMonHoc','GIAOVIEN.MaGiaoVien')
            ->get();
        return view('Giaovien.Giaovien.DanhsachGV',['giaovien' => $giaovien,'giaovien_mon' => $giaovien_mon,'monhoc' => $monhoc, 'btn' => 'Thêm mới']);    
    }

    public function getUpdate($id){
        # code...

        $monhoc = Monhoc::all();
        $giaovien = DB::table('GIAOVIEN')
            ->leftJoin('PHANCONG','PHANCONG.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->leftJoin('LOP','LOP.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->select('GIAOVIEN.*','PHANCONG.MaGiaoVien as GVPC','LOP.MaGiaoVien as GVCN')
            ->groupBy('GIAOVIEN.MaGiaoVien')
            ->get();
        $giaovien_id = Giaovien::find($id);

        $giaovien_mon = DB::table('GIAOVIEN')
            ->join('PHANCONG','PHANCONG.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
            ->join('MONHOC','MONHOC.MaMonHoc','=','PHANCONG.MaMonHoc')
            ->select('MONHOC.TenMonHoc','GIAOVIEN.MaGiaoVien')
            ->groupBy('MONHOC.TenMonHoc')
            ->get();

        return view('Giaovien.Giaovien.DanhsachGV',['giaovien' => $giaovien, 'giaovien_mon' => $giaovien_mon,'monhoc' => $monhoc, 'giaovien_id' => $giaovien_id ,'btn' => 'Cập nhật']);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenGiaoVien' => 'required',
                'txtDiaChi'      => 'required',
                'txtDienThoai'   => 'required|regex:/(01)[0-9]/|min:9|max:11|unique:GIAOVIEN,DienThoai',
                'txtMaMon'       => 'required'
            ],
            [
                'txtTenGiaoVien.required' => 'Chưa nhập họ tên.',
                'txtDiaChi.required'      => 'Chưa nhập địa chỉ.',
                'txtDienThoai.regex'      => 'Định dạng số điện thoại bị sai.',
                'txtDienThoai.min'        => 'Số điện thoại tối thiểu 9 số',
                'txtDienThoai.max'        => 'Số điện thoại tối đa 11 số',
                'txtDienThoai.required'   => 'Chưa nhập số điện thoại.',
                'txtMaMon.required'       => 'Chưa chọn chuyên môn',
                'txtDienThoai.unique'     => 'Số điện thoại đã tồn tại.'
            ]
        );

        $giaovien = new Giaovien;
        $max = max_id('GIAOVIEN','MaGiaoVien','5');
        $max_id = $max[0]->max+1;
        $giaovien->MaGiaoVien = "GV00".$max_id;
        $giaovien->TenGiaoVien = $request->txtTenGiaoVien;
        $giaovien->DiaChi = $request->txtDiaChi;
        $giaovien->DienThoai = $request->txtDienThoai;
        $giaovien->MaMonHoc = $request->txtMaMon;
        $giaovien->save();
        return redirect('manage/giaovien/index')->with('notification','Thêm thành công.');
    }


    public function postUpdate(Request $request, $id){
        $this->validate($request,
            [
                'txtTenGiaoVien' => 'required',
                'txtDiaChi'      => 'required',
                'txtDienThoai'   => 'required|regex:/(01)[0-9]/|min:9|max:11|unique:GIAOVIEN,DienThoai,'.$id.',MaGiaoVien',
                'txtMaMon'       => 'required'
            ],
            [
                'txtTenGiaoVien.required' => 'Chưa nhập họ tên.',
                'txtDiaChi.required'      => 'Chưa nhập địa chỉ.',
                'txtDienThoai.regex'      => 'Định dạng số điện thoại bị sai.',
                'txtDienThoai.min'        => 'Số điện thoại tối thiểu 9 số',
                'txtDienThoai.max'        => 'Số điện thoại tối đa 11 số',
                'txtDienThoai.required'   => 'Chưa nhập số điện thoại.',
                'txtMaMon.required'       => 'Chưa chọn chuyên môn',
                'txtDienThoai.unique'     => 'Số điện thoại đã tồn tại.'
            ]
        );

        $giaovien = Giaovien::find($id);
        $giaovien->TenGiaoVien = $request->txtTenGiaoVien;
        $giaovien->DiaChi = $request->txtDiaChi;
        $giaovien->DienThoai = $request->txtDienThoai;
        $giaovien->MaMonHoc = $request->txtMaMon;
        $giaovien->save();
        return redirect('manage/giaovien/index')->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id){
        $giaovien = DB::table('GIAOVIEN')->where('MaGiaoVien','=',$id)->delete();
        return redirect('manage/giaovien/index')->with('notification','Xóa thành công.');
    }
}
