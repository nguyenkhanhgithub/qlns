@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12" id="danhsach">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách giáo viên - môn học</h3>
                        <p class="text-muted">Giáo viên <b>{{$giaovien_id->TenGiaoVien}} ({{$giaovien_id->MaGiaoVien}})</b></p>
                        <input type="hidden" value="{{$giaovien_id->MaGiaoVien}}" id="MaGiaoVien" name="MaGiaoVien">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                            {{ notifications('success',session('notification')) }}
                        @endif
                    </div>
                </div>
                <form action="manage/ajax/phancong_ajax" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="txtNamhoc" id="txtNamhoc" class="form-control">
                                            <option value="">--Chọn năm học--</option>
                                            @foreach($namhoc as $nh)
                                                <option value="{{ $nh->MaNamHoc }}">{{ $nh->TenNamHoc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="txtKhoi" id="txtKhoi" class="form-control">
                                            <option value="">--Chọn khối học--</option>
                                            @foreach($khoilop as $k)
                                                <option value="{{$k->MaKhoiLop}}">{{$k->TenKhoiLop}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="txtLop" id="txtLop" class="form-control">
                                            <option value="">--Chọn lớp học--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="dual-list list-right col-md-6">
                            <div class="well">
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Môn học chưa phân công</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon glyphicon glyphicon-search" style="top: 0px;"></span>
                                            <input type="text" name="SearchDualList" class="form-control" placeholder="search">
                                            <span class="input-group-addon glyphicon glyphicon-unchecked selector" style="cursor: pointer; top: 0px;" title="Select All"></span>
                                            <span class="input-group-addon glyphicon glyphicon-plus move-left" style="cursor: pointer; top: 0px;" title="Add Selected"></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group" id="dual-list-right">
                                </ul>
                            </div>
                        </div>
                        <div class="dual-list list-left col-md-6">
                            <div class="well text-right">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Môn học được phân công</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon glyphicon glyphicon-search" style="top: 0px;"></span>
                                            <input type="text" name="SearchDualList" class="form-control" placeholder="search">
                                            <span class="input-group-addon glyphicon glyphicon-unchecked selector" style="cursor: pointer; top: 0px;" title="Select All"></span>
                                            <span class="input-group-addon glyphicon glyphicon-minus move-right" style="cursor: pointer; top: 0px;" title="Remove Selected"></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group" id="dual-list-left">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" value="submit" id="submit" class="fcbtn btn btn-info btn-outline btn-1f  btn-block">Phân công</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){

        $(document).on('change','#txtKhoi',function(){
            if($(this).val() != ''){
                $.ajax({
                    url: 'manage/ajax/lop_id?id_khoi='+$(this).val()+"&id_namhoc="+$('#txtNamhoc').val(),
                    type: 'GET',
                    success:function($respon){
                        $('#txtLop').html($respon);
                        array = JSON.parse($respon);
                        var len=array.length;
                        html='<option value="">--Chọn lớp học--</option>';
                        for(i=0;i<len;i++){
                            html+='<option value="'+array[i]['MaLop']+'">'+array[i]['TenLop']+'</option>';
                        }
                        $('#txtLop').html(html);
                    }
                });
            }else{
                $('#txtLop').html('<option value="">--Chọn lớp học--</option>');
                $('#dual-list-left').html('');
                $('#dual-list-right').html('');
            }
        });


        $(document).on('change','#txtLop',function() {
            if ($(this).val() != '') {
                $.ajax({
                    url: 'manage/ajax/giaovien_daxep?MaGV='+$('#MaGiaoVien').val()+'&MaNH='+$('#txtNamhoc').val()+'&MaLH='+$(this).val(),
                    type: 'GET',
                    success: function ($respon) {
                        $('#dual-list-left').html($respon);
                    }
                });
                $.ajax({
                    url: 'manage/ajax/giaovien_chuaxep?MaNH='+$('#txtNamhoc').val()+'&MaLH='+$(this).val()+'&MaGV='+$('#MaGiaoVien').val(),
                    type: 'GET',
                    success: function ($respon) {
                        $('#dual-list-right').html($respon);
                    }
                });
            }else{
                $('#dual-list-right').html('');
                $('#dual-list-left').html('');
            }
        });

        $(document).on('click','#submit',function(){
            var array=[];
            var i = 0;
            $('#dual-list-left>.list-group-item').each(function(i,item){
                array.push($(item).data('value'));
            });
            var MaNamHoc = $('#txtNamhoc').val();
            var MaLop = $('#txtLop').val();
            var MaGiaoVien = $('#MaGiaoVien').val();

            $.ajax({
                url: 'manage/ajax/phancong_ajax',
                type: 'POST',
                beforeSend: function (xhr) {
                    var token = $('input[name="_token"]').val();

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data:{
                    'array' : array,
                    'txtNamhoc' : MaNamHoc,
                    'txtLop' : MaLop,
                    'txtMaGiaoVien': MaGiaoVien
                },
                success:function(respon){
                   var array = JSON.parse(respon);
                   $.toast({
                        heading: 'Thông báo',
                        text: 'Cập nhật thành công.',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 4000,
                        stack: 6
                    });
                }
            });
        });
    });
</script>
@endsection

