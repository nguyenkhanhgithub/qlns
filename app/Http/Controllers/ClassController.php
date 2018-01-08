<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namhoc;
use App\Lop;
use App\Giaovien;
use App\Khoilop;
use Session;
class ClassController extends Controller
{
    //
   public function index()
   {
   	# code...
   	 	$Namhoc = Namhoc::all();
    	$Lop    = DB::table('LOP')
					->leftJoin('PHANLOP','LOP.MaLop','=','PHANLOP.MaLop')
					->leftJoin('KHOILOP','LOP.MaKhoiLop','=','KHOILOP.MaKhoiLop')
					->leftJoin('GIAOVIEN','LOP.MaGiaoVien','=','GIAOVIEN.MaGiaoVien')
					->leftJoin('NAMHOC','LOP.MaNamHoc','=','NAMHOC.MaNamHoc')
					->select('LOP.*','KHOILOP.TenKhoiLop','PHANLOP.MaLop as MaPhanLop','GIAOVIEN.TenGiaoVien','NAMHOC.TenNamHoc')
					->groupBy('LOP.MaLop')
					->paginate(10);
		
    	$Giaovien = Giaovien::all();
    	$Khoilop = Khoilop::all();

    	return view('Lop-Khoilop.Lop.danhsach',
    		[
    			'namhoc' => $Namhoc, 
    			'lop' => $Lop, 
    			'giaovien' => $Giaovien,
    			'khoilop' => $Khoilop
    		]);
   }

   public function getUpdate($id)
   {
   	# code...
   		$Lop = Lop::find($id);
   	 	$Namhoc = Namhoc::all();
    	$Giaovien = Giaovien::all();
    	$Khoilop = Khoilop::all();
		return view('Lop-Khoilop.Lop.updateLop',
    		[
    			'namhoc' => $Namhoc, 
    			'lop' => $Lop, 
    			'giaovien' => $Giaovien,
    			'khoilop' => $Khoilop
    		]);

   }

   public function getInsert()
   {
   	# code...
   		$Namhoc = Namhoc::all();
    	$Giaovien = Giaovien::all();
    	$Khoilop = Khoilop::all();
   		return view('Lop-Khoilop.Lop.insertLop',['khoilop' => $Khoilop, 'giaovien' => $Giaovien, 'namhoc' => $Namhoc]);
   }
   
   public function postUpdate(Request $req, $id)
   {
   	# code...
   		$this->validate($req,
   			[
   				'txtTenLop' => 'required|min:4|max:6',
   				'txtKhoiLop' => 'required',
   				'txtNamhoc'	 => 'required',
   				'txtSiSo'	 => 'required|min:20|numeric',
   				'txtGiaovien' => 'required',
   			],
   			[
   				'txtTenLop.required' => 'Chưa nhập tên lớp.',
   				'txtTenLop.min'		 => 'Tên lớp tối thiểu 4 ký tự.',
   				'txtTenLop.max'		 => 'Tên lớp tối đa 6 ký tự.',
   				'txtKhoiLop.required' => 'Chưa chọn khối lớp.',
   				'txtNamhoc.required'  => 'Chưa chọn năm học.',
   				'txtSiSo.required'	  => 'Chưa nhập sĩ số.',
   				'txtSiSo.min'		  => 'Sĩ số tối thiểu 20 học sinh',
   				'txtGiaovien.required'		  => 'Chưa chọn chủ nhiệm lớp.',
   			]
   		);

   		$lop = Lop::find($id);
   		$lop->TenLop = $req->txtTenLop;
   		$lop->MaKhoiLop = $req->txtKhoiLop;
   		$lop->MaNamHoc = $req->txtNamhoc;
   		$lop->SiSo = $req->txtSiSo;
   		$lop->MaGiaoVien = $req->txtGiaovien;
   	 	$lop->save();
   		return redirect('manage/lop/getUpdate/'.$id)->with('notification','Cập nhật thành công.');
   }


   public function postInsert(Request $req)
   {
   		# code...
   		$this->validate($req,
   			[
   				'txtTenLop' => 'required|min:4|max:6',
   				'txtKhoiLop' => 'required',
   				'txtNamhoc'	 => 'required',
   				'txtSiSo'	 => 'required|min:20|numeric',
   				'txtGiaovien' => 'required',
   			],
   			[
   				'txtTenLop.required' => 'Chưa nhập tên lớp.',
   				'txtTenLop.min'		 => 'Tên lớp tối thiểu 4 ký tự.',
   				'txtTenLop.max'		 => 'Tên lớp tối đa 6 ký tự.',
   				'txtKhoiLop.required' => 'Chưa chọn khối lớp.',
   				'txtNamhoc.required'  => 'Chưa chọn năm học.',
   				'txtSiSo.required'	  => 'Chưa nhập sĩ số.',
   				'txtSiSo.min'		  => 'Sĩ số tối thiểu 20 học sinh',
   				'txtGiaovien.required'		  => 'Chưa chọn chủ nhiệm lớp.',
   			]
   		);
   		$lop = new Lop;
   		$lop->TenLop = $req->txtTenLop;
   		$lop->MaKhoiLop = $req->txtKhoiLop;
   		$lop->MaNamHoc = $req->txtNamhoc;
   		$lop->SiSo = $req->txtSiSo;
   		$lop->MaGiaoVien = $req->txtGiaovien;
   		$lop->MaLop = rand_malop($req->txtKhoiLop,$req->txtTenLop,$req->txtNamhoc);
   	 	$lop->save();
   		return redirect('manage/lop/getInsert')->with('notification','Thêm thành công.');
   }
   public function getDelete($id)
   {
   	# code...
   		$lop = Lop::find($id);
   		$lop->delete();
   		return redirect('manage/lop/index')->with('notification','Xóa thành công.');
   }
}
