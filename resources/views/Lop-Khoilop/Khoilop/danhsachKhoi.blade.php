@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-6 col-md-offset-3" >
	   <div class="white-box">
			<div class="row">
				<div class="col-sm-6">
			      	<h3 class="box-title">Danh sách khối lớp</h3>
			      	<p class="text-muted">Khối lớp</p>
				</div>
				<div class="col-sm-6">
					<a href="manage/khoilop/getInsert" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					@if(session('notification'))
						{{ notifications('success',session('notification')) }}
					@endif
				</div>
			</div>
	      	<div class="table-responsive">
	         <table class="table color-bordered-table info-bordered-table">
	            <thead>
	               <tr>
	                  <th>#</th>
	                  <th>Tên khối</th>
	                  <th>Tác vụ</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
	            	@foreach($khoilop as $kl)
	            	<tr>
						<td>{{ $kl->MaKhoiLop }}</td>
						<td>{{ $kl->TenKhoiLop }}</td>
						<td class="text-nowrap center"> 
							<a href="manage/khoilop/getUpdate/{{ $kl->MaKhoiLop }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
							@if($kl->MaPhanLop == NULL)
							<a href="manage/khoilop/getDelete/{{ $kl->MaKhoiLop }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
							@endif
						</td>
	            	</tr>
	            	@endforeach
	            </tbody>
	         </table>
	      </div>
	   </div>
	</div>
</div>

@endsection
