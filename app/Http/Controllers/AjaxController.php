<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Lop;
use App\Phanlop;
use App\Diem;
use App\Hocsinh;
use App\Khoilop;
use App\Phancong;
use App\Lich;
use App\User;
use App\Hocky;
use Session;
use Mail;
use App\Thu;
use App\Tiethoc;
use App\Gvmon;
use App\KQHockyMonhoc;
use App\Sach;
use App\Muonsach;
use App\Doctruyen;
use App\Tracnghiem;

class AjaxController extends Controller
{

    public function lop_namhoc($id){
        $lop = DB::table('LOP')->select('*')->where('MaNamHoc','=',$id)->get();
        echo json_encode($lop); exit;
    }

    public function  hocsinh_lop($id){
    	$hocsinh_lop = DB::table('HOCSINH')
    		->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
    		->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
    		->where('PHANLOP.MaLop','=',$id)
    		->select('HOCSINH.MaHocSinh','HOCSINH.HoTen')
    		->get();

    	foreach($hocsinh_lop  as $hl){
    	    echo "<li class='list-group-item left' data-value='".$hl->MaHocSinh."'>".$hl->HoTen."<span class='glyphicon glyphicon-minus pull-left  dual-list-move-right' title='Remove Selected'></span></li>";
        }
    }

    public function lop_id(Request $request){
        $lop_id = DB::table('LOP')
            ->join('KHOILOP','KHOILOP.MaKhoiLop','=','LOP.MaKhoiLop')
            ->where('LOP.MaKhoiLop','=',$request->get('id_khoi'))
            ->where('LOP.MaNamHoc','=',$request->get('id_namhoc'))
            ->select('LOP.TenLop','LOP.MaLop')
            ->get();
        echo json_encode($lop_id); exit();
    }

    public function phanlop_ajax(Request $request){
        $hocsinh_pl = $request->array;
        $MaNamHoc = $request->txtNamhoc;
        $MaKhoiLop = $request->txtKhoi;
        $MaLop = $request->txtLop;
        $array_insert = array();

        foreach ($hocsinh_pl as $key => $value) {
            $array_insert[$key]['MaHocSinh'] = $value;
            $array_insert[$key]['MaNamHoc'] = $MaNamHoc;
            $array_insert[$key]['MaKhoiLop'] = $MaKhoiLop;
            $array_insert[$key]['MaLop'] = $MaLop;
        }

        DB::table('PHANLOP')
            ->where('MaNamHoc','=',$MaNamHoc)
            ->where('MaKhoiLop','=',$MaKhoiLop)
            ->where('MaLop','=',$MaLop)
            ->delete();

        $affected = Phanlop::insert($array_insert);
        if($affected > 0){
            echo json_encode($affected);
            exit();
        }
    }

    public function giaovien_daxep(Request $request)
    {
        # code...
        $giaovien_daxep = DB::table('PHANCONG')
            ->join('GIAOVIEN','GIAOVIEN.MaGiaoVien','=','PHANCONG.MaGiaoVien')
            ->join('MONHOC','MONHOC.MaMonHoc','=','PHANCONG.MaMonHoc')
            ->where('PHANCONG.MaGiaoVien','=',$request->get('MaGV'))
            ->where('PHANCONG.MaNamHoc','=',$request->get('MaNH'))
            ->where('PHANCONG.MaLop','=',$request->get('MaLH'))
            ->select('MONHOC.MaMonHoc','MONHOC.TenMonHoc')
            ->get();
        foreach($giaovien_daxep as $val){
            echo "<li class='list-group-item' data-value='".$val->MaMonHoc."'>".$val->TenMonHoc."<span class='glyphicon glyphicon-minus pull-left  dual-list-move-right' title='Remove Selected'></span></li>";
        }
    }

