@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12" id="danhsach">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách học sinh</h3>
                        <p class="text-muted">Học sinh</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                        {{ notifications('success',session('notification')) }}
                        @endif
                    </div>
                </div>

                <form action="manage/ajax/phanlop_ajax" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="dual-list list-right col-md-6">
                        <div class="well">
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
                                @foreach($hocsinh as $hs)
                                    <li class="list-group-item right" data-value="{{$hs->MaHocSinh}}">{{$hs->HoTen}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="dual-list list-left col-md-6">
                        <div class="well text-right">
                            <div class="row">
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
                        <button type="button" value="submit" id="submit" class="fcbtn btn btn-info btn-outline btn-1f  btn-block">Phân lớp</button>
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
                               html+='<option value="'+array[i]['MaLop']+'">'+array[i]['TenLop']+'</option>'
                           }
                           $('#txtLop').html(html);
                       }
                   });
               }else{
                   $('#txtLop').html('<option value="">--Chọn lớp học--</option>');
                   $('#dual-list-left').html('');
               }
           });

            $(document).on('change','#txtLop',function() {
                if ($(this).val() != '') {
                    $.ajax({
                        url: 'manage/ajax/hocsinh_lop/'+$(this).val(),
                        type: 'GET',
                        success: function ($respon) {
                            $('#dual-list-left').html($respon);
                        }
                    });
                }else{
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
                var MaKhoiLop = $('#txtKhoi').val();
                var MaLop = $('#txtLop').val();

                $.ajax({
                    url: 'manage/ajax/phanlop_ajax',
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
                        'txtKhoi' : MaKhoiLop,
                        'txtLop' : MaLop
                    },
                    success:function(response){
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
