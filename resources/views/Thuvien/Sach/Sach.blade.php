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
                      @include('Thuvien.sach.ajaxSachPaginate')
                </div>
            </div>
	   </div>
	</div>
</div>
<!-- modal thêm, sửa sách -->
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
<!-- modal thêm chương -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Thêm chương truyện</h4>
            </div>
            <form method="post" action="" id="modal_c" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <input type="hidden" name="idSach_c" id="idSach_c" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên sách</label>
                                <input type="text" name="TenSach_c" value="" id="TenSach_c" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Chương</label>
                                <input type="number" name="SoChuong" min="1" id="SoChuong" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Giới thiệu</label>
                                <textarea name="GioiThieu" id="GioiThieu" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea name="NoiDung" id="NoiDung" cols="30" rows="2" class="form-control ckeditor"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal" id="saveChuong" value="">Lưu thông tin</button>
                    <button type="button" class="btn btn-info waves-effect dong" data-dismiss="modal">Close</button>
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
						CKEDITOR.instances.NoiDung.setData("");
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

		$(document).ready(function() {
			$(document).on('click', '.pagination a', function (e) {
					getPosts($(this).attr('href').split('page=')[1]);
					e.preventDefault();
			});
		});

		function getPosts(page) {
			$.ajax({
					url : 'manage/sach/index?page=' + page,
					dataType: 'json',
			}).done(function (data) {
					$('.table-responsive').html(data);
			});
		}

		$(document).on('click','.themchuong',function(){
			var id = $(this).data('value');
      $('#idSach_c').val(id);
			$.ajax({
					url: 'manage/ajax/sach_id?id='+id,
					type: 'get',
					success:function(response){
							var array = JSON.parse(response);
							$('#TenSach_c').val(array['TenSach']);

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

		$(document).on('click','#saveChuong',function(){
			$.ajax({
				url: 'manage/ajax/postChuong',
				type:'post',
				data:{
					'idSach_c': $('#idSach_c').val(),
					'SoChuong' : $('#SoChuong').val(),
					'GioiThieu': $('#GioiThieu').val(),
					'NoiDung': CKEDITOR.instances.NoiDung.getData()
				},
				beforeSend: function (xhr) {
						var token = $('input[name="_token"]').val();

						if (token) {
								return xhr.setRequestHeader('X-CSRF-TOKEN', token);
						}
				},
				success:function(){
					toast('Cập nhật thành công.','#ff6849','info');
				}
			});
		});
</script>
@endsection