    public function giaovien_chuaxep(Request $request){
        $MaLH = $request->get('MaLH');
        $MaNH = $request->get('MaNH');
        $MaGV = $request->get('MaGV');
        $giaovien_chuaxep = DB::table('MONHOC')
            ->whereNotIn('MONHOC.MaMonHoc', function($q) use ($MaNH, $MaLH, $MaGV){
                $q->select('MaMonHoc')->from('PHANCONG')
                ->where('MaLop','=',$MaLH)
                ->where('MaNamHoc','=',$MaNH)
                ->where('MaGiaoVien','=',$MaGV);
            })
            ->select('MONHOC.MaMonHoc','MONHOC.TenMonHoc')
            ->get();
        foreach($giaovien_chuaxep as $val){
            echo "<li class='list-group-item' data-value='".$val->MaMonHoc."'>".$val->TenMonHoc."<span class='glyphicon glyphicon-plus pull-right  dual-list-move-left' title='Remove Selected'></span></li>";
        }
    }

    public function phancong_ajax(Request $request)
    {
        # code...

        $mon_arr = $request->array;
        $MaNamHoc = $request->txtNamhoc;
        $MaLop = $request->txtLop;
        $MaGV = $request->txtMaGiaoVien;
        $array_insert = array();

        foreach ($mon_arr as $key => $value) {
            $array_insert[$key]['MaMonHoc'] = $value;
            $array_insert[$key]['MaNamHoc'] = $MaNamHoc;
            $array_insert[$key]['MaLop'] = $MaLop;
            $array_insert[$key]['MaGiaoVien'] = $MaGV;
        }

        DB::table('PHANCONG')
            ->where('MaNamHoc','=',$MaNamHoc)
            ->where('MaGiaoVien','=',$MaGV)
            ->where('MaLop','=',$MaLop)
            ->delete();
        $array = Array(
            'msg' => 'successfuly',
            'status' => 'success'
        );
        if ($request->ajax()) {
            $afftected = DB::table('PHANCONG')->insert($array_insert);
            echo json_encode($array);
            exit;
        }
    }

    public function them_diem(Request $request)
    {
        # code...
        $array = $request->array;
        $MaHocSinh = $request->MaHocSinh;
        $MaNamHoc = $request->MaNamHoc;
        $MaHocKy = $request->MaHocKy;
        $MaMonHoc = $request->MaMonHoc;
        $MaLop = $request->MaLop;

        DB::table('DIEM')
            ->where('MaHocSinh','=',$MaHocSinh)
            ->where('MaMonHoc','=',$MaMonHoc)
            ->where('MaHocKy','=',$MaHocKy)
            ->where('MaNamHoc','=',$MaNamHoc)
            ->where('MaLop','=',$MaLop)
            ->delete();

        DB::table('KQ_HOC_KY_MON_HOC')
            ->where('MaHocSinh','=',$MaHocSinh)
            ->where('MaMonHoc','=',$MaMonHoc)
            ->where('MaHocKy','=',$MaHocKy)
            ->where('MaNamHoc','=',$MaNamHoc)
            ->delete();




        $mon_hk = new  KQHockyMonhoc;
        $mon_hk->MaHocSinh = $MaHocSinh;
        $mon_hk->MaLop = $MaLop;
        $mon_hk->MaNamHoc = $MaNamHoc;
        $mon_hk->MaHocKy = $MaHocKy;
        $mon_hk->MaMonHoc = $MaMonHoc;
        $mon_hk->DTBMonHocKy = ($array[0]+$array[1]+($array[2]*2)+($array[3]*3))/7;
        $mon_hk->save();
        //Miệng
        $mieng = new Diem;
        $mieng->MaHocSinh = $MaHocSinh;
        $mieng->MaNamHoc = $MaNamHoc;
        $mieng->MaHocKy = $MaHocKy;
        $mieng->MaMonHoc = $MaMonHoc;
        $mieng->MaLop = $MaLop;
        $mieng->MaLoai = 'LD0001';
        $mieng->Diem = $array[0];
        $mieng->save();

        //15P
        $diem15P = new Diem;
        $diem15P->MaHocSinh = $MaHocSinh;
        $diem15P->MaNamHoc = $MaNamHoc;
        $diem15P->MaHocKy = $MaHocKy;
        $diem15P->MaMonHoc = $MaMonHoc;
        $diem15P->MaLop = $MaLop;
        $diem15P->MaLoai = 'LD0002';
        $diem15P->Diem = $array[1];
        $diem15P->save();

        //45P
        $diem45P = new Diem;
        $diem45P->MaHocSinh = $MaHocSinh;
        $diem45P->MaNamHoc = $MaNamHoc;
        $diem45P->MaHocKy = $MaHocKy;
        $diem45P->MaMonHoc = $MaMonHoc;
        $diem45P->MaLop = $MaLop;
        $diem45P->MaLoai = 'LD0003';
        $diem45P->Diem = $array[2];
        $diem45P->save();

        //Thi
        $DiemThi = new Diem;
        $DiemThi->MaHocSinh = $MaHocSinh;
        $DiemThi->MaNamHoc = $MaNamHoc;
        $DiemThi->MaHocKy = $MaHocKy;
        $DiemThi->MaMonHoc = $MaMonHoc;
        $DiemThi->MaLop = $MaLop;
        $DiemThi->MaLoai = 'LD0004';
        $DiemThi->Diem = $array[3];
        $DiemThi->save();


    }

