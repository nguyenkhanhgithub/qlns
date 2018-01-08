<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Hanhkiem;
use Illuminate\Support\Facades\DB;

class ConductController extends Controller
{
    //
    public function index(){

        $hanhkiem = DB::table('HANHKIEM')
            ->leftJoin('KQ_HOC_KY_TONG_HOP','KQ_HOC_KY_TONG_HOP.MaHanhKiem','=','HANHKIEM.MaHanhKiem')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaHanhKiem','=','HANHKIEM.MaHanhKiem')
            ->select('HANHKIEM.*','KQ_CA_NAM_TONG_HOP.MaHanhKiem as HKNam','KQ_HOC_KY_TONG_HOP.MaHanhKiem as HKKy')
            ->get();
        return view('KQHLHK.Hanhkiem.Hanhkiem',['hanhkiem' => $hanhkiem,'btn' => 'Thêm mới']);
    }
    public function getUpdate($id){

        $hanhkiem = DB::table('HANHKIEM')
            ->leftJoin('KQ_HOC_KY_TONG_HOP','KQ_HOC_KY_TONG_HOP.MaHanhKiem','=','HANHKIEM.MaHanhKiem')
            ->leftJoin('KQ_CA_NAM_TONG_HOP','KQ_CA_NAM_TONG_HOP.MaHanhKiem','=','HANHKIEM.MaHanhKiem')
            ->select('HANHKIEM.*','KQ_CA_NAM_TONG_HOP.MaHanhKiem as HKNam','KQ_HOC_KY_TONG_HOP.MaHanhKiem as HKKy')
            ->get();
        $hanhkiem_id = Hanhkiem::find($id);
        return view('KQHLHK.Hanhkiem.Hanhkiem',['hanhkiem' => $hanhkiem,'hanhkiem_id' => $hanhkiem_id,'btn' => 'Cập nhật']);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenHanhKiem' => 'required|unique:HANHKIEM,TenHanhKiem'
            ],
            [
                'txtTenHanhKiem.required' => 'Chưa nhập tên hạnh kiểm.',
                'txtTenHanhKiem.unique'   => 'Tên hạnh kiểm đã có.'
            ]
        );


        $max = max_id('HANHKIEM','MaHanhKiem','5');
        $max_id = $max[0]->max+1;

        $hanhkiem = new Hanhkiem;
        $hanhkiem->MaHanhKiem = "HK000".$max_id;
        $hanhkiem->TenHanhKiem = $request->txtTenHanhKiem;

        $hanhkiem->save();
        return redirect('manage/hanhkiem/index')->with('notification','Thêm thành công.');
    }


    public function postUpdate(Request $request, $id){
        $this->validate($request,
            [
                'txtTenHanhKiem' => 'required|unique:HANHKIEM,TenHanhKiem,'.$id.',MaHanhKiem'
            ],
            [
                'txtTenHanhKiem.required' => 'Chưa nhập tên hạnh kiểm.',
                'txtTenHanhKiem.unique'   => 'Tên hạnh kiểm đã có.'
            ]
        );

        $hanhkiem = Hanhkiem::find($id);
        $hanhkiem->TenHanhKiem = $request->txtTenHanhKiem;
        $hanhkiem->save();
        return redirect('manage/hanhkiem/index')->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id){
        $hanhkiem = Hanhkiem::find($id)->delete();
        return redirect('manage/hanhkiem/index')->with('notification','Xóa thành công.');
    }
}
