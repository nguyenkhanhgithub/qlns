<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Nghenghiep;

class JobController extends Controller
{

    //
    public function index(){
        $nghe = Nghenghiep::all();
        return view('Hocsinh.Nghenghiep.Nghenghiep',['nghe' => $nghe, 'btn' => 'Thêm mới']);
    }

    public function postInsert(Request $request)
    {
        $this->validate($request,
            [
                'txtTenNghe' => 'required|unique:NGHENGHIEP,TenNghe'
            ],
            [
                'txtTenNghe.required' => 'Chưa nhập tên nghề.',
                'txtTenNghe.unique' => 'Tên nghề đã tồn tại.'
            ]
        );

        $nghe = new Nghenghiep;
        $nghe->TenNghe = $request->txtTenNghe;
        $max = max_id('NGHENGHIEP', 'MaNghe', '5');
        $max_id = $max[0]->max + 1;
        $nghe->MaNghe = "NN00".($max_id);
        $nghe->save();
        return redirect('manage/nghenghiep/index')->with('notification', 'Thêm thành công.');
    }

    public function getUpdate($id){
        $nghe_id = Nghenghiep::find($id);
        $nghe = Nghenghiep::all();
        return view('Hocsinh.Nghenghiep.Nghenghiep',['nghe_id' => $nghe_id,'nghe' => $nghe,'btn' => 'Cập nhật']);
    }
    public function postUpdate(Request $request,$id){

        $this->validate($request,
            [
                'txtTenNghe' => 'required|unique:NGHENGHIEP,TenNghe,'.$id.',MaNghe'
            ],
            [
                'txtTenNghe.required' => 'Chưa nhập tên nghề.',
                'txtTenNghe.unique' => 'Tên nghề đã tồn tại.'
            ]
        );

        $nghe = Nghenghiep::find($id);
        $nghe->TenNghe= $request->txtTenNghe;
        $nghe->save();
        return redirect('manage/nghenghiep/index')->with('notification', 'Cập nhật thành công.');
    }
}
