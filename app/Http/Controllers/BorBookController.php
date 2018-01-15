<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use View;
use App\Hocsinh;
use App\Sach;
use App\Lop;
use App\Namhoc;
use App\Muonsach;

class BorBookController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $theloai = DB::table('THELOAISACH')->get();
        $namhoc = Namhoc::all();
        $muon = DB::table('MUONSACH')
            ->join('HOCSINH','HOCSINH.MaHocSinh','=','MUONSACH.MaHocSinh')
            ->join('SACH','SACH.id','=','MUONSACH.MaSach')
            ->select('HOCSINH.HoTen','HOCSINH.MaHocSinh','SACH.TenSach','MUONSACH.id as muon_id','MUONSACH.TrangThai','SACH.id','SACH.MaSach','MUONSACH.NgayMuon','MUONSACH.NgayTra')
            ->paginate(20);
        if ($request->ajax()) {
            return Response::json(View::make('Thuvien.sach.ajaxPaginate', array('muon' => $muon))->render());
        }
        return view('Thuvien.sach.DSMuon',['muon' => $muon,'theloai' => $theloai,'namhoc' => $namhoc]);
    }

    public function postInsert(Request $request)
    {

      # code...
        $this->validate($request,
            [
                'idTheLoaiSach' => 'required',
                'txtNamhoc'     => 'required',
                'txtHocSinh'    => 'required',
                'idTenSach'     => 'required',
                'txtLop'        => 'required',
                'NgayTra'       => 'required',
            ],
            [
                'idTheLoaiSach.required' => 'Chọn thể loại sách.',
                'txtNamhoc.required'     => 'Chọn năm học.',
                'txtHocSinh.required'    => 'Chọn học sinh.',
                'idTenSach.required'     => 'Chọn tên sách.',
                'txtLop.required'        => 'Chọn lớp học.',
                'NgayTra.required'       => 'Chọn ngày trả.'
            ]
        );

        $checkSach = Sach::find($request->idTenSach);
        $checkMuon = DB::table('MUONSACH')
            ->where('MaHocSinh','=',$request->txtHocSinh)
            ->where('MaSach','=',$request->idTenSach)
            ->get();
        if($checkSach->SoLuong <=0){
            return redirect('manage/muonsach/index')->with('notification','Sách này đã thuê hết.');
        }elseif(count($checkMuon) > 0){
            return redirect('manage/muonsach/index')->with('notification','Bạn đã thuê sách này.');
        }else{
            $Muonsach = new Muonsach;
            $Muonsach->MaHocSinh = $request->txtHocSinh;
            $Muonsach->MaSach = $request->idTenSach;
            $Muonsach->NgayMuon = date('d/m/Y');
            $Muonsach->NgayTra = $request->NgayTra;
            $Muonsach->save();
            $sach = Sach::find($request->idTenSach);
            $sach->SoLuong = ($sach->SoLuong - 1);
            return redirect('manage/muonsach/index')->with('notification','Thêm thành công.');
        }
    }
    public function getSearch(Request $request)
    {
        # code...
        $keyword=array(
          'idTheLoaiSach' => $request->get('idTheLoaiSach_s'),
          'idTenSach'     => $request->get('idTenSach_s'),
          'NgayMuon'      => $request->get('NgayMuon_s')
        );
        $theloai = DB::table('THELOAISACH')->get();
        $namhoc = Namhoc::all();
        $sach_theloai = DB::table('SACH')
            ->where('idTheLoaiSach','=',$keyword['idTheLoaiSach'])
            ->get();
        $muon = DB::table('MUONSACH')
            ->join('HOCSINH','HOCSINH.MaHocSinh','=','MUONSACH.MaHocSinh')
            ->join('SACH','SACH.id','=','MUONSACH.MaSach')
            ->where(function($query) use ($keyword)  {
                if(isset($keyword['NgayMuon'])) {
                    $query->where('MUONSACH.NgayMuon', $keyword['NgayMuon']);
                }
                if(isset($keyword['idTheLoaiSach'])){
                    $query->where('SACH.idTheLoaiSach', $keyword['idTheLoaiSach']);
                }
                if(isset($keyword['idTenSach'])){
                    $query->where('MUONSACH.MaSach', $keyword['idTenSach']);
                }
             })
            ->select('HOCSINH.HoTen','HOCSINH.MaHocSinh','SACH.TenSach','MUONSACH.id as muon_id','MUONSACH.TrangThai','SACH.id','SACH.MaSach','MUONSACH.NgayMuon','MUONSACH.NgayTra')
            ->paginate(20);

        if ($request->ajax()) {
            return Response::json(View::make('Thuvien.sach.ajaxPaginate', array('muon' => $muon))->render());
        }
        return view('Thuvien.sach.DSMuon',['muon' => $muon,'theloai' => $theloai,'namhoc' => $namhoc, 'keyword' => $keyword,'sach_theloai' => $sach_theloai]);

    }
    public function updateTT(Request $request)
    {
        # code...
        $Muonsach = Muonsach::find($request->muon_id)->first();

        if($Muonsach->TrangThai === 0){
            $Muonsach->TrangThai = 1;
        }else{
            $Muonsach->TrangThai = 0;
        }
        $Muonsach->save();
        return redirect('manage/muonsach/index')->with('notification','Cập nhật thành công.');
    }
}
