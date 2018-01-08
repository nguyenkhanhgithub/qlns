@extends('layouts.master')
@section('content')
<style>
	#error{
		color: red;
	}
</style>
<div class="row">
   <div class="col-md-4 col-md-offset-4">
    <div class="white-box">
        <h3 class="box-title m-b-0">Thêm khối lớp</h3>
        <p class="text-muted"></p>
       	@if(count($errors) > 0)
       		<div class="alert alert-danger alert-dismissable">
       			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	           	@foreach($errors->all() as $err)
	           	 {{ $err }} <br>
	           	@endforeach 
	        </div>
       	@endif
       	@if(session('notification'))
            {{ notifications('success',session('notification')) }}
        @endif
        <div class="row">
            <div class="col-sm-12 col-xs-12">
               <form action="manage/khoilop/postInsert" method="post">
               		<input type="hidden" name="_token" value="{{ csrf_Token() }}">
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Mã khối lớp</label>
	                    <input type="text" class="form-control" id="txtMaKhoiLop" name="txtMaKhoiLop" placeholder="" readonly="" value="">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Khối lớp</label>
	                    <input type="text" class="form-control" id="txtTenKhoiLop" name="txtTenKhoiLop" placeholder="Nhập tên khối lớp" value=""> 
	                </div>
                  	<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm mới</button>
                  	<a href="manage/khoilop/index" class="btn btn-inverse waves-effect waves-light">Quay lại</a>
               </form>
            </div>
         </div>
      	</div>
   </div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$('#txtTenKhoiLop').keyup(function(event) {
			/* Act on the event */
			$val = bodauTiengViet($(this).val());
			$('#txtMaKhoiLop').attr('value',$val.replace(/\s/g, ''))
			$('#txtMaKhoiLop').css('text-transform', 'uppercase');
		});
	});
</script>
@endsection