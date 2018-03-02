@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-8">
			<div class="white-box">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="box-title">{{ $monhoc->TenMonHoc }}</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" style="">
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="white-box">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="box-title" style="border-bottom: 1px solid #EEE">Giáo viên</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<ul class="chatonline" style="list-style: none; margin-left: 0px; padding-left: 0px;">
							@foreach($GvMon as $gvm)
								<li>
	                                <a href="javascript:void(0)"><img src="/public/upload/giaovien/1.jpg" class="img-circle"> <span>{{ $gvm->TenGiaoVien }}<small class="text-success">{{ $gvm->MaGiaoVien }}</small></span></a>
	                            </li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
@endsection