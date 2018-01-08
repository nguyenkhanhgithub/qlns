@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-12" id="danhsach">
	   <div class="white-box">
			<div class="row">
				<div class="col-sm-6">
			      	<h3 class="box-title">Danh sách lớp học</h3>
			      	<p class="text-muted">Lớp học</p>
				</div>
				<div class="col-sm-6">
					<a href="manage/lop/getInsert" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</a>
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
	                  <th>Tên lớp</th>
	                  <th>Khối</th>
	                  <th>Năm học</th>
	                  <th>Sĩ số</th>
	                  <th>GVCN</th>
	                  <th>Tác vụ</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
	            	@foreach($lop as $l)
	            	<tr>
						<td>{{ $l->MaLop }}</td>
						<td>{{ $l->TenLop }}</td>
						<td>{{ $l->TenKhoiLop }}</td>
						<td>{{ $l->TenNamHoc }}</td>
						<td>{{ $l->SiSo }}</td>
						<td>{{ $l->TenGiaoVien }}</td>
						<td class="text-nowrap center"> 
							<a href="manage/lop/getUpdate/{{ $l->MaLop }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
							@if($l->MaPhanLop == NULL)
							<a href="manage/lop/getDelete/{{ $l->MaLop }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
							@endif
						</td>
	            	</tr>
	            	@endforeach
	            </tbody>
	         </table>
	         {{ $lop->links() }}
	      </div>
	   </div>
	</div>
</div>

@endsection
@section('script')
<script>
	$('#sa-warning').click(function(e) {
		e.preventDefault();
		var link = $(this);
		swal({
			title: "Bạn muốn xóa ?",
			text: "You will not be able to recover this imaginary file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false,
		}, function(isConfirm) {
			if (isConfirm) {
				window.location = link.attr('href');
			}
		});
	});
</script>
@endsection