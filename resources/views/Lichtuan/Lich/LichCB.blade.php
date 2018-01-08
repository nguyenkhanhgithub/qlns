@extends('layouts.master')
@section('content')
<div class="row">
	<!-- Left sidebar -->
	<div class="col-md-12">
		<div class="white-box">
            <!-- row -->
			<div class="row">
				<div class="col-sm-6">
			      	<h3 class="box-title">Lịch giảng dạy giáo viên</h3>
			      	<p class="text-muted">Tuần</p>
				</div>
				<div class="col-sm-6">
					<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</a>
				</div>
            </div>
            <input type="hidden" name="max_date" value="{{$max_date->id}}">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="tuan" id="tuan" class="form-control">
                            <option value="">--Chọn tuần--</option>
                            @foreach($tuanhoc as $th2)
                            <option value="{{$th2->id}}">Từ {{date("d/m/Y", strtotime($th2->BatDau))}} đến {{date("d/m/Y", strtotime($th2->KetThuc))}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table table-bordered table-striped color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tiết học</th>
                            @foreach($thu as $t)
                            <th class="text-center">{{$t->TenThu}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
        </div>
	</div>
</div>
 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Thêm lịch cán bộ</h4> 
            </div>
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Thứ</label>
                                <select name="idThu" id="idThu" class="form-control">
                                    <option value="">--Chọn thứ--</option>
                                    @foreach($thu as $t2)
                                    <option value="{{$t2->id}}">{{$t2->TenThu}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Môn học</label>
                                <select name="MaMonHoc" id="MaMonHoc" class="form-control">
                                    <option value="">--Chọn môn học--</option>
                                    @foreach($monhoc as $mh)
                                    <option value="{{$mh->MaMonHoc}}">{{$mh->TenMonHoc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Giáo viên</label>
                                <select name="MaGiaoVien" id="MaGiaoVien" class="form-control">
                                    <option value="">--Chọn giáo viên--</option>
                                    @foreach($giaovien as $gv)
                                    <option value="{{$gv->MaGiaoVien}}">{{$gv->TenGiaoVien}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Lớp học</label>
                                <select name="MaLop" id="MaLop" class="form-control">
                                    <option value="">--Chọn lớp học--</option>
                                    @foreach($lop as $l)
                                    <option value="{{$l->MaLop}}">{{$l->TenLop}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tiết học</label>
                                <select name="idTiet" id="idTiet" class="form-control">
                                    <option value="">--Chọn tiết học--</option>
                                    @foreach($tiethoc as $th)
                                    <option value="{{$th->id}}">{{$th->TenTiet}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Buổi học</label>
                                <div class="radio-list">
                                    <label class="radio-inline p-0">
                                        <div class="radio radio-info">
                                            <input type="radio" name="trangthai" id="sang" value="sang" checked>
                                            <label for="radio1">Sáng</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline">
                                        <div class="radio radio-success">
                                            <input type="radio" name="trangthai" id="chieu" value="chieu">
                                            <label for="radio2">Chiều </label>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tuần học</label>
                                <select name="idTuan" id="idTuan" class="form-control">
                                    <option value="">--Chọn tuần--</option>
                                    @foreach($tuanhoc as $th)
                                    <option value="{{$th->id}}">Từ {{date("d/m/Y", strtotime($th->BatDau))}} đến {{date("d/m/Y", strtotime($th->KetThuc))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" id="save" value="" data-dismiss="modal">Lưu thông tin</button>
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
            $('#capnhat').val();
            $('#capnhat').attr('id','save');
        });
    });
    $('#tuan').val($('input[name="max_date"]').val());
    lichchung($('input[name="max_date"]').val());
    $(document).on('change','#tuan',function(){
        lichchung($(this).val());
    });
   
    function lichchung($idTuan){
        $.ajax({
            url: 'manage/ajax/lichchung?idTuan='+$idTuan,
            type: 'get',
            success:function(response){
                $('#listtable').html(response);
            }
        });
    }
    $(document).on('click','#save',function(){
        $.ajax({
            url: 'manage/ajax/themlich',
            type: 'post',
            beforeSend: function (xhr) {
                var token = $('input[name="_token"]').val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                'idThu': $('#idThu').val(),
                'idTiet' : $('#idTiet').val(),
                'MaMonHoc': $('#MaMonHoc').val(),
                'TrangThai': $('input[type="radio"]:checked').val(),
                'MaGiaoVien': $('#MaGiaoVien').val(),
                'idTuan': $('#idTuan').val(),
                'MaLop' : $('#MaLop').val()
            },
            success:function(response){
                if(response === true){
                    toast('Thêm thành công!','#ff6849','info');
                    lichchung($('input[name="max_date"]').val());
                }else{
                   toast('Có lỗi xảy ra!','#ff6849','warning');
                }
            }
        });
    });

    $(document).on('click','.sua',function(){
        $('#save').attr('id','capnhat');
        var idThu = $(this).data('value');
        $('#capnhat').val(idThu);
        $.ajax({
            url: 'manage/ajax/lichsuaid?idLich='+idThu,
            type: 'get',
            success:function(response){
                var array = JSON.parse(response);
                $('#idThu').val(array['idThu']);
                $('#idTiet').val(array['idTiet']);
                $('#MaMonHoc').val(array['MaMonHoc']);
                $('#MaGiaoVien').val(array['MaGiaoVien']);
                $('#idTuan').val(array['idTuan']);
                $('#MaLop').val(array['MaLop']);
                if(array['TrangThai'] === 'chieu'){
                    $('#chieu').attr('checked', true);
                }else{
                    $('#sang').attr('checked', true);
                }
                $('#capnhat').attr('value',array['id']);
            }
        });
    });
    $(document).on('click','#capnhat',function(){
        $.ajax({
            url: 'manage/ajax/sualichid?idLich='+$(this).val(),
            type: 'post',
            beforeSend: function (xhr) {
                var token = $('input[name="_token"]').val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                'idThu': $('#idThu').val(),
                'idTiet' : $('#idTiet').val(),
                'MaMonHoc': $('#MaMonHoc').val(),
                'TrangThai': $('input[type="radio"]:checked').val(),
                'MaGiaoVien': $('#MaGiaoVien').val(),
                'idTuan': $('#idTuan').val(),
                'MaLop' : $('#MaLop').val()
            },
            success:function(response){
                if(response === 1){
                    toast('Cập nhật thành công!','#ff6849','info');
                    lichchung($('input[name="max_date"]').val());
                }else{
                   toast('Có lỗi xảy ra!','#ff6849','warning');
                }
            }
        });
    });
    $(document).on('click','.model_img',function(e){
        var id = $(this).attr('id');
        swal({
            title: "Bạn muốn xóa lịch?",
            text: "Nếu xóa lịch sẽ ảnh hưởng đến lịch học của học sinh!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý!",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'manage/ajax/xoalichid?id='+id,
                    type: 'get',
                    success:function(response){
                        var array = JSON.parse(response);
                        if(array['status'] === 'success'){
                            swal("Thành công!", "Lịch đã được xóa.", "success");
                            lichchung($('input[name="max_date"]').val());
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
@section('style')
<style>
    hr{
        margin: 5px auto !important;
    }
</style>
@endsection
