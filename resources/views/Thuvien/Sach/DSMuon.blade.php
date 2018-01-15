@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3" style="position: fixed; top: 200px; z-index: 99; right: 20px;">
            <div class="white-box">
                <p style="font-weight: bold; color: red;">*Tiêu chí tìm kiếm</p>
                <form id="form_id" action="manage/muonsach/getSearch" method="get">
                  <div class="form-group">
                    <input type="text" name="NgayMuon_s" id="NgayMuon_s" value="@if(isset($keyword['NgayMuon'])) {{$keyword['NgayMuon']}} @endif" class="form-control" placeholder="Ngày mượn (dd/mm/yyyy)">
                  </div>
                  <div class="form-group">
                    <select name="idTheLoaiSach_s" id="idTheLoaiSach_s" class="form-control">
                        <option value="">--Chọn thể loại</option>
                        @foreach($theloai as $tls)
                        <option value="{{$tls->id}}" @if(isset($keyword['idTheLoaiSach']) && $keyword['idTheLoaiSach'] == $tls->id) {{"selected"}} @endif>{{$tls->TenTheLoai}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="idTenSach_s" id="idTenSach_s" class="form-control select2">
                      <option value="">--Chọn sách--</option>
                      @if(!empty($sach_theloai))
                        @foreach($sach_theloai as $stl)
                          <option value="{{$stl->id}}" @if(isset($keyword['idTenSach']) && $keyword['idTenSach'] == $stl->id) {{"selected"}} @endif>{{$stl->TenSach}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="getSearch" class="fcbtn btn btn-info btn-outline btn-1f" name="button">Tìm kiếm</button>
                  </div>
                </form>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                            {{ notifications('info',session('notification')) }}
                        @endif
                    </div>
                </div>
                @if(count($errors) > 0)
                    {{alert_dimiss($errors)}}
                @endif
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Thông tin mượn sách</b></h3>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" data-toggle='modal' data-target='#myModal' value="modalthem" name="modalthem" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</button>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            @include('Thuvien.sach.ajaxPaginate')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Thêm thông tin mượn sách</h4>
            </div>
            <form method="post" action="manage/muonsach/postInsert" id="form-modal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <input type="hidden" name="idSach" id="idSach" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Thể loại sách</label>
                                <select name="idTheLoaiSach" id="idTheLoaiSach" class="form-control">
                                    <option value="">--Chọn thể loại</option>
                                    @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->TenTheLoai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Năm học</label>
                                <select name="txtNamhoc" id="txtNamhoc" class="form-control">
                                    <option value="">--Chọn năm học--</option>
                                    @foreach($namhoc as $nh)
                                        <option value="{{$nh->MaNamHoc}}">{{$nh->TenNamHoc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Học sinh</label>
                                <select name="txtHocSinh" id="txtHocSinh" class="form-control">
                                    <option value="">--Chọn học sinh--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên sách</label>
                                <select name="idTenSach" id="idTenSach" class="form-control">
                                    <option value="">--Chọn sách--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lớp học</label>
                                <select name="txtLop" id="txtLop" class="form-control">
                                    <option value="">--Chọn lớp học--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày trả</label>
                                <input type="text" class="form-control" value="" name="NgayTra" id="NgayTra" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect" id="save" value="">Lưu thông tin</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('script')
<script>


    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });

    function getPosts(page) {
        $.ajax({
            url : 'manage/muonsach/index?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.table-responsive').html(data);
        });
    }

    $(document).on('change','#idTheLoaiSach',function(){
        $.ajax({
            url: 'manage/ajax/sach_theloai?idTLSach='+$(this).val(),
            type: 'get',
            success:function(response){
                var array = JSON.parse(response);
                var len = array.length;
                html='<option value="">--Chọn sách--</option>';
                for(i=0;i<len;i++){
                    html+='<option value="'+array[i]['id']+'">'+array[i]['TenSach']+'</option>';
                }
                $('#idTenSach').html(html);
            }
        });
    });

        $(document).on('change','#idTheLoaiSach_s',function(){
            $.ajax({
                url: 'manage/ajax/sach_theloai?idTLSach='+$(this).val(),
                type: 'get',
                success:function(response){
                    var array = JSON.parse(response);
                    var len = array.length;
                    html='<option value="">--Chọn sách--</option>';
                    for(i=0;i<len;i++){
                        html+='<option value="'+array[i]['id']+'">'+array[i]['TenSach']+'</option>';
                    }
                    $('#idTenSach_s').html(html);
                }
            });
        });
    $(document).on('click','.model_img',function(){
        var id = $(this).data('value');
        swal({
            title: "Đồng ý xóa?",
            text: "Trong hệ thống sẽ mấy dữ liệu này!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý!",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'manage/ajax/muon_delete?id='+id,
                    type: 'get',
                    success:function(response){
                        var array = JSON.parse(response);
                        if(array['status'] === 'success'){
                            swal("Thành công!", "Lịch đã được xóa.", "success");
                            window.location = window.location.href;
                        }
                    }
                });
            }
        });
    });

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
  			$('#txtLop').html('<option value="">--Chọn lớp học--</option>');
  		}
    });

    $(document).on('change','#txtLop',function(){
        $.ajax({
            url: 'manage/ajax/hocsinh_l?idLop='+$(this).val(),
            type: 'get',
            success:function(response){
                var array = JSON.parse(response);
                var len = array.length;
                html='<option value="">--Chọn học sinh--</option>';
                for(i=0;i<len;i++){
                    html+='<option value="'+array[i]['MaHocSinh']+'">'+array[i]['HoTen']+'</option>';
                }
                $('#txtHocSinh').html(html);
            }
        });
    });
</script>
@endsection
