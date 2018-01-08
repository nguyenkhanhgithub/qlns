<?php

namespace App\Http\Controllers;

use App\Monhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use Session;

class YearController extends Controller
{
    //
    public function index(){
        $namhoc = DB::table('NAMHOC')
            ->leftJoin('LOP','LOP.MaNamHoc','=','NAMHOC.MaNamHoc')
            ->select('NAMHOC.*','LOP.MaNamHoc as MaLopNam')
            ->groupBy('NAMHOC.MaNamHoc')
            ->get();

        return view('Nam-Ky.Namhoc.DanhsachNam',['namhoc' => $namhoc,'btn' => 'Thêm mới']);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtNambatdau'  => 'required',
                'txtNamketthuc' => 'required',
            ],
            [
                'txtNambatdau.required' => 'Chưa nhập năm bắt đầu.',
                'txtNamketthuc.required'    => 'Chưa nhập năm kết thúc.'
            ]
        );

        $namhoc = new Namhoc;
        $namhoc->TenNamHoc = $request->txtNambatdau." - ".$request->txtNamketthuc;
        $namhoc->MaNamHoc = "NH".substr($request->txtNambatdau,-2).substr($request->txtNamketthuc,-2);
        $check_nam = DB::table('NAMHOC')
            ->where('MaNamHoc','=',"NH".substr($request->txtNambatdau,-2).substr($request->txtNamketthuc,-2))
            ->select('*')
            ->get();
        if(count($check_nam) > 0){
            return redirect('manage/nam/index')->with('notifi','Năm học này đã có');
        }else{
            $namhoc->save();
            return redirect('manage/nam/index')->with('notification','Thêm thành công');
        }
    }

    public function getUpdate($id){

        $namhoc_id = Namhoc::find($id);
        $namhoc = DB::table('NAMHOC')
            ->leftJoin('LOP','LOP.MaNamHoc','=','NAMHOC.MaNamHoc')
            ->select('NAMHOC.*','LOP.MaNamHoc as MaLopNam')
            ->groupBy('NAMHOC.MaNamHoc')
            ->get();

        return view('Nam-Ky.Namhoc.DanhsachNam',['namhoc_id' => $namhoc_id, 'namhoc' => $namhoc ,'btn' => 'Cập nhật']);
    }

    public function postUpdate(Request $request, $id){
        $this->validate($request,
            [
                'txtNambatdau'  => 'required',
                'txtNamketthuc' => 'required',
            ],
            [
                'txtNambatdau.required' => 'Chưa nhập năm bắt đầu.',
                'txtNamketthuc.required'    => 'Chưa nhập năm kết thúc.'
            ]
        );

        $TenNamHoc = $request->txtNambatdau." - ".$request->txtNamketthuc;
        $namhoc = Namhoc::find($id);
        $namhoc->TenNamHoc = $TenNamHoc;
        $namhoc->save();
        return redirect('manage/nam/index')->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id){
        $namhoc = Namhoc::find($id)->delete();
        return redirect('manage/nam/index')->with('notification','Xóa thành công.');
    }
}
