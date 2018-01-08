@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-offset-1" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách giáo viên</h3>
                        <p class="text-muted">Giáo viên</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    @if(session('notification'))
                        {{ notifications('success',session('notification')) }}
                    @endif
                    </div>
                    <div class="col-sm-12">
                        @if(count($errors) > 0)
                            {{alert_dimiss($errors)}}
                        @endif
                    </div>
                </div>
                <div class="">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên giáo viên</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Chuyên môn</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                            <form action="@if(isset($giaovien_id)){{"manage/giaovien/postUpdate/"}}{{$giaovien_id->MaGiaoVien}} @else {{"manage/giaovien/postInsert"}} @endif" method="post">
                                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                                <tr >
                                    <td>
                                        @if(isset($giaovien_id))
                                            <input type="text" readonly value="{{$giaovien_id->MaGiaoVien}}" class="form-control">
                                        @endif
                                    </td>
                                    <td><input type="text" class="form-control" name="txtTenGiaoVien" value="@if(isset($giaovien_id)){{$giaovien_id->TenGiaoVien}}@endif"></td>
                                    <td><input type="text" class="form-control" name="txtDiaChi" value="@if(isset($giaovien_id)){{$giaovien_id->DiaChi}}@endif"></td>
                                    <td><input type="text" class="form-control" name="txtDienThoai" value="@if(isset($giaovien_id)){{$giaovien_id->DienThoai}}@endif"></td>
                                    <td>
                                        <select name="txtMaMon" id="" class="form-control">
                                            <option>--Chọn chuyên môn--</option>
                                            @foreach($monhoc as $mh)
                                                <option value="{{$mh->MaMonHoc}}" @if(isset($giaovien_id) && ($giaovien_id->MaMonHoc === $mh->MaMonHoc)) {{"selected"}} @endif>{{$mh->TenMonHoc}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td width="17%">
                                        <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button>
                                        @if(isset($giaovien_id))
                                        <a href="manage/giaovien/index" class="fcbtn btn btn-warning btn-outline btn-1f">Hủy</a>
                                        @endif
                                    </td>
                                </tr>
                            </form>
                            @foreach($giaovien as $gv)
                                <tr>
                                    <td>{{$gv->MaGiaoVien}}</td>
                                    <td>
                                        <span class="mytooltip tooltip-effect-1"> 
                                            <a href="manage/giaovien/getUpdate/{{$gv->MaGiaoVien}}"><span class="tooltip-item2">{{$gv->TenGiaoVien}}</span></a>
                                            <span class="tooltip-content4 clearfix"> 
                                                <span class="tooltip-text2">
                                                    <strong>Môn giảng dạy</strong>
                                                    <legend style="margin-top: 10px;"></legend>
                                                    @foreach($giaovien_mon as $gvm)
                                                        @if($gvm->MaGiaoVien === $gv->MaGiaoVien)
                                                            <p><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;{{$gvm->TenMonHoc}}</p>
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </span>
                                        </span>        
                                    </td>
                                    <td>{{$gv->DiaChi}}</td>
                                    <td>{{$gv->DienThoai}}</td>
                                    <td>
                                        <select name="txtMaMon" id="" class="form-control" disabled>
                                            <option>--Chọn chuyên môn--</option>
                                            @foreach($monhoc as $mh)
                                            <option value="{{$mh->MaMonHoc}}" @if($gv->MaMonHoc === $mh->MaMonHoc) {{"selected"}} @endif>{{$mh->TenMonHoc}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    
                                    <td class="text-nowrap center">
                                        <a href="manage/giaovien/getUpdate/{{ $gv->MaGiaoVien}}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                        <a href="manage/phancong/pcgiaovien/{{$gv->MaGiaoVien}}" data-toggle="tooltip" data-original-title="Phân công dạy học"><i class="fa fa-bars m-r-10"></i></a>
                                        @if($gv->GVPC === NULL && $gv->GVCN === NULL)
                                            <a href="manage/giaovien/getDelete/{{ $gv->MaGiaoVien }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
@endsection
