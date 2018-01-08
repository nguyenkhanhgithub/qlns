<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Dantoc;
class NationController extends Controller
{
    //
    public function index(){
        $dantoc = DB::table('DANTOC')
            ->leftJoin('HOCSINH','HOCSINH.MaDanToc','=','DANTOC.MaDanToc')
            ->select('DANTOC.*','HOCSINH.MaDanToc as HSDT')
            ->groupBy('DANTOC.MaDanToc')
            ->paginate(10);
        return view('Hocsinh.Dantoc.Dantoc',['dantoc' => $dantoc, 'btn' => 'Thêm mới']);
    }

    public function postInsert(Request $request)
    {
        $this->validate($request,
            [
                'txtTenDanToc' => 'required|unique:DANTOC,TenDanToc'
            ],
            [
                'txtTenDanToc.required' => 'Chưa nhập tên dân tộc.',
                'txtTenDanToc.unique' => 'Tên dân tộc đã tồn tại.'
            ]
        );

        $dantoc = new Dantoc;
        $dantoc->TenDanToc = $request->txtTenDanToc;
        $max = max_id('DANTOC', 'MaDanToc', '5');
        $max_id = $max[0]->max + 1;
        $dantoc->MaDanToc = "DT00" . ($max_id);
        $dantoc->save();
        return redirect('manage/dantoc/index')->with('notification', 'Thêm thành công.');
    }

    public function getUpdate($id){
        $dantoc_id = Dantoc::find($id);
        $dantoc = DB::table('DANTOC')
            ->leftJoin('HOCSINH','HOCSINH.MaDanToc','=','DANTOC.MaDanToc')
            ->select('DANTOC.*','HOCSINH.MaDanToc as HSDT')
            ->groupBy('DANTOC.MaDanToc')
            ->paginate(10);
        return view('Hocsinh.Dantoc.Dantoc',['dantoc_id' => $dantoc_id,'dantoc' => $dantoc,'btn' => 'Cập nhật']);
    }

    public function postUpdate(Request $request,$id){

        $this->validate($request,
            [
                'txtTenDanToc' => 'required|unique:DANTOC,TenDanToc,'.$id.',MaDanToc'
            ],
            [
                'txtTenDanToc.required' => 'Chưa nhập tên dân tộc.',
                'txtTenDanToc.unique' => 'Tên dân tộc đã tồn tại.'
            ]
        );
        $dantoc = Dantoc::find($id);
        $dantoc->TenDanToc = $request->txtTenDanToc;
        $dantoc->save();
        return redirect('manage/dantoc/index')->with('notification', 'Cập nhật thành công.');
    }

    public function getDelete($id)
    {
        # code...
        $dantoc = Dantoc::find($id)->delete();
        return redirect('manage/dantoc/index')->with('notification','Xóa thành công.');
    }
}
