<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sach;
use Session;

class BookController extends Controller
{
    //
    public function index()
    {
        $loaisach = DB::table('LOAISACH')->get();
        $theloai = DB::table('THELOAISACH')->get();
        $nxb = DB::table('NHAXUATBAN')->get();
        # code...
        $sach = DB::table('SACH')
            ->leftJoin('NHAXUATBAN','NHAXUATBAN.id','=','SACH.idNXB')
            ->leftJoin('LOAISACH','LOAISACH.id','=','SACH.idLoaiSach')
            ->leftJoin('THELOAISACH','THELOAISACH.id','=','SACH.idTheLoaiSach')
            ->select('SACH.*','LOAISACH.TenLoaiSach','NHAXUATBAN.TenNXB','THELOAISACH.TenTheLoai','SACH.XuatBan')
            ->orderBy('SACH.id','ASC')
            ->paginate(20);

        return view('Thuvien.Sach.Sach',['sach'=>$sach,'loaisach' => $loaisach,'theloai' => $theloai,'nxb' => $nxb]);
    }

    public function getSearch(Request $request)
    {
        # code...
        $loaisach = DB::table('LOAISACH')->get();
        $theloai = DB::table('THELOAISACH')->get();
        $nxb = DB::table('NHAXUATBAN')->get();

        $keyword = array(
            'loaisach' => $request->get('loaisach_s'),
            'theloai'  => $request->get('theloai_s')
        );

        $sach = DB::table('SACH')
            ->leftJoin('NHAXUATBAN','NHAXUATBAN.id','=','SACH.idNXB')
            ->leftJoin('LOAISACH','LOAISACH.id','=','SACH.idLoaiSach')
            ->leftJoin('THELOAISACH','THELOAISACH.id','=','SACH.idTheLoaiSach')
            ->where('SACH.idLoaiSach','like',$keyword['loaisach'])
            ->where('SACH.idTheLoaiSach','=',$keyword['theloai'])
            ->select('SACH.*','LOAISACH.TenLoaiSach','NHAXUATBAN.TenNXB','THELOAISACH.TenTheLoai','SACH.XuatBan')
            ->orderBy('SACH.id','ASC')
            ->paginate(20);

        return view('Thuvien.Sach.Sach',['sach'=>$sach,'loaisach' => $loaisach,'theloai' => $theloai,'keyword' => $keyword,'nxb' => $nxb]);
    }

    public function postInsert(Request $request)
    {
        # code...
        $this->validate($request,
            [
                'TenSach' => 'required',
                'TacGia'  => 'required',
                'loaisach' => 'required',
                'theloai'  => 'required',
                'Soluong'  => 'required',
                'nxb'      => 'required',
                'XuatBan'  => 'required'
            ],
            [
                'TenSach.required' => 'Nhập tên sách.',
                'TacGia.required'   => 'Nhập tác giả.',
                'loaisach.required' => 'Chọn loại sách.',
                'theloai.required'  => 'Chọn thể loại.',
                'Soluong.required'  => 'Chọn số lượng.',
                'nxb.required'      => 'Chọn nhà xuất bản.',
                'XuatBan.required'  => 'Nhập năm xuất bản.'    
            ]
        );

        $sach = new Sach;
        $max = max_id('SACH','id','1');
        $max_id = $max[0]->max+1;
        $sach->MaSach = 'SACH'.$max_id.str_random(4);
        $sach->TenSach = $request->TenSach;
        $sach->GhiChu = $request->GhiChu;
        $sach->TacGia = $request->TacGia;
        $sach->idLoaiSach = $request->loaisach;
        $sach->idTheLoaiSach = $request->theloai;
        $sach->XuatBan = $request->XuatBan;
        $sach->idNXB = $request->nxb;
        $sach->SoLuong = $request->Soluong;
        if($request->hasFile('txtImage')){
            $file = $request->txtImage;
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("public/upload/sach/".$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move('public/upload/sach',$Hinh);
                $sach->Image = $Hinh;
        }else{
            $sach->Image = NULL;
        }
        $sach->save();
        return redirect('manage/sach/index')->with('notification','Thêm đầu sách thành công!');
    }

    public function postUpdate(Request $request)
    {
        # code...
        $this->validate($request,
            [
                'TenSach' => 'required',
                'TacGia'  => 'required',
                'loaisach' => 'required',
                'theloai'  => 'required',
                'Soluong'  => 'required',
                'nxb'      => 'required',
                'XuatBan'  => 'required'
            ],
            [
                'TenSach.required' => 'Nhập tên sách.',
                'TacGia.required'   => 'Nhập tác giả.',
                'loaisach.required' => 'Chọn loại sách.',
                'theloai.required'  => 'Chọn thể loại.',
                'Soluong.required'  => 'Chọn số lượng.',
                'nxb.required'      => 'Chọn nhà xuất bản.',
                'XuatBan.required'  => 'Nhập năm xuất bản.'    
            ]
        );

        $sach = Sach::find($request->idSach);
        $sach->TenSach = $request->TenSach;
        $sach->TacGia = $request->TacGia;
        $sach->GhiChu = $request->GhiChu;
        $sach->idLoaiSach = $request->loaisach;
        $sach->idTheLoaiSach = $request->theloai;
        $sach->XuatBan = $request->XuatBan;
        $sach->idNXB = $request->nxb;
        $sach->SoLuong = $request->Soluong;
         $sach->SoLuong = $request->Soluong;
        if($request->hasFile('txtImage')){
            $file = $request->txtImage;
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("public/upload/sach/".$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move('public/upload/sach',$Hinh);
                unlink("public/upload/sach/".$sach->Image);
                $sach->Image = $Hinh;
        }else{
            $sach->Image = NULL;
        }
        $sach->save();
        return redirect('manage/sach/index')->with('notification','Cập nhật thành công!');
    }
}
