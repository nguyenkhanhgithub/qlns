@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-3 col-lg-3">
	   <div class="white-box">
            <div class="vtabs" style="width: 100%;">
                <ul class="nav tabs-vertical" style="border-right: 0px;">
                     @foreach($hocky as $hk)
                        <li class="tab" data-value="{{$hk->MaHocKy}}">
                            <a data-toggle="tab" href="#{{$hk->MaHocKy}}"aria-expanded="false"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">{{$hk->TenHocKy}}</span> </a>
                        </li>
                    @endforeach 
                    {{--  <li class="tab" data-value="{{$hocky->MaHocKy}}">
                        <a data-toggle="tab" href="#{{$hocky->MaHocKy}}"aria-expanded="false"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Kết quả học tập {{$hocky->TenHocKy}}</span> </a>
                    </li>  --}}
                </ul>
            </div>
		</div>
	</div>
    <input type="hidden" value="{{$hocsinh_id[0]->MaHocSinh}}" name="MaHS">
    <input type="hidden" value="{{$hocsinh_id[0]->MaLop}}" name="MaLH">
     <input type="hidden" value="{{$namhoc}}" name="MaNH"> 
	<div class="col-sm-9">
	   <div class="white-box">
			<div class="row">
				<div class="col-sm-12">
			      	<h3 class="box-title">Điểm học tập của học sinh - <b>{{$hocsinh_id[0]->HoTen}}</b></h3>
			      	<p class="text-muted">Lớp - {{$hocsinh_id[0]->TenLop}}</p>
				</div>
			</div>
            <div class="tab-content">
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th class="text-center">Môn học</th>
                            <th class="text-center">Điểm miệng</th>
                            <th class="text-center">Điểm 15 phút</th>
                            <th class="text-center">Điểm 45 phút</th>
                            <th class="text-center">Điểm thi</th>
                            <th class="text-center">ĐTB Kiểm Tra</th>
                            <th class="text-center">ĐTB Môn HK</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                          
                        </tbody>
                    </table>
                </div>
            </div>
	   </div>
	</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var get = $('input[name="get"]').val();
        if(get !==''){
            $('.tabs-vertical>li:nth-child(1)').addClass('active');
            $('.tab-content>div:nth-child(1)').addClass('active');
            hocsinhdiem($('.tabs-vertical>li:nth-child(1)').data('value'));
        }
        $(document).on('click','.tabs-vertical>.tab',function(){
            hocsinhdiem($(this).data('value'));
        });

        function hocsinhdiem(value){
            $.ajax({
                url: 'manage/ajax/hocsinhmon?MaHK='+value+"&MaHS="+$('input[name="MaHS"]').val()+"&MaNH="+$('input[name="MaNH"]').val(),
                type: 'get',
                success:function(response){
                    $('#listtable').html(response);
                }
            });
        }
    });
</script>
@endsection
