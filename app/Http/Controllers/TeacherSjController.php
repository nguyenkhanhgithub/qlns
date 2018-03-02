<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Monhoc;
class TeacherSjController extends Controller
{
    //
    public function index($id)
    {
    	# code...
    	$monhoc = Monhoc::where('MaMonHoc','=',$id)->select('TenMonHoc','GioiThieu','link_videos')->get()->first();
    	$GvMon = DB::table('GIAOVIEN')
    		->select('GIAOVIEN.TenGiaoVien','GIAOVIEN.MaGiaoVien')
    		->join('PHANCONG','PHANCONG.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
    		->join('MONHOC','MONHOC.MaMonHoc','=','MONHOC.MaMonHoc')
    		->where('PHANCONG.MaMonHoc','=',$id)
    		->groupBy('PHANCONG.MaMonHoc','PHANCONG.MaGiaoVien')
    		->get();
    	return view('Mon-Diem.Mon.MonGV',['monhoc' => $monhoc,'GvMon' => $GvMon]);
    }
}