    public function lichtuan()
    {
        # code...
        $lich = DB::table('EVENTMENT')->select('*')->get();

        echo json_encode($lich); exit;
    }

    public function lichdisplay()
    {
        # code...
        $lich = DB::table('EVENTMENT')->select('*')->get();
         foreach($lich as $l){
            echo '<div class="calendar-events ui-draggable ui-draggable-handle" data-class="'.$l->className.'" style="position: relative;"><i class="fa fa-circle text-'.substr($l->className,3).'"></i> '.$l->title.'</div>';
        }
    }

    public function lich_insert(Request $request)
    {
        # code...
        $lich = new Lich;
        $lich->title = $request->title;
        if($request->startTime == null){
            $lich->start = $request->start;
        }else{
            $lich->start = substr($request->start, 0, 10)." ".$request->startTime.":00";
        }
        if($request->endTime == null){
            $lich->end = $request->end;
        }else{
            $lich->end = substr($request->end, 0, 10)." ".$request->endTime.":00";
        }
        $lich->GhiChu = $request->GhiChu;
        $lich->className = $request->className;
        $lich->save();
    }

    public function delete_event($id)
    {
        # code...
        $lich = Lich::find($id)->delete();
    }

    public function lich_update(Request $request, $id)
    {
        $lich = Lich::find($id);
        $lich->title = $request->title;
        $lich->className = $request->className;
        $lich->GhiChu = $request->GhiChu;
        if($request->startTime == null){
            $lich->start = $request->start;
        }else{
            $lich->start = substr($request->start, 0, 10)." ".$request->startTime.":00";
        }
        if($request->endTime == null){
            $lich->end = $request->end;
        }else{
            $lich->end = substr($request->end, 0, 10)." ".$request->endTime.":00";
        }

        $lich->save();
    }

    public function lich_drop(Request $request, $id)
    {
        # code...
        $lich = Lich::find($id);
        $lich->start = $request->start;
        $lich->end = $request->end;
        $lich->save();
    }

    public function lich_id($id)
    {
        # code...
        $lich = Lich::find($id);
        echo json_encode($lich); exit;
    }

