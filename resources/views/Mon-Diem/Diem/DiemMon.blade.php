@extends('layouts.master')
@section('content')
    <div class="row">
        <!-- col-md-3 -->
        <div class="col-md-4 col-lg-2">
            <div class="white-box">
                <form action="manage/diem/getSearch" method="get">
                    <input type="hidden" value="{{csrf_Token()}}" name="_token">
                    <div class="panel-body">
                        <p style="font-weight: bold; color: red;">*Tiêu chí xem điểm</p>
                    </div>
                    <div class="form-group">
                        <select name="txtNamhoc" id="txtNamhoc" class="form-control">
                            <option value="">--Chọn năm học--</option>
                            @foreach($namhoc as $nh)
                                <option value="{{$nh->MaNamHoc}}" @if(isset($keyword) && $nh->MaNamHoc == $keyword['namhoc_tk']){{"selected"}}@endif>{{$nh->TenNamHoc}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="txtLop" id="txtLop" class="form-control">
                            <option value="">--Chọn lớp học--</option>
                            @foreach($lop as $l)
                                <option value="{{$l->MaLop}}" @if(isset($keyword) && $l->MaLop== $keyword['lop_tk']){{"selected"}}@endif>{{$l->TenLop}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="txtMonhoc" id="txtMonhoc" class="form-control">
                            <option value="">--Chọn môn học--</option>
                            @if(isset($monhoc))
                                @foreach($monhoc as $mh)
                                    <option value="{{$mh->MaMonHoc}}" @if(isset($keyword) && $mh->MaMonHoc == $keyword['monhoc_tk']){{"selected"}}@endif>{{$mh->TenMonHoc}}</option>
                                @endforeach  
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="txtHocky" id="txtHocky" class="form-control">
                            <option value="">--Chọn học kỳ--</option>
                            @foreach($hocky as $hk)
                                <option value="{{$hk->MaHocKy}}" @if(isset($keyword) && $hk->MaHocKy == $keyword['hocky_tk']){{"selected"}}@endif>{{$hk->TenHocKy}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">Xem danh sách</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col-md-3 -->
        <!-- col-md-9 -->
        <div class="col-md-8 col-lg-10">
            <div class="white-box">
                @if(count($errors) > 0)
                    {{alert_dimiss($errors)}}
                @endif
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table" id="example">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên học sinh</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Điểm miệng</th>
                            <th class="text-center">Điểm 15 phút</th>
                            <th class="text-center">Điểm 45 phút</th>
                            <th class="text-center">Điểm thi</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        @if(isset($all))
                            @foreach($all as $hs)
                                <tr>
                                    <form action="manage/ajax/them_diem" method="post">
                                    <input type="hidden" value="{{csrf_Token()}}" name="_token">
                                    <td>{{$hs->MaHocSinh}}</td>
                                    <td>{{$hs->HoTen}}</td>
                                    <td>{{$hs->NgaySinh}}</td>
                                    <td width="10%" id="" class="text-center">
                                        <span id="dm">
                                        @foreach($diem as $d)
                                            @if($d->MaHocSinh == $hs->MaHocSinh)
                                                @if($d->DiemMieng <= "4.9")
                                                <span style="color: red;">{{round($d->DiemMieng,2)}}</span>
                                                @else
                                                {{round($d->DiemMieng,2)}}
                                                @endif
                                            @endif
                                        @endforeach 
                                        </span>
                                        <input type="number" class="form-control hidden mieng" name="mieng" required>
                                    </td>
                                    <td width="10%" id=""  class="text-center">
                                        <span id="15p">
                                         @foreach($diem as $d)
                                            @if($d->MaHocSinh == $hs->MaHocSinh)
                                                @if($d->Diem15P <= "4.9")
                                                <span style="color: red;">{{round($d->Diem15P,2)}}</span>
                                                @else
                                                {{round($d->Diem15P,2)}}
                                                @endif
                                            @endif
                                        @endforeach 
                                        </span>
                                        <input type="number" class="form-control hidden 15P" name="15P" required>
                                    </td>
                                    <td width="10%" id=""  class="text-center">
                                        <span id="45p">
                                         @foreach($diem as $d)
                                            @if($d->MaHocSinh == $hs->MaHocSinh)
                                                @if($d->Diem45P <= "4.9")
                                                <span style="color: red;">{{round($d->Diem45P,2)}}</span>
                                                @else
                                                {{round($d->Diem45P,2)}}
                                                @endif
                                            @endif
                                        @endforeach 
                                        </span>
                                        <input type="number" class="form-control hidden 45P" name="45P" required>
                                    </td>
                                    <td width="10%" id=""  class="text-center">
                                        <span id="thi">
                                         @foreach($diem as $d)
                                            @if($d->MaHocSinh == $hs->MaHocSinh)
                                                @if($d->DiemThi <= "4.9")
                                                <span style="color: red;">{{round($d->DiemThi,2)}}</span>
                                                @else
                                                {{round($d->DiemThi,2)}}
                                                @endif
                                            @endif
                                        @endforeach 
                                        </span>
                                        <input type="number" class="form-control hidden Thi" name="Thi" required>
                                    </td>
                                    <td class="text-center" width="15%">
                                        <button type="button" id="click" class="fcbtn btn btn-info btn-outline btn-1f click">Thêm điểm</button>
                                        <button type="button" value="{{$hs->MaHocSinh}}" id="submit" class="fcbtn btn btn-info btn-outline btn-1f hidden luu">Lưu</button>
                                        <button type="button" id="back" class="fcbtn btn btn-warning btn-outline btn-1f hidden huy">Hủy</button>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @if(isset($all))
                        {{$all->appends(Request::except('page'))->links()}}
                    @endif
                </div>
        <!-- /tabs -->
            </div>
        </div>
        <!-- /col-md-9 -->
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
                    $('#txtMonhoc').html('<option value="">--Chọn môn học--</option>');
                    $('#txtLop').html('<option value="">--Chọn lớp học--</option>');
                }
            });

            $(document).on('change','#txtLop',function(){
                $.ajax({
                    url: 'manage/ajax/mon_id?MaLop='+$(this).val()+'&MaNH='+$('#txtNamhoc').val(),
                    type: 'get',
                    success:function(response){
                        var array = JSON.parse(response);
                        var len = array.length;
                        html='<option value="">--Chọn môn học--</option>';
                        for(i=0;i<len; i++){
                            html+='<option value="'+array[i]['MaMonHoc']+'">'+array[i]['TenMonHoc']+'</option>';
                        }
                        $('#txtMonhoc').html(html); 
                    }
                });
            });

            $(document).on('click','.click',function(){
                $row = $(this).closest('tr');
                
                
                $dm = $.trim($row.find('#dm').text());
                $15p = $.trim($row.find('#15p').text());
                $45p = $.trim($row.find('#45p').text());
                $thi = $.trim($row.find('#thi').text());

                $row.find('#dm').addClass('hidden');
                $row.find('#15p').addClass('hidden');
                $row.find('#45p').addClass('hidden');
                $row.find('#thi').addClass('hidden');

                $row.find('.mieng').removeClass('hidden').val($dm);
                $row.find('.15P').removeClass('hidden').val($15p);
                $row.find('.45P').removeClass('hidden').val($45p);
                $row.find('.Thi').removeClass('hidden').val($thi);
                $row.find('.huy').removeClass('hidden');
                $row.find('.luu').removeClass('hidden');
                
                $(this).addClass('hidden');
            });

            $(document).on('click','.huy',function(){
                $row = $(this).closest('tr');
                $row.find('.mieng').addClass('hidden');
                $row.find('.15P').addClass('hidden');
                $row.find('.45P').addClass('hidden');
                $row.find('.Thi').addClass('hidden');
                $row.find('.huy').addClass('hidden');

                
                $row.find('#dm').removeClass('hidden');
                $row.find('#15p').removeClass('hidden');
                $row.find('#45p').removeClass('hidden');
                $row.find('#thi').removeClass('hidden');


                $row.find('.luu').addClass('hidden');
                $row.find('.click').removeClass('hidden');
            });

            $(document).on('click','.luu',function(){
                $row = $(this).closest('tr');
                $mieng = $row.find('.mieng').val();
                $15P = $row.find('.15P').val();
                $45P = $row.find('.45P').val();
                $Thi = $row.find('.Thi').val();
                var array = [];
                array.push($mieng);
                array.push($15P);
                array.push($45P);
                array.push($Thi);
                $.ajax({
                    url: 'manage/ajax/them_diem',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        var token = $('input[name="_token"]').val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data:{
                        'array' : array,
                        'MaHocSinh' : $(this).val(),
                        'MaNamHoc': $('#txtNamhoc').val(),
                        'MaHocKy' : $('#txtHocky').val(),
                        'MaLop' : $('#txtLop').val(),
                        'MaMonHoc' : $('#txtMonhoc').val(),
                        
                    },
                    success:function(response){
                        $.toast({
                            heading: 'Thông báo',
                            text: 'Cập nhật thành công.',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'info',
                            hideAfter: 4000,
                            stack: 1
                        });    
                    }
                });
                
                $(this).addClass('hidden');
                $row.find('#click').removeClass('hidden');
                $row.find('#back').addClass('hidden');
                //input
                $row.find('.mieng').addClass('hidden');
                $row.find('.15P').addClass('hidden');
                $row.find('.45P').addClass('hidden');
                $row.find('.Thi').addClass('hidden');
                //td
                $row.find('#dm').removeClass('hidden').html($mieng);
                $row.find('#15p').removeClass('hidden').html($15P);
                $row.find('#45p').removeClass('hidden').html($45P);
                $row.find('#thi').removeClass('hidden').html($Thi);
            });
        });
    </script>
@endsection
@section('style')
<style>
#listtable input{
    text-align:center;
}
.diem{
    font-weight: bold;
}
</style>
@endsection