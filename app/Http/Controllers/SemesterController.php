<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Hocky;
use Session;

class SemesterController extends Controller
{
    //
    public function index(){
        $hocky = DB::table('HOCKY')
            ->leftJoin('DIEM','DIEM.MaHocKy','=','HOCKY.MaHocKy')
            ->select('HOCKY.*','DIEM.MaHocKy as MaDiemHK')
            ->groupBy('HOCKY.MaHocKy')
            ->get();
        return view('Nam-Ky.Hocky.Hocky',['hocky' => $hocky,'btn' => 'Thêm mới']);
    }

    public function getUpdate($id){
        $hocky = DB::table('HOCKY')
            ->leftJoin('DIEM','DIEM.MaHocKy','=','HOCKY.MaHocKy')
            ->select('HOCKY.*','DIEM.MaHocKy as MaDiemHK')
            ->groupBy('HOCKY.MaHocKy')
            ->get();
        $hocky_id = Hocky::find($id);
        return view('Nam-Ky.Hocky.Hocky',['hocky' => $hocky,'btn' => 'Cập nhật','hocky_id' => $hocky_id]);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenHocKy' => 'required',
                'txtHeSo'     => 'required|min:1|max:3|numeric'
            ],
            [
                'txtTenHocKy.required'  => 'Chưa nhập tên học kì.',
                'txtHeSo.required'      => 'Chưa nhập hệ số.',
                'txtHeSo.min'           => 'Hệ số tối thiểu là 1.',
                'txtHeSo.max'           => 'Hệ số tối đa là 2.'
            ]
        );

        $MaHocKy = "HK".substr($request->txtTenHocKy,-1);
        $hocky = new Hocky;
        $hocky->MaHocKy = $MaHocKy;
        $hocky->TenHocKy = $request->txtTenHocKy;
        $hocky->HeSo = $request->txtHeSo;

        $check_hk = DB::table('HOCKY')
            ->where('MaHocKy','=',$MaHocKy)
            ->selecT('*')
            ->get();
        if(count($check_hk) > 0){
            return redirect('manage/hocky/index')->with('notifi','Học kì này đã tồn tại.');
        }else{
            $hocky->save();
            return redirect('manage/hocky/index')->with('notification','Thêm thành công.');
        }
    }


    public function postUpdate(Request $request, $id){

        $this->validate($request,
            [
                'txtTenHocKy' => 'required|unique:HOCKY,TenHocKy,'.$id.',MaHocKy',
                'txtHeSo'     => 'required|min:1|max:3|numeric'
            ],
            [
                'txtTenHocKy.required'  => 'Chưa nhập tên học kì.',
                'txtHeSo.required'      => 'Chưa nhập hệ số.',
                'txtTenHocKy.unique'    => 'Học kỳ này đã có.',
                'txtHeSo.min'           => 'Hệ số tối thiểu là 1.',
                'txtHeSo.max'           => 'Hệ số tối đa là 2.'
            ]
        );

        $hocky =  Hocky::find($id);
        $hocky->TenHocKy = $request->txtTenHocKy;
        $hocky->HeSo = $request->txtHeSo;

        return redirect('manage/hocky/index')->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id){
        $hocky = Hocky::find($id)->delete();
        return redirect('manage/hocky/index')->with('notification','Xóa thành công.');
    }
}
