@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-2" >
	   <div class="white-box">
			<div class="row">
				<div class="col-sm-6">
			      	<h3 class="box-title">Danh sách sự kiện</h3>
			      	<p class="text-muted">Sự kiện</p>
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
	                  <th>Tên sự kiện</th>
	                  <th>Ghi chú</th>
					  <th>Bắt đầu</th>
					  <th>Kết thúc</th>
                      <th>Tác vụ</th>
	               </tr>
	            </thead>
	            <tbody id="listtable">
	            	@foreach($sukien as $k => $sk)
	            	<tr>
						<td width="20%">{{ $sk->title }}</td>
						<td width="20%"></td>
						<td>{{$sk->start}}</td>
						<td>{{$sk->end}}</td>
						<td class="text-nowrap center" width="20%"> 
							<a href="manage/sukien/getUpdate/{{ $sk->id }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
						</td>
	            	</tr>
	            	@endforeach
	            </tbody>
	         </table>
             {{$sukien->links()}}
	      </div>
	   </div>
	</div>
</div>

@endsection
@section('script')
<script>
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-info',
        cancelClass: 'btn-inverse'
    });

</script>
@endsection