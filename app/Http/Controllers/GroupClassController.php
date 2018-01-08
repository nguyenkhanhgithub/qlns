<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KhoiLop;
use App\PhanLop;

class GroupClassController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$KhoiLop = DB::table('KHOILOP')
                        ->leftJoin('PHANLOP','KHOILOP.MaKhoiLop','=','PHANLOP.MaKhoiLop')
                        ->select('KHOILOP.*','PHANLOP.MaKhoiLop as MaPhanLop')
                        ->groupBy('KHOILOP.MaKhoiLop')
                        ->get();
    	return view('Lop-Khoilop.Khoilop.danhsachKhoi',['khoilop' => $KhoiLop]);
    }

    public function getInsert()
    {
    	# code...
    	return view('Lop-Khoilop.Khoilop.insertKhoilop');
    }

    public function postInsert(Request $req)
    {
    	# code...
    	$this->validate($req,
    		[
    			'txtTenKhoiLop' => 'required|min:5|max:7|unique:KHOILOP,TenKhoiLop',
    			'txtMaKhoiLop'	=> 'unique:KHOILOP,MaKhoiLop'
    		],
    		[
    			'txtTenKhoiLop.required' => 'Chưa nhập tên khối lớp.',
    			'txtTenKhoiLop.min'		 => 'Tên khối lớp tối thiểu 5 ký tự',
    			'txtTenKhoiLop.max'		 => 'Tên khối lớp tối đa 7 ký tự',
    			'txtTenKhoiLop.unique'	 => 'Tên khối lớp bị trùng',
    			'txtMaKhoiLop.unique'	 => 'Mã Khối lớp bị trùng',
    		]
    	);
    	$khoilop = new Khoilop;
    	$khoilop->MaKhoiLop = strtoupper(str_replace(" ","",stripCode($req->txtTenKhoiLop)));
    	$khoilop->TenKhoiLop = $req->txtTenKhoiLop;
    	$khoilop->save();
    	return redirect('manage/khoilop/getInsert')->with('notification','Thêm thành công.');
    }

    public function getUpdate($id)
    {
    	# code...
    	$Khoilop = KhoiLop::find($id);
    	return view('Lop-Khoilop.Khoilop.updateKhoilop',['khoilop' => $Khoilop]);
    }

    public function postUpdate(Request $req, $id)
    {
    	# code...
    	$khoilop = Khoilop::find($id);
    	$this->validate($req,
    		[
    			'txtTenKhoiLop' => 'required|min:5|max:7|unique:KHOILOP,TenKhoiLop',
    		],
    		[
    			'txtTenKhoiLop.required' => 'Chưa nhập tên khối lớp.',
    			'txtTenKhoiLop.min'		 => 'Tên khối lớp tối thiểu 5 ký tự',
    			'txtTenKhoiLop.max'		 => 'Tên khối lớp tối đa 7 ký tự',
    			'txtTenKhoiLop.unique'	 => 'Tên khối lớp bị trùng',
    		]
    	);

    	$khoilop->TenKhoiLop = $req->txtTenKhoiLop;
    	$khoilop->save();
    	return redirect('manage/khoilop/getUpdate/'.$id)->with('notification','Cập nhật thành công.');
    }

    public function getDelete($id)
    {
        # code...
        $khoilop = KhoiLop::where('MaKhoiLop',$id)->delete();
        return redirect('manage/khoilop/index')->with('notification','Xóa thành công.');
    }
}
