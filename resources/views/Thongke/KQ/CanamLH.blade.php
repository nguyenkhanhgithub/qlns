@extends('layouts.master')
@section('content')
	<div class="col-md-3 col-lg-3">
	   <div class="white-box">
			<form action="manage/cnlh/getSearch" method="get">
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
					<select name="txtLop" id="txtLop" class="form-control">
						<option value="">--Chọn lớp học--</option>
						@foreach($lop as $l)
							<option value="{{$l->MaLop}}" @if(isset($keyword) && $l->MaLop== $keyword['lop']){{"selected"}}@endif>{{$l->TenLop}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">Xem danh sách</button>
				</div>
			</form>
		</div>
    </div>
    	<div class="col-sm-9" >
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
			      	<h3 class="box-title">Kết quả cả năm theo lớp học</h3>
			      	<p class="text-muted">Kết quả lớp học</p>
				</div>
			</div>
	      	<div class="table-responsive">
	         <table class="table color-bordered-table info-bordered-table">
	            <thead>
	               <tr>
	                  <th class="text-center">#</th>
	                  <th class="text-center">Tên học sinh</th>
	                  <th class="text-center">Ngày sinh</th>
					  <th class="text-center">ĐTB</th>
                      <th class="text-center">Học lực</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
                    @if(!empty($hocsinh))
                    @foreach($hocsinh as $hs)
                    <tr>
                        <td class="text-center">{{$hs->MaHocSinh}}</td>
                        <td>{{$hs->HoTen}}</td>
                        <td class="text-center">{{$hs->NgaySinh}}</td>
                        <td class="text-center">
                            @foreach($diem as $dtb)
                            @if($dtb->MaHocSinh === $hs->MaHocSinh)
                            {{$dtb->DTBCaNm}}
                            @endif
                            @endforeach
                        </td>
                        <td class="text-center">
                            @foreach($diem as $hl)
                            @if($dtb->MaHocSinh === $hs->MaHocSinh)
                            {{$hl->TenHocLuc}}
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
@endsection