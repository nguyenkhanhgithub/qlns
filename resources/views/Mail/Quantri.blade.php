@extends('layouts.master')
@section('content')
<div class="row">
	<!-- Left sidebar -->
	<div class="col-md-12">
		<div class="white-box">
			<!-- row -->
			<div class="row">
				<div class="col-lg-5 col-md-5  col-sm-12 col-xs-12 inbox-panel">
					<form method="post" action="manage/ajax/sendmailQTV">
						<input type="hidden" name="_token" value="{{ csrf_Token() }}">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Người gửi</label>
									<select name="txtNguoigui" class="form-control" id="">
										<option value="">--Chọn người gửi--</option>
										@foreach($user as $us)
											<option value="{{$us->id}}">{{ $us->name }}</option>
										@endforeach
									</select>
									<input type="hidden" name="mailnguoigui">
									<input type="hidden" name="tennguoigui">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Tiêu đề</label>
									<input type="text" class="form-control" name="txtTieude" id="txtTieude">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Nội dung</label>
									<textarea name="txtNoidung" id="txtNoidung" class="form-control ckeditor" cols="30" rows="10"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-info waves-effect waves-light m-r-10" id="guitin">Gửi tin</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mail_listing">
					<div class="inbox-center">
						<table class="table color-bordered-table info-bordered-table">
							<thead>
								<tr>
									<th width="50">
										<div class="checkbox m-t-0 m-b-0 ">
											<input  type="checkbox" class="checkbox-toggle" id="checkAll" value="check all">
											<label for="checkbox0">All</label>
										</div>
									</th>
									<th>Họ tên</th>
									<th>Quyền hạn</th>
									<th>Email</th>
									<th>
										<div class="btn-group pull-right">
											<button type="button" id="refresh" class="btn btn-default waves-effect waves-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-refresh"></i> </button>
										</div>
									</th>
								</tr>
							</thead>
							<tbody id="listusers" style="overflow-y: scroll; height: 100px;">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('txtNoidung');
$(document).on('change','select[name="txtNguoigui"]',function(){
	$.ajax({
		url: 'manage/ajax/getMail/'+$(this).val(),
		type: 'get',
		success:function(response){
			array = JSON.parse(response);
			$('input[name="mailnguoigui"]').val(array[0]['email']);
			$('input[name="tennguoigui"]').val(array[0]['name']);
		}
	});
});

users();
$(document).on('click','#refresh',function(){
	users();
	$('input[type="checkbox"]').attr('checked',false);
})

function users(){
	$.ajax({
		url: 'manage/ajax/users',
		type: 'get',
		success:function(response){
			$('#listusers').html(response);
		}
	});
}

$(document).on('change','#checkAll',function(){
	$("input:checkbox").prop('checked', $(this).prop("checked"));
});

$(document).on('click','#guitin',function(){
	var listem = [];
	var i = 0;
	
	$.toast({
		heading: 'Thông báo',
		text: 'Gửi mail thành công.',
		position: 'top-right',
		loaderBg: '#ff6849',
		icon: 'info',
		hideAfter: 4000,
		stack: 6
	});    
	var noidung = CKEDITOR.instances.txtNoidung.getData();
	$('input[class="checkmail"]:checked').each(function(i,item){
		listem.push($(item).val());
	});
	$.ajax({
		url: 'manage/ajax/sendmailQTV',
		type: 'post',
		data:{
			'email': $('input[name="mailnguoigui"]').val(),
			'tieude': $('#txtTieude').val(),
			'noidung': noidung,
			'name':$('input[name="tennguoigui"]').val(),
			'listem': listem
		},
		beforeSend: function (xhr) {
			var token = $('input[name="_token"]').val();

			if (token) {
				return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			}
		},
		success:function(response){
		}
	});
});
</script>
@endsection