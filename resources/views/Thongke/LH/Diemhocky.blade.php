@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-3 col-lg-3">
	   <div class="white-box">
            <div class="vtabs" style="width: 100%;">
                <ul class="nav tabs-vertical" style="border-right: 0px;">
                     <li class="tab active" data-value="{{$hocky->MaHocKy}}">
                        <a data-toggle="tab" href="#{{$hocky->MaHocKy}}" aria-expanded="false"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Kết quả học tập {{$hocky->TenHocKy}}</span> </a>
                    </li>
                </ul>
            </div>
		</div>
	</div>
	<div class="col-sm-9">
	   <div class="white-box">
            <div class="row">
                <div class="col-sm-12">
                    @if(session('notification') == 'info')
                        {{ notifications(session('notification'),"Cập nhật thành công!") }}
                    @elseif(session('notification') == 'warning')
                        {{ notifications(session('notification'),"Có lỗi xảy ra!") }}
                    @endif
                </div>
            </div>
			<div class="row">
				<div class="col-sm-8">
			      	<h3 class="box-title">Điểm học tập của học sinh - <b>{{$hocsinh_id->HoTen}}</b></h3>
			      	<p class="text-muted">Lớp - {{$hocsinh_id->TenLop}}</p>
                </div>
				<div class="col-sm-4">
                    <form method="post" action="manage/diemhk/postInsert/{{$hocsinh_id->MaHocSinh}}">
                        <input type="hidden" name="_token" value="{{csrf_Token()}}">
                        <input type="hidden" name="MaLop" value="{{$hocsinh_id->MaLop}}">
                        <input type="hidden" name="Namhoc" value="{{$namhoc_ip}}">
                        <input type="hidden" name="Hocky" value="{{$hocky_ip}}">
                        <button type="submit" value="submit" name="submit" class="fcbtn btn btn-info btn-outline btn-1f pull-right" @if(isset($DTB)) {{"disabled"}} @endif>Tính điểm TB</button>
                    </form>
				</div>
			</div>
            <div class="tab-content">
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th class="text-center">Môn học</th>
                            <th class="text-center">Điểm miệng</th>
                            <th class="text-center">Điểm 15 phút</th>
                            <th class="text-center">Điểm 45 phút</th>
                            <th class="text-center">Điểm thi</th>
                            <th class="text-center">ĐTB Môn HK</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                            @foreach($mon_namhoc as $mh)
                            <tr>
                                <td>{{$mh->TenMonHoc}}</td>
                                 <td class="text-center">
                                    @foreach($diem as $dm)
                                        @if($dm->MaMonHoc === $mh->MaMonHoc && $dm->MaLoai === 'LD0001')
                                        {{round($dm->Diem,2)}}    
                                        @endif
                                    @endforeach   
                                </td>
                                <td class="text-center">
                                    @foreach($diem as $d15P)
                                        @if($d15P->MaMonHoc === $mh->MaMonHoc && $d15P->MaLoai === 'LD0002')
                                        {{round($d15P->Diem,2)}}
                                        @endif
                                    @endforeach   
                                </td>
                                <td class="text-center">
                                    @foreach($diem as $d45P)
                                        @if($d45P->MaMonHoc === $mh->MaMonHoc && $d45P->MaLoai === 'LD0003')
                                        {{round($d45P->Diem,2)}}
                                        @endif
                                    @endforeach   
                                </td>
                                <td class="text-center">
                                    @foreach($diem as $dt)
                                        @if($dt->MaMonHoc === $mh->MaMonHoc && $dt->MaLoai==='LD0004')
                                        {{round($dt->Diem,2)}}
                                        @endif
                                    @endforeach   
                                </td> 
                                 <td class="text-center">
                                    @foreach($hocsinhdiem as $di)
                                        @if($di->MaMonHoc === $mh->MaMonHoc)
                                            {{round($di->DTBMonHocKy,2)}}
                                        @endif
                                    @endforeach
                                </td> 
                            @endforeach 
                        </tbody>
                    </table>
                    <p style="">Điểm trung bình {{$hocky->TenHocKy}}: @if(isset($DTB)) <span style="font-weight: bold;"> {{round($DTB->DTBMonHocKy,2)}}</span>@endif</p>
                </div>
            </div>
	   </div>
	</div>
</div>
@endsection
