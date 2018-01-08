@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-2 col-lg-2">
	    <div class="white-box">
            <p style="font-weight: bold; color: red;">*Tiêu chí tìm kiếm</p>
            <form action="manage/sach/getSearch" method="get">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <div class="form-group">
                    <select name="loaisach_s" id="loaisach_s" class="form-control">
                        <option value="">--Chọn loại sách</option>
                        @foreach($loaisach as $ls)
                        <option value="{{$ls->id}}" @if(isset($keyword) && $ls->id == $keyword['loaisach']){{"selected"}}@endif>{{$ls->TenLoaiSach}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="theloai_s" id="theloai_s"  class="form-control">
                        <option value="">--Chọn thể loại</option>
                        @foreach($theloai as $tl)
                        <option value="{{$tl->id}}" @if(isset($keyword) && $tl->id == $keyword['theloai']){{"selected"}}@endif>{{$tl->TenTheLoai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">Tìm kiếm</button>
                </div>
            </form>
		</div>
	</div>
	<div class="col-sm-10">
	   <div class="white-box">
            <div class="row">
                <div class="col-sm-12">
                    @if(count($errors) > 0)
                        {{alert_dimiss($errors)}}
                    @endif
                    @if(session('notification'))
                        {{ notifications('info',session('notification')) }}
                    @endif
                </div>
            </div>
			<div class="row">
				<div class="col-sm-8">
			      	<h3 class="box-title">Danh sách các đầu sách</b></h3>
                </div>
                <div class="col-sm-4">
                    <button type="button" data-toggle='modal' data-target='#myModal' value="modalthem" name="modalthem" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</button>
                </div>
			</div>
            <div class="tab-content">
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Tên sách</th>
                            <th class="text-center">Tác giả</th>
                            <th class="text-center">Loại sách</th>
                            <th class="text-center">Thể loại</th>
                            <th class="text-center">Năm XB</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        @if(!empty($sach))
                        @foreach($sach as $s)
                            <tr>
                                <td class="text-center" style="text-transform: uppercase;">{{$s->MaSach}}</td>
                                <td class="text-center">
                                    <img src="@if($s->Image !== NULL)/public/upload/sach/{{$s->Image}} @else /public/upload/sach/book_default.jpg @endif" style="width: 67px; height: 96px; border: 1px solid #ddd;" alt="">
                                </td>
                                <td class="">{{$s->TenSach}}</td>
                                <td class="">{{words($s->TacGia,5,'...')}}</td>
                                <td class="text-center">{{$s->TenLoaiSach}}</td>
                                <td class="text-center">{{$s->TenTheLoai}}</td>
                                <td class="text-center">{{$s->XuatBan}}</td>
                                <td class="text-center">
                                    <a href="jvascript:void(0" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10 capnhat" data-target='#myModal' data-toggle='modal' data-value="{{$s->id}}"></i> </a>
                                    <a href="jvascript:void(0)"><i class="fa fa-close text-danger model_img" data-value="{{$s->id}}"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                    @if(isset($sach))
                        {{$sach->appends(Request::except('page'))->links()}}
                    @endif
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
                <h4 class="modal-title" id="myModalLabel">Thêm đầu sách mới</h4> 
            </div>
            <form method="post" action="manage/sach/postInsert" id="form-modal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <input type="hidden" name="idSach" id="idSach" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên sách</label>
                                <input type="text" name="TenSach" value="" id="TenSach" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Loại sách</label>
                                <select name="loaisach" id="loaisach" class="form-control">
                                    <option value="">--Chọn loại sách--</option>
                                    @foreach($loaisach as $ls1)
                                    <option value="{{$ls1->id}}">{{$ls1->TenLoaiSach}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                 <label for="">Số lượng</label>
                                 <input type="number" name="Soluong" min="1" id="SoLuong" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhà XB</label>
                                <select name="nxb" id="nxb" class="form-control">
                                    <option value="">--Chọn nhà xuất bản--</option>
                                    @foreach($nxb as $xb)
                                    <option value="{{$xb->id}}">{{$xb->TenNXB}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="txtImage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tác giả</label>
                                <input type="text" name="TacGia" value="" id="TacGia" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select name="theloai" id="theloai" class="form-control">
                                    <option value="">--Chọn thể loại--</option>
                                    @foreach($theloai as $tl1)
                                    <option value="{{$tl1->id}}">{{$tl1->TenTheLoai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Năm xuất bản</label>
                                <input type="text" name="XuatBan" id="XuatBan" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea name="GhiChu" id="GhiChu" cols="30" rows="5" class="form-control"></textarea>
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
    
    $(document).ready(function(){
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
            $('#update').attr('id','save');
            $('#idSach').val("");
            $('#form-modal').attr('action','manage/sach/postInsert');
        });
    });
    $(document).on('click','.model_img',function(){
        var id = $(this).data('value');
        swal({
            title: "Đồng ý xóa?",
            text: "Trong tủ sách sẽ mất đầu sách này!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý!",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'manage/ajax/sach_delete?id='+id,
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

    $(document).on('click','.capnhat',function(){
        $('#save').attr('id','update');
        $('#idSach').val($(this).data('value'));
        $('#form-modal').attr('action','manage/sach/postUpdate');
        $.ajax({
            url: 'manage/ajax/sach_id?id='+$(this).data('value'),
            type: 'get',
            success:function(response){
                var array = JSON.parse(response);
                $('#TenSach').val(array['TenSach']);
                $('#TacGia').val(array['TacGia']);
                $('#loaisach').val(array['idLoaiSach']);
                $('#theloai').val(array['idTheLoaiSach']);
                $('#SoLuong').val(array['SoLuong']);
                $('#nxb').val(array['idNXB']);
                $('#XuatBan').val(array['XuatBan']);
                $('#GhiChu').html(array['GhiChu']);
            }
        });
    });
</script>
@endsection