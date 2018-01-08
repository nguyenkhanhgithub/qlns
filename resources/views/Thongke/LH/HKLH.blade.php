@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-3 col-lg-3">
	   <div class="white-box">
			<form action="manage/hklh/getSearch" method="get">
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
					<select name="txtHocky" id="txtHocky" class="form-control">
						<option value="">--Chọn học kỳ--</option>
						@foreach($hocky as $hk)
							<option value="{{$hk->MaHocKy}}" @if(isset($keyword) && $hk->MaHocKy == $keyword['hocky']){{"selected"}}@endif>{{$hk->TenHocKy}}</option>
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
			      	<h3 class="box-title">Kết quả học kỳ theo lớp học</h3>
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
					  <th class="text-center">Tác vụ</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
					@if(isset($hocsinh))
					@foreach($hocsinh as $hs)
					<tr>
						<td class="text-center">{{$hs->MaHocSinh}}</td>
						<td><a href="manage/hocsinh/getUpdate/{{$hs->MaHocSinh}}">{{$hs->HoTen}}</a></td>
						<td class="text-center">{{$hs->NgaySinh}}</td>
						<td class="text-center">
						@foreach($thongke as $tk)
							@if($hs->MaHocSinh === $tk->MaHocSinh)
								{{round($tk->DTBMonHocKy,2)}}
							@endif
						@endforeach
						</td>
						<td class="text-center">
						@foreach($thongke as $tk)
							@if($hs->MaHocSinh === $tk->MaHocSinh)
								{{$tk->TenHocLuc}}
							@endif
						@endforeach
						</td>
						<td class="text-center">
							{{--  <a href="manage/hklh/objectpoint?MaHS={{$hs->MaHocSinh}}&MaNH={{$MaNH}}&MaHK={{$keyword['hocky']}}" title="Danh sách điểm"><i class="fa fa-search" aria-hidden="true"></i></a>  --}}
							<a href="manage/diemhk/index?MaHS={{$hs->MaHocSinh}}&MaNH={{$MaNH}}&MaHK={{$keyword['hocky']}}&MaLop={{$hs->MaLop}}" title="Danh sách điểm"><i class="fa fa-search" aria-hidden="true"></i></a>
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
@section('script')
<script>
$(document).ready(function(){
	$(document).on('change','#txtNamhoc',function(){
		if($(this).val() != ''){
			$.ajax({
				url: 'manage/ajax/lop_namhoc/'+$(this).val(),
				type: 'get',
				success:function(response){
					var array = JSON.parse(response);
					var len = array.length;
					html='<option>--Chọn lớp học--</option>';
					for(i=0; i<len; i++){
						html+='<option value='+array[i]['MaLop']+'>'+array[i]['TenLop']+'</option>';
					}
					$('#txtLop').html(html);
				}
			});
		}else{
			$('#txtLop').html('<option value="">--Chọn lớp học--</option>');
		}
	});
});
</script>
@endsection
