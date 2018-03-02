@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-12">
		@foreach($khoilop as $kl)
		<div class="col-sm-4">
			<a href="/manage/thicu/index?idKhoi={{ $kl->MaKhoiLop }}">
				<div class="white-box">
					{{ $kl->TenKhoiLop }}
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection
@section('script')
@endsection
