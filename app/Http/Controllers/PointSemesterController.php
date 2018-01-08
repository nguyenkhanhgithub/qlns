<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use App\Hocky;
use App\Lop;
use App\Hocsinh;
use App\Loaidiem;
use App\KQHockyMonhoc;
use App\KQHockyTonghop;

class PointSemesterController extends Controller
{
    //
    public function index(Request $request)
    {
        $hocky = Hocky::find($request->get('MaHK'));
        
        $hocsinh_id = DB::table('HOCSINH')
            ->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
            ->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
            ->where('HOCSINH.MaHocSinh','=',$request->get('MaHS'))
            ->select('HOCSINH.HoTen','LOP.TenLop','PHANLOP.MaLop','HOCSINH.MaHocSinh')
            ->get()->first();

        $DBT = DB::table('KQ_HOC_KY_TONG_HOP')
            ->where('MaHocSinh','=',$request->get('MaHS'))
            ->where('MaNamHoc','=',$request->get('MaNH'))
            ->where('MaHocKy','=',$request->get('MaHK'))
            ->select('MaHocSinh','DTBMonHocKy')
            ->get()->first();
        
        

        $hocsinhdiem = DB::table('KQ_HOC_KY_MON_HOC')
            ->join('MONHOC','MONHOC.MaMonHoc','=','KQ_HOC_KY_MON_HOC.MaMonHoc')
            ->where('KQ_HOC_KY_MON_HOC.MaHocKy','=',$request->get('MaHK'))
            ->where('KQ_HOC_KY_MON_HOC.MaHocSinh','=', $request->get('MaHS'))
            ->where('KQ_HOC_KY_MON_HOC.MaNamHoc','=', $request->get('MaNH'))
            ->select('MONHOC.MaMonHoc','KQ_HOC_KY_MON_HOC.DTBKiemTra','KQ_HOC_KY_MON_HOC.DTBMonHocKy')
            ->groupBy('MONHOC.MaMonHoc')
            ->get();
        $Loaidiem = Loaidiem::all();
        $mon_namhoc = DB::table('MONHOC')
                ->join('PHANCONG','PHANCONG.MaMonHoc','=','MONHOC.MaMonHoc')
                ->where('PHANCONG.MaNamHoc','=',$request->get('MaNH'))
                ->where('PHANCONG.MaLop','=',$request->get('MaLop'))
                ->groupBy('MONHOC.MaMonHoc')
                ->get();

        $diem = DB::table('DIEM')
            ->join('MONHOC','MONHOC.MaMonHoc','=','DIEM.MaMonHoc')
            ->where('DIEM.MaHocSinh','=',$request->get('MaHS'))
            ->where('DIEM.MaNamHoc','=',$request->get('MaNH'))
            ->where('DIEM.MaHocKy','=',$request->get('MaHK'))
            ->get();
        
        return view('Thongke.LH.Diemhocky',['loaidiem' => $Loaidiem,'hocky' => $hocky,'hocsinh_id' => $hocsinh_id, 'diem' => $diem,'hocsinhdiem' => $hocsinhdiem,'mon_namhoc' => $mon_namhoc,'hocky_ip' => $request->get('MaHK'),'namhoc_ip' => $request->get('MaNH'), 'malop_ip' => $request->get('MaLop'),'DTB' => $DBT]);
    }

    public function postInsert(Request $request, $id)
    {
        # code...
        $monhoc_lop = DB::table('PHANCONG')
            ->where('PHANCONG.MaLop','=',$request->MaLop)
            ->select('MaMonHoc')
            ->groupBy('MaMonHoc')
            ->get();

        $hocsinh_diem = DB::table('KQ_HOC_KY_MON_HOC')
            ->where('KQ_HOC_KY_MON_HOC.MaLop','=',$request->MaLop)
            ->where('KQ_HOC_KY_MON_HOC.MaHocSinh','=',$id)
            ->select('MaMonHoc')
            ->groupBy('MaMonHoc')
            ->get();

        if(count($monhoc_lop) === count($hocsinh_diem)){

            $tongdiem = DB::table('KQ_HOC_KY_MON_HOC')
                ->where('KQ_HOC_KY_MON_HOC.MaHocSinh','=',$id)
                ->where('KQ_HOC_KY_MON_HOC.MaNamHoc','=',$request->Namhoc)
                ->where('KQ_HOC_KY_MON_HOC.MaHocKy','=',$request->Hocky)
                ->select(DB::raw('SUM(DTBMonHocKy) as tongdiem'))   
                ->get()->first();

            $HKtonghop = new KQHockyTonghop;
            $HKtonghop->MaHocSinh = $id;
            $HKtonghop->MaLop = $request->MaLop;
            $HKtonghop->MaHocKy = $request->Hocky;
            $HKtonghop->DTBMonHocKy = $tongdiem->tongdiem/count($monhoc_lop);
            $HKtonghop->MaNamHoc = $request->Namhoc;
            $HKtonghop->save();

            return redirect('manage/diemhk/index?MaHS='.$id.'&MaNH='.$request->Namhoc.'&MaHK='.$request->Hocky.'&MaLop='.$request->MaLop)->with('notification','info');
        }else{
             return redirect('manage/diemhk/index?MaHS='.$id.'&MaNH='.$request->Namhoc.'&MaHK='.$request->Hocky.'&MaLop='.$request->MaLop)->with('notification','warning');
        }  
        
    }
}
