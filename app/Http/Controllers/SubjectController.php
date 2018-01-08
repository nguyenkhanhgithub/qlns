<?php

namespace App\Http\Controllers;

use App\Monhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class SubjectController extends Controller
{

    public function index()
    {

        $Monhoc = DB::table('MONHOC')
            ->leftJoin('GIAOVIEN', 'MONHOC.MaMonHoc', '=', 'GIAOVIEN.MaMonHoc')
            ->leftJoin('PHANCONG', 'MONHOC.MaMonHoc', '=', 'PHANCONG.MaMonHoc')
            ->leftJoin('KQ_HOC_KY_MON_HOC', 'MONHOC.MaMonHoc', '=', 'KQ_HOC_KY_MON_HOC.MaMonHoc')
            ->leftJoin('KQ_CA_NAM_MON_HOC','MONHOC.MaMonHoc','=','KQ_CA_NAM_MON_HOC.MaMonHoc')
            ->leftJoin('DIEM','MONHOC.MaMonHoc','=','DIEM.MaMonHoc')
            ->select('MONHOC.*','PHANCONG.MaMonHoc as MaMonPhanCong')
            ->groupBy('MONHOC.MaMonHoc')
            ->paginate(10);
        return view('Mon-Diem.Mon.danhsachMon',['monhoc' => $Monhoc,'btn' => 'Thêm mới']);
    }

    public function postInsert(Request $request){
        $this->validate($request,
            [
                'txtTenMonHoc'  => 'required|unique:MONHOC,TenMonHoc|min:5|max:20',
                'txtSoTiet'     => 'required',
                'txtHeSo'       => 'required|min:1|max:3',
            ],
            [
                'txtTenMonHoc.required' => 'Chưa nhập tên môn học.',
                'txtTenMonHoc.unique'   => 'Tên môn học đã tồn tại.',
                'txtTenMonHoc.min'      => 'Tên môn học tối thiểu 5 ký tự',
                'txtTenMonHoc.max'      => 'Tên môn học tối đa 20 ký tự',
                'txtSoTiet.required'    => 'Chưa nhập số tiết học.',
                'txtHeSo.required'      => 'Chưa nhập hệ số.',
                'txtHeSo.min'           => 'Hệ số tối thiểu môn học là hệ số 1.',
                'txtHeSo.max'           => 'Hệ số tối đa của môn học là hệ số 3.',
            ]
        );
        $max = max_id('MONHOC','MaMonHoc','5');
        $max_id = $max[0]->max+1;
        $monhoc = new Monhoc;
        $monhoc->MaMonHoc = "MH00".($max_id);
        $monhoc->TenMonHoc = $request->txtTenMonHoc;
        $monhoc->SoTiet    = $request->txtSoTiet;
        $monhoc->HeSo      = $request->txtHeSo;
        $monhoc->save();
        return redirect()->back()->with('notification',"Thêm thành công.");
    }

    public function getUpdate($id){
        $monhoc_id = Monhoc::find($id);
        $Monhoc = DB::table('MONHOC')
            ->leftJoin('GIAOVIEN', 'MONHOC.MaMonHoc', '=', 'GIAOVIEN.MaMonHoc')
            ->leftJoin('PHANCONG', 'MONHOC.MaMonHoc', '=', 'PHANCONG.MaMonHoc')
            ->leftJoin('KQ_HOC_KY_MON_HOC', 'MONHOC.MaMonHoc', '=', 'KQ_HOC_KY_MON_HOC.MaMonHoc')
            ->leftJoin('KQ_CA_NAM_MON_HOC','MONHOC.MaMonHoc','=','KQ_CA_NAM_MON_HOC.MaMonHoc')
            ->leftJoin('DIEM','MONHOC.MaMonHoc','=','DIEM.MaMonHoc')
            ->select('MONHOC.*','PHANCONG.MaMonHoc as MaMonPhanCong')
            ->groupBy('MONHOC.MaMonHoc')
            ->paginate(10);
        return view('Mon-Diem.Mon.danhsachMon',['monhoc_id' => $monhoc_id,'monhoc' => $Monhoc,'btn' => 'Cập nhật']);
    }

    public function postUpdate(Request $request, $id){
        $monhoc = Monhoc::find($id);

        $this->validate($request,
            [
                'txtTenMonHoc'  => 'required|unique:MONHOC,TenMonHoc,'.$id.',MaMonHoc|min:5|max:20',
                'txtSoTiet'     => 'required',
                'txtHeSo'       => 'required|min:1|max:3',
            ],
            [
                'txtTenMonHoc.required' => 'Chưa nhập tên môn học.',
                'txtTenMonHoc.unique'   => 'Tên môn học đã tồn tại.',
                'txtTenMonHoc.min'      => 'Tên môn học tối thiểu 5 ký tự',
                'txtTenMonHoc.max'      => 'Tên môn học tối đa 20 ký tự',
                'txtSoTiet.required'    => 'Chưa nhập số tiết học.',
                'txtHeSo.required'      => 'Chưa nhập hệ số.',
                'txtHeSo.min'           => 'Hệ số tối thiểu môn học là hệ số 1.',
                'txtHeSo.max'           => 'Hệ số tối đa của môn học là hệ số 3.',
            ]
        );

        $monhoc->TenMonHoc = $request->txtTenMonHoc;
        $monhoc->SoTiet    = $request->txtSoTiet;
        $monhoc->HeSo      = $request->txtHeSo;
        $monhoc->save();
        return redirect('manage/mon/index')->with('notification',"Cập thành công.");
    }

    public function getDelete($id){
        $monhoc = Monhoc::find($id)->delete();
        return redirect()->back()->with('notification','Xóa thành công.');
    }
}
