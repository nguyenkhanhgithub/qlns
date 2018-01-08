@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-md-offset-2" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách môn học</h3>
                        <p class="text-muted">Môn học</p>
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
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên môn</th>
                            <th>Số tiết</th>
                            <th>Hệ số</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                            <form action="@if(isset($monhoc_id)){{"manage/mon/postUpdate/"}}{{$monhoc_id->MaMonHoc}} @else {{"manage/mon/postInsert"}} @endif" method="post">
                                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                                <tr >
                                    <td>
                                        @if(isset($monhoc_id))
                                            <input type="text" readonly value="{{$monhoc_id->MaMonHoc}}" class="form-control">
                                        @endif
                                    </td>
                                    <td><input type="text" class="form-control" name="txtTenMonHoc" value="@if(isset($monhoc_id)){{$monhoc_id->TenMonHoc}}@endif"></td>
                                    <td><input type="number" class="form-control" name="txtSoTiet" value="@if(isset($monhoc_id)){{$monhoc_id->SoTiet}}@endif" min="30"></td>
                                    <td><input type="number" class="form-control" name="txtHeSo" value="@if(isset($monhoc_id)){{$monhoc_id->HeSo}}@endif" min="1" max="3"></td>
                                    <td width="15%">
                                        <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f pull-right">{{$btn}}</button>
                                    </td>
                                </tr>
                            </form>
                            @foreach($monhoc as $mh)
                                <tr>
                                    <td>{{ $mh->MaMonHoc }}</td>
                                    <td>{{ $mh->TenMonHoc }}</td>
                                    <td>{{$mh->SoTiet}}</td>
                                    <td>{{$mh->HeSo}}</td>
                                    <td class="text-nowrap center">
                                        <a href="manage/mon/getUpdate/{{ $mh->MaMonHoc }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                        @if($mh->MaMonPhanCong == NULL)
                                            <a href="manage/mon/getDelete/{{ $mh->MaMonHoc }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$monhoc->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
    <style>
        .myadmin-alert-top-right{
            display: block;
        }
    </style>
@endsection