    public function hocsinhmon(Request $request)
    {
        # code...
        $hocsinhdiem = DB::table('KQ_HOC_KY_MON_HOC')
            ->join('MONHOC','MONHOC.MaMonHoc','=','KQ_HOC_KY_MON_HOC.MaMonHoc')
            ->where('KQ_HOC_KY_MON_HOC.MaHocKy','=',$request->get('MaHK'))
            ->where('KQ_HOC_KY_MON_HOC.MaHocSinh','=', $request->get('MaHS'))
            ->where('KQ_HOC_KY_MON_HOC.MaNamHoc','=', $request->get('MaNH'))
            ->select('MONHOC.MaMonHoc','KQ_HOC_KY_MON_HOC.DTBKiemTra','KQ_HOC_KY_MON_HOC.DTBMonHocKy')
            ->groupBy('MONHOC.MaMonHoc')
            ->get();

        $diem = DB::table('DIEM')
            ->join('MONHOC','MONHOC.MaMonHoc','=','DIEM.MaMonHoc')
            ->select('MONHOC.TenMonHoc','MONHOC.MaMonHoc',
                DB::raw("
                    max(CASE WHEN DIEM.MaLoai = 'LD0001' THEN DIEM.Diem END) AS DiemMieng,
                    max(CASE WHEN DIEM.MaLoai = 'LD0002' THEN DIEM.Diem END) AS Diem15P,
                    max(CASE WHEN DIEM.MaLoai = 'LD0003' THEN DIEM.Diem END) AS Diem45P,
                    max(CASE WHEN DIEM.MaLoai = 'LD0004' THEN DIEM.Diem END) AS DiemThi
                ")
            )
            ->where('DIEM.MaHocSinh','=',$request->get('MaHS'))
            ->where('DIEM.MaNamHoc','=',$request->get('MaNH'))
            ->where('DIEM.MaHocKy','=',$request->get('MaHK'))
            ->get();


        foreach($diem as $d){
            echo "<tr>
                <td>".$d->TenMonHoc."</td>
                <td class='text-center'>".round($d->DiemMieng,2)."</td>
                <td class='text-center'>".round($d->Diem15P,2)."</td>
                <td class='text-center'>".round($d->Diem45P,2)."</td>
                <td class='text-center'>".round($d->DiemThi,2)."</td>";
                if(count($hocsinhdiem)>0){
                    foreach($hocsinhdiem as $di){
                        if($d->MaMonHoc == $di->MaMonHoc){
                            echo "<td class='text-center'>".round($di->DTBKiemTra,2)."</td>";
                        }
                    }
                    foreach($hocsinhdiem as $di){
                        if($d->MaMonHoc == $di->MaMonHoc){
                        echo "<td class='text-center'>".round($di->DTBMonHocKy,2)."</td>";
                        }
                    }
                }else{
                    echo "<td></td>
                          <td></td>";
                }
            echo "</tr>";
        }
    }


    public function getMail($id)
    {
        # code...
        $user = DB::table('users')
            ->where('users.id','=',$id)
            ->get(['users.id','users.email','users.name']);
        echo json_encode($user); exit;
    }

    public function sendmailQTV(Request $request)
    {
        $user = DB::table('users')
            ->where('users.id','!=',Auth::user()->id)
            ->select('users.id','users.name')
            ->get();

        $data = ['noidung' => $request->noidung];
        Mail::later(5,'Mail.blanks', $data, function($message) use($request){
            $message->to($request->email, $request->name)->subject($request->tieude);
        });

    }

    public function users()
    {
        # code...

        $user = DB::table('users')
            ->where('users.id','!=',Auth::user()->id)
            ->join('LOAINGUOIDUNG','LOAINGUOIDUNG.MaLoai','=','users.permission')
            ->select('users.id','users.name','users.email','LOAINGUOIDUNG.TenLoaiND')
            ->get();
        foreach($user as $us){
            echo "
                <tr class='unread'>
                    <td>
                        <div class='checkbox m-t-0 m-b-0'>
                            <input type='checkbox' class='checkmail' value=".$us->email.">
                            <label for='checkbox0'></label>
                        </div>
                    </td>
                    <td class='hidden-xs'>".$us->name."</td>
                    <td class='max-texts'>".$us->TenLoaiND."</td>
                    <td class='hidden-xs'>".$us->email."</td>
                    <td></td>
                </tr>
            ";
        }
    }

    public function lichchung(Request $request)
    {
        # code...

        $tiet = Tiethoc::all();
        $thu = Thu::all();
        $lichchung = DB::table('GV_LICH_MON')
            ->join('GIAOVIEN','GIAOVIEN.MaGiaoVien','=','GV_LICH_MON.MaGiaoVien')
            ->join('MONHOC','GV_LICH_MON.MaMonHoc','=','MONHOC.MaMonHoc')
            ->join('LOP','GV_LICH_MON.MaLop','=','LOP.MaLop')
            ->select('MONHOC.TenMonHoc','GV_LICH_MON.id','GV_LICH_MON.MaLop','LOP.TenLop','MONHOC.MaMonHoc','GV_LICH_MON.idThu','GV_LICH_MON.TrangThai','GV_LICH_MON.idTiet','GV_LICH_MON.TrangThai','GIAOVIEN.TenGiaoVien','GV_LICH_MON.MaGiaoVien')
            ->where('GV_LICH_MON.idTuan','=',$request->get('idTuan'))
            ->get();
        echo "<tr>
                <td class='text-center' rowspan='6'>
                    <span style='font-weight: bold;'>Sáng</span>
                </td>
            </tr>";
        foreach($tiet as $t){
            echo "<tr>
                <td width='' class='text-center'>$t->TenTiet</td>";
                foreach($thu as $td){
                    echo "<td width='18%'>";
                        foreach($lichchung as $lc){
                            if($lc->idThu === $td->id && $lc->idTiet === $t->id && $lc->TrangThai === 'sang'){
                                echo "<a href='#' data-value='$lc->id' data-toggle='modal' data-target='#myModal' class='sua'>$lc->TenMonHoc - $lc->TenLop (GV: $lc->TenGiaoVien)</a> <i class='fa fa-close text-danger model_img' id='$lc->id'></i><hr>";
                            }
                        }
                    echo "</td>";
                }
            echo "</tr>";
        }
        echo "<tr>
                <td class='text-center' rowspan='6'>
                    <span style='font-weight: bold;'>Chiều</span>
                </td>
            </tr>";
        foreach($tiet as $t){
            echo "<tr>
                <td width='' class='text-center'>$t->TenTiet</td>";
                foreach($thu as $td){
                    echo "<td width='18%'>";
                        foreach($lichchung as $lc){
                            if($lc->idThu === $td->id && $lc->idTiet === $t->id && $lc->TrangThai === 'chieu'){
                                echo "<a href='#' data-value='$lc->id' data-toggle='modal' data-target='#myModal' class='sua'>$lc->TenMonHoc - $lc->TenLop (GV: $lc->TenGiaoVien)</a> <i class='fa fa-close text-danger model_img' id='$lc->id'></i><hr>";
                            }
                        }
                    echo "</td>";
                }
            echo "</tr>";
        }
    }



    public function themlich(Request $request)
    {
        # code...
        $data = array(
            'MaGiaoVien' => $request->MaGiaoVien,
            'MaMonHoc' => $request->MaMonHoc,
            'idThu'    => $request->idThu,
            'idTiet'   => $request->idTiet,
            'idTuan'   => $request->idTuan,
            'TrangThai' => $request->TrangThai,
            'MaLop'     => $request->MaLop
        );

        $check = DB::table('GV_LICH_MON')
            ->where('idThu','=',$data['idThu'])
            ->where('idTiet','=',$data['idTiet'])
            ->where('idTuan','=',$data['idTuan'])
            ->where('TrangThai','=',$data['TrangThai'])
            ->where('MaLop','=',$data['MaLop'])
            ->get();

        if(count($check) == 0){
            $affected = Gvmon::insert($data);
            return response()->json($affected);
        }
    }

    public function lichsuaid(Request $request)
    {
        # code...
        $lichsuaid = DB::table('GV_LICH_MON')->where('id','=',$request->get('idLich'))->get()->first();
        echo json_encode($lichsuaid); exit;
   }

    public function sualichid(Request $request)
    {
        $data = array(
            'MaGiaoVien' => $request->MaGiaoVien,
            'MaMonHoc' => $request->MaMonHoc,
            'idThu'    => $request->idThu,
            'idTiet'   => $request->idTiet,
            'idTuan'   => $request->idTuan,
            'TrangThai' => $request->TrangThai,
            'MaLop'     => $request->MaLop
        );

        $check = DB::table('GV_LICH_MON')
            ->where('MaGiaoVien','=',$data['MaGiaoVien'])
            ->where('idThu','=',$data['idThu'])
            ->where('idTiet','=',$data['idTiet'])
            ->where('idTuan','=',$data['idTuan'])
            ->where('TrangThai','=',$data['TrangThai'])
            ->where('MaLop','=',$data['MaLop'])
            ->get();
        if(count($check) == 0){
            $affected = Gvmon::where('id',$request->get('idLich'))->update($data);
            return response()->json($affected);
        }
    }

    public function xoalichid(Request $request)
    {
        # code...
        $xoalichid = Gvmon::find($request->get('id'));
        if($request->ajax()){
            $xoalichid->delete($request->all());
            $data = array(
                'msg' => 'Xóa thành công',
                'status' => 'success'
            );
            echo json_encode($data);
        }
    }

    public function lichlop(Request $request)
    {
        # code...

        $tiet = Tiethoc::all();
        $thu = Thu::all();
        $lichchung = DB::table('GV_LICH_MON')
            ->join('GIAOVIEN','GIAOVIEN.MaGiaoVien','=','GV_LICH_MON.MaGiaoVien')
            ->join('MONHOC','GV_LICH_MON.MaMonHoc','=','MONHOC.MaMonHoc')
            ->join('LOP','GV_LICH_MON.MaLop','=','LOP.MaLop')
            ->select('MONHOC.TenMonHoc','GV_LICH_MON.id','GV_LICH_MON.MaLop','LOP.TenLop','MONHOC.MaMonHoc','GV_LICH_MON.idThu','GV_LICH_MON.TrangThai','GV_LICH_MON.idTiet','GV_LICH_MON.TrangThai','GIAOVIEN.TenGiaoVien','GV_LICH_MON.MaGiaoVien')
            ->where('GV_LICH_MON.idTuan','=',$request->get('idTuan'))
            ->where('GV_LICH_MON.MaLop','=',$request->get('MaLop'))
            ->get();
        echo "<tr>
                <td class='text-center' rowspan='6'>
                    <span style='font-weight: bold;'>Sáng</span>
                </td>
            </tr>";
        foreach($tiet as $t){
            echo "<tr>
                <td width='' class='text-center'>$t->TenTiet</td>";
                foreach($thu as $td){
                    echo "<td width='18%'>";
                        foreach($lichchung as $lc){
                            if($lc->idThu === $td->id && $lc->idTiet === $t->id && $lc->TrangThai === 'sang'){
                                echo "<a href='#' data-value='$lc->id' data-toggle='modal' data-target='#myModal' class='sua'>$lc->TenMonHoc (GV: $lc->TenGiaoVien)</a> <i class='fa fa-close text-danger model_img' id='$lc->id'></i>";
                            }
                        }
                    echo "</td>";
                }
            echo "</tr>";
        }
        echo "<tr>
                <td class='text-center' rowspan='6'>
                    <span style='font-weight: bold;'>Chiều</span>
                </td>
            </tr>";
        foreach($tiet as $t){
            echo "<tr>
                <td width='' class='text-center'>$t->TenTiet</td>";
                foreach($thu as $td){
                    echo "<td width='18%'>";
                        foreach($lichchung as $lc){
                            if($lc->idThu === $td->id && $lc->idTiet === $t->id && $lc->TrangThai === 'chieu'){
                                echo "<a href='#' data-value='$lc->id' data-toggle='modal' data-target='#myModal' class='sua'>$lc->TenMonHoc (GV: $lc->TenGiaoVien)</a> <i class='fa fa-close text-danger model_img' id='$lc->id'></i>";
                            }
                        }
                    echo "</td>";
                }
            echo "</tr>";
        }
    }

    public function mon_id(Request $request)
    {
        # code...
        $monhoc = DB::table('MONHOC')
            ->join('PHANCONG','PHANCONG.MaMonHoc','=','MONHOC.MaMonHoc')
            ->where('PHANCONG.MaNamHoc','=',$request->get('MaNH'))
            ->where('PHANCONG.MaLop','=',$request->get('MaLop'))
            ->select('MONHOC.MaMonHoc','MONHOC.TenMonHoc')
            ->groupBy('MONHOC.MaMonHoc')
            ->get();
        echo json_encode($monhoc); exit;
    }

    public function sach_id(Request $request)
    {
        # code...
        $sach = Sach::find($request->get('id'));
        echo json_encode($sach); exit;
    }

    public function sach_delete(Request $request)
    {
        # code...
        $sach = Sach::find($request->get('id'));
        if($request->ajax()){
            $sach->delete($request->all());
            $data = array(
                'msg' => 'Xóa thành công',
                'status' => 'success'
            );
            echo json_encode($data);
        }

    }

    public function sach_theloai(Request $request)
    {
        # code...
        $sach_theloai = DB::table('SACH')
            ->where('idTheLoaiSach','=',$request->get('idTLSach'))
            ->get();
        echo json_encode($sach_theloai);
        exit;
    }

    public function hocsinh_l(Request $request)
    {
        # code...
    	$hocsinh_lop = DB::table('HOCSINH')
    		->join('PHANLOP','PHANLOP.MaHocSinh','=','HOCSINH.MaHocSinh')
    		->join('LOP','LOP.MaLop','=','PHANLOP.MaLop')
    		->where('PHANLOP.MaLop','=',$request->get('idLop'))
    		->select('HOCSINH.MaHocSinh','HOCSINH.HoTen')
    		->get();
        echo json_encode($hocsinh_lop); exit;
    }

    public function muon_delete(Request $request)
    {
        # code...
        $Muonsach = Muonsach::find($request->get('id'));
        $array = Array(
            'msg' => 'successfuly',
            'status' => 'success'
        );
        if ($request->ajax()) {
            $Muonsach->delete();
            echo json_encode($array);
            exit;
        }
    }

    public function postChuong(Request $request)
    {
      # code...
      $doctruyen = new Doctruyen;
      $doctruyen->MaSach = $request->idSach_c;
      $doctruyen->Chuong = $request->SoChuong;
      $doctruyen->Noidung = $request->NoiDung;
      $doctruyen->save();
    }

    public function cauhoi_tracnghiem(Request $request)
    {
      # code...
      $cauhoi = DB::table('TRACNGHIEM')
        ->where('MaMonHoc','=',$request->get('MaMonHoc'))
        ->get();
      echo json_encode($cauhoi); exit;
    }

    public function xemDapan(Request $request)
    {
      # code...
      $cautraloi = DB::table('CAUTRALOI')
        ->join('TRACNGHIEM','TRACNGHIEM.id','=','CAUTRALOI.idCauHoi')
        ->where('CAUTRALOI.idCauHoi','=',$request->get('idCauhoi'))
        ->select('TRACNGHIEM.CauHoi','CAUTRALOI.CauTraLoi','CAUTRALOI.DapAn as tl','TRACNGHIEM.DapAn as da','TRACNGHIEM.id')
        ->get();
      echo json_encode($cautraloi);
      exit;
    }

    public function capnhatTN(Request $request)
    {
        # code...
        
    }
}
