@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-6 col-md-offset-3">

    <div class="white-box">
        <h3 class="box-title m-b-0">Cập nhật mã lớp {{ $lop->MaLop }}</h3>
        <p class="text-muted m-b-30 font-13">Lớp {{ $lop->TenLop }}</p>
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
               <form action="manage/lop/postUpdate/{{ $lop->MaLop }}" method="post">
               		<input type="hidden" name="_token" value="{{ csrf_Token() }}">
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Mã Lớp</label>
	                    <input type="text" class="form-control" id="" placeholder="Nhập tên lớp" value="{{ $lop->MaLop }}" disabled=""> 
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên Lớp</label>
	                    <input type="text" class="form-control" id="" name="txtTenLop" placeholder="Nhập tên lớp" value="{{ $lop->TenLop }}"> 
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Khối Lớp</label>
	                    <select name="txtKhoiLop" class="form-control" id="">
	                    	<option value="">--Chọn khối lớp--</option>
	                    	@foreach($khoilop as $kl)
	                    		<option value="{{ $kl->MaKhoiLop }}" @if($lop->MaKhoiLop == $kl->MaKhoiLop) {{ "selected" }} @endif>{{ $kl->TenKhoiLop }}</option>
	                    	@endforeach
	                    </select> 
	                </div>
	                <div class="form-group">
	                    <div class="row">
		                   	<div class="col-sm-9">
		                   		<label for="exampleInputPassword1">Năm Học</label>
		                   		<select name="txtNamhoc" class="form-control" id="">
			                    	<option value="">--Chọn năm học--</option>
			                    	@foreach($namhoc as $nh)
			                    	<option value="{{ $nh->MaNamHoc }}" @if($lop->MaNamHoc == $nh->MaNamHoc) {{ "selected" }} @endif>{{ $nh->TenNamHoc }}</option>
			                    	@endforeach
			                    </select>
		                   	</div>
	                    <div class="col-sm-3">
	                    	<label for="exampleInputPassword1">Sĩ Số</label>
	                    	<input type="number" class="form-control" name="txtSiSo" value="{{ $lop->SiSo }}"> 
	                    </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Giáo Viên Chủ Nhiệm</label>
	                    <select name="txtGiaovien" class="form-control" id="">
	                    	<option value="">--Chọn GVCN--</option>
	                    	@foreach($giaovien as $gv)
	                    	<option value="{{ $gv->MaGiaoVien }}" @if($lop->MaGiaoVien == $gv->MaGiaoVien) {{ "selected" }} @endif>{{ $gv->TenGiaoVien }}</option>
	                    	@endforeach
	                    </select> 
	                </div>
                  	<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cập nhật</button>
                  	<a href="manage/lop/index" class="btn btn-inverse waves-effect waves-light">Quay lại</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection