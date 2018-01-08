<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Hocluc;
use Session;

class AcadeStrController extends Controller
{
    //
    public function index(){
        $hocluc = DB::table('HOCLUC')
            ->leftJoin('KQ_HOC_KY_TONG_HOP','KQ_HOC_KY_TONG_HOP.MaHocLuc','=','HOCLUC.MaHocLuc')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaHocLuc','=','HOCLUC.MaHocLuc')
            ->select('HOCLUC.*','KQ_CA_NAM_TONG_HOP.MaHocLuc as HLNam','KQ_HOC_KY_TONG_HOP.MaHocLuc as HLKy')
            ->get();
        return view('KQHLHK.Hocluc.Hocluc',['hocluc' => $hocluc,'btn' => 'Thêm mới']);
    }

    public function getUpdate($id){

        $hocluc = DB::table('HOCLUC')
            ->leftJoin('KQ_HOC_KY_TONG_HOP','KQ_HOC_KY_TONG_HOP.MaHocLuc','=','HOCLUC.MaHocLuc')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaHocLuc','=','HOCLUC.MaHocLuc')
            ->select('HOCLUC.*','KQ_CA_NAM_TONG_HOP.MaHocLuc as HLNam','KQ_HOC_KY_TONG_HOP.MaHocLuc as HLKy')
            ->get();
        $hocluc_id = Hocluc::find($id);
        return view('KQHLHK.Hocluc.Hocluc',['hocluc' => $hocluc,'hocluc_id' => $hocluc_id,'btn' => 'Cập nhật']);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenHocLuc' => 'required|unique:HOCLUC,TenHocLuc',
                'txtCanDuoi'   => 'required|min:1|max:10|numeric',
                'txtCanTren'   => 'required|min:1|max:10|numeric',
                'txtKhongChe'   => 'required|min:1|max:10|numeric',
            ],
            [
                'txtTenHocLuc.required' => 'Chưa nhập tên học lực.',
                'txtTenHocLuc.unique'   => 'Học lực đã có.',
                'txtCanDuoi.required'   => 'Chưa nhập điểm cận dưới.',
                'txtCanDuoi.min'        => 'Điểm cận dưới thấp nhất là 1.',
                'txtCanDuoi.max'        => 'Điểm cận dưới cao nhất là 10.',
                'txtCanTren.required'   => 'Chưa nhập điểm cận trên.',
                'txtCanTren.min'        => 'Điểm cận trên thấp nhất là 1.',
                'txtCanTren.max'        => 'Điểm cận trên cao nhất là 10.',
                'txtKhongChe.required'   => 'Chưa nhập điểm khống chế.',
                'txtKhongChe.min'        => 'Điểm khống chế thấp nhất là 1.',
                'txtKhongChe.max'        => 'Điểm khống chế cao nhất là 10.',
            ]
        );

        $max = max_id('HOCLUC','MaHocLuc','5');
        $max_id = $max[0]->max+1;

        $hocluc = new Hocluc;
        $hocluc->MaHocLuc = "HL000".$max_id;
        $hocluc->TenHocLuc = $request->txtTenHocLuc;
        $hocluc->DiemCanDuoi = $request->txtCanDuoi;
        $hocluc->DiemCanTren = $request->txtCanTren;
        $hocluc->DiemKhongChe = $request->txtKhongChe;

        $hocluc->save();
        return redirect('manage/hocluc/index')->with('notification','Thêm thành công.');
    }


    public function postUpdate(Request $request, $id){
        $this->validate($request,
            [
                'txtTenHocLuc' => 'required|unique:HOCLUC,TenHocLuc,'.$id.',MaHocLuc',
                'txtCanDuoi'   => 'required|min:1|max:10|numeric',
                'txtCanTren'   => 'required|min:1|max:10|numeric',
                'txtKhongChe'   => 'required|min:1|max:10|numeric',
            ],
            [
                'txtTenHocLuc.required' => 'Chưa nhập tên học lực.',
                'txtTenHocLuc.unique'   => 'Học lực đã có.',
                'txtCanDuoi.required'   => 'Chưa nhập điểm cận dưới.',
                'txtCanDuoi.min'        => 'Điểm cận dưới thấp nhất là 1.',
                'txtCanDuoi.max'        => 'Điểm cận dưới cao nhất là 10.',
                'txtCanTren.required'   => 'Chưa nhập điểm cận trên.',
                'txtCanTren.min'        => 'Điểm cận trên thấp nhất là 1.',
                'txtCanTren.max'        => 'Điểm cận trên cao nhất là 10.',
                'txtKhongChe.required'   => 'Chưa nhập điểm khống chế.',
                'txtKhongChe.min'        => 'Điểm khống chế thấp nhất là 1.',
                'txtKhongChe.max'        => 'Điểm khống chế cao nhất là 10.',
            ]
        );

        $hocluc = Hocluc::find($id);
        $hocluc->TenHocLuc = $request->txtTenHocLuc;
        $hocluc->DiemCanDuoi = $request->txtCanDuoi;
        $hocluc->DiemCanTren = $request->txtCanTren;
        $hocluc->DiemKhongChe = $request->txtKhongChe;

        $hocluc->save();
        return redirect('manage/hocluc/index')->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id){
        $hocluc = Hocluc::find($id)->delete();
        return redirect('manage/hocluc/index')->with('notification','Xóa thành công.');
    }
}
