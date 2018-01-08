@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-2 col-lg-2">
	   <div class="white-box">
			<form action="manage/hkmh/getSearch" method="get">
				<input type="hidden" value="{{csrf_Token()}}" name="_token">
				<div class="panel-body">
					<p style="font-weight: bold; color: red;">*Tiêu chí thống kê</p>
				</div>
				<div class="form-group">
					<select name="txtNamhoc" id="txtNamhoc" class="form-control">
						<option value="">--Chọn năm học--</option>
						@foreach($namhoc as $nh)
							<option value="{{$nh->MaNamHoc}}" @if(isset($keyword) && $nh->MaNamHoc == $keyword['namhoc']){{"selected"}}@endif>{{$nh->TenNamHoc}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<select name="txtHocky" id="txtHocky" class="form-control">
						<option value="">--Chọn học kỳ--</option>
						@foreach($hocky as $hk)
							<option value="{{$hk->MaHocKy}}" @if(isset($keyword) && $hk->MaHocKy == $keyword['hocky']){{"selected"}}@endif>{{$hk->TenHocKy}}</option>
						@endforeach
					</select>
                </div>
                
				<div class="form-group">
					<select name="txtMonhoc" id="txtMonhoc" class="form-control">
						<option value="">--Chọn môn học--</option>
						@foreach($monhoc as $mh)
							<option value="{{$mh->MaMonHoc}}" @if(isset($keyword) && $mh->MaMonHoc == $keyword['monhoc']){{"selected"}}@endif>{{$mh->TenMonHoc}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">Xem danh sách</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-sm-10" >
	   <div class="white-box">
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach($errors->all() as $err)
                    {{ $err }} <br>
                    @endforeach 
                </div>
            @endif
			<div class="row">
				<div class="col-sm-12">
			      	<h3 class="box-title">Kết quả học kỳ theo môn học</h3>
			      	<p class="text-muted">Kết quả theo môn học</p>
				</div>
			</div>
	      	<div class="table-responsive">
	         <table class="table color-bordered-table info-bordered-table">
	            <thead>
	               <tr>
	                  <th class="text-center">#</th>
	                  <th class="text-center">Tên học sinh</th>
	                  <th class="text-center">Ngày sinh</th>
	                  <th class="text-center">Lớp học</th>
					  <th class="text-center">Điểm trung bình</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
                    @if(!empty($hocsinh))
                    @foreach($hocsinh as $hs)
                        <tr>
                            <td class="text-center">{{$hs->MaHocSinh}}</td>
                            <td>{{$hs->HoTen}}</td>
                            <td>{{$hs->NgaySinh}}</td>
                            <td class="text-center">{{$hs->TenLop}}</td>
                            <td class="text-center">
                                @foreach($diem as $d)
                                    @if($hs->MaHocSinh === $d->MaHocSinh)
                                    @if($d->DTBMonHocKy !==null)
                                    {{round($d->DTBMonHocKy,2)}}
                                    @endif
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    @endif
				</tbody>
	         </table>
			@if(isset($hocsinh))
				{{$hocsinh->appends(Request::except('page'))->links()}}
			@endif
	      </div>
	   </div>
	</div>
</div>
@endsection

