<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Tongiao;

class ReligionController extends Controller
{

    //
    public function index(){
        $tongiao = DB::table('TONGIAO')
            ->leftJoin('HOCSINH','HOCSINH.MaTonGiao','=','TONGIAO.MaTonGiao')
            ->select('TONGIAO.*','HOCSINH.MaTonGiao as HSTG')
            ->groupBy('TONGIAO.MaTonGiao')
            ->paginate(10);
        return view('Hocsinh.Tongiao.Tongiao',['tongiao' => $tongiao, 'btn' => 'Thêm mới']);
    }

    public function postInsert(Request $request)
    {
        $this->validate($request,
            [
                'txtTenTonGiao' => 'required|unique:TONGIAO,TenTonGiao'
            ],
            [
                'txtTenTonGiao.required' => 'Chưa nhập tên tôn giáo.',
                'txtTenTonGiao.unique' => 'Tên tôn giáo đã tồn tại.'
            ]
        );

        $tongiao = new Tongiao;
        $tongiao->TenTonGiao = $request->txtTenTonGiao;
        $max = max_id('TONGIAO', 'MaTonGiao', '5');
        $max_id = $max[0]->max + 1;
        $tongiao->MaTonGiao = "TG00" . ($max_id);
        $tongiao->save();
        return redirect('manage/tongiao/index')->with('notification', 'Thêm thành công.');
    }

    public function getUpdate($id){
        $tongiao_id = Tongiao::find($id);
        $tongiao = DB::table('TONGIAO')
            ->leftJoin('HOCSINH','HOCSINH.MaTonGiao','=','TONGIAO.MaTonGiao')
            ->select('TONGIAO.*','HOCSINH.MaTonGiao as HSTG')
            ->groupBy('TONGIAO.MaTonGiao')
            ->paginate(10);
        return view('Hocsinh.Tongiao.Tongiao',['tongiao_id' => $tongiao_id,'tongiao' => $tongiao,'btn' => 'Cập nhật']);
    }

    public function postUpdate(Request $request,$id){

        $this->validate($request,
            [
                'txtTenTonGiao' => 'required|unique:TONGIAO,TenTonGiao,'.$id.',MaTonGiao'
            ],
            [
                'txtTenTonGiao.required' => 'Chưa nhập tên tôn giáo.',
                'txtTenTonGiao.unique' => 'Tên tôn giáo đã tồn tại.'
            ]
        );
        $tongiao = Tongiao::find($id);
        $tongiao->TenTonGiao = $request->txtTenTonGiao;
        $tongiao->save();
        return redirect('manage/tongiao/index')->with('notification', 'Cập nhật thành công.');
    }

    public function getDelete($id)
    {
        # code...
        $tongiao = Tongiao::find($id)->delete();
        return redirect('manage/tongiao/index')->with('notification','Xóa thành công.');
    }
}
