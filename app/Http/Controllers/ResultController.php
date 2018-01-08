<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ketqua;
use Session;
class ResultController extends Controller
{
    //
    public function index(){
        $ketqua = DB::table('KETQUA')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaKetQua','=','KETQUA.MaKetQua')
            ->select('KETQUA.*','KQ_CA_NAM_TONG_HOP.MaKetQua as KQNam')
            ->get();
        return view('KQHLHK.Ketqua.Ketqua',['ketqua' => $ketqua,'btn' => 'Thêm mới']);
    }

    //
    public function getUpdate($id){
        $ketqua = DB::table('KETQUA')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaKetQua','=','KETQUA.MaKetQua')
            ->select('KETQUA.*','KQ_CA_NAM_TONG_HOP.MaKetQua as KQNam')
            ->get();
        $ketqua_id = Ketqua::find($id);
        return view('KQHLHK.Ketqua.Ketqua',['ketqua' => $ketqua,'btn' => 'Cập nhật', 'ketqua_id' => $ketqua_id]);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenKetQua'  => 'required|unique:KETQUA,TenKetQua'
            ],
            [
                'txtTenKetQua.required' => 'Chưa nhập kết quả.',
                'txtTenKetQua.unique'   => 'Kết quả này đã có.',
            ]
        );
        $max = max_id('KETQUA','MaKetQua','5');
        $max_id = $max[0]->max+1;
        $ketqua = new Ketqua;

        $ketqua->MaKetQua = "KQ000".$max_id;
        $ketqua->TenKetQua = $request->txtTenKetQua;

        $ketqua->save();
        return redirect('manage/ketqua/index')->with('notification','Thêm thành công.');
    }

    public function postUpdate(Request $request, $id){
        $ketqua = Ketqua::find($id);
        $this->validate($request,
            [
                'txtTenKetQua'  => 'required|unique:KETQUA,TenKetQua,'.$id.',MaKetQua'
            ],
            [
                'txtTenKetQua.required' => 'Chưa nhập kết quả.',
                'txtTenKetQua.unique'   => 'Kết quả này đã có.',
            ]
        );

        $ketqua->TenKetQua = $request->txtTenKetQua;$ketqua->save();
        return redirect('manage/ketqua/index')->with('notification','Cập nhật thành công.');

    }

    public function getDelete($id){
        $ketqua = Ketqua::find($id)->delete();
        return redirect('manage/ketqua/index')->with('notification','Xóa thành công.');
    }
}
