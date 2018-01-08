@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách năm học</h3>
                        <p class="text-muted">Năm học</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                            {{notifications('success',session('notification')) }}
                        @endif
                        @if(session('notifi'))
                            {{notifications('danger',session('notifi')) }}
                        @endif
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
                            <th>Tên năm học</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($namhoc_id)){{"manage/nam/postUpdate/"}}{{$namhoc_id->MaNamHoc}}@else{{"manage/nam/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr>
                                <td width="20%">
                                    @if(isset($namhoc_id))
                                        <input type="text" class="form-control" value="{{$namhoc_id->MaNamHoc}}" readonly>
                                    @endif
                                </td>
                                <td width="60%">
                                    <div class="col-sm-5">
                                        <input type="text" value="@if(isset($namhoc_id)) {{substr($namhoc_id->TenNamHoc,0,4)}} @endif" class="form-control" name="txtNambatdau">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" value="@if(isset($namhoc_id)) {{substr($namhoc_id->TenNamHoc,6,5)}} @endif" class="form-control" name="txtNamketthuc">
                                    </div>
                                </td>
                                <td width="20%"><button type="submit" class="fcbtn btn btn-info btn-outline btn-1f pull-right">{{$btn}}</button></td>
                            </tr>
                        </form>
                        @foreach($namhoc as $nh)
                            <tr>
                                <td>{{$nh->MaNamHoc}}</td>
                                <td>{{$nh->TenNamHoc}}</td>
                                <td>
                                    <a href="manage/nam/getUpdate/{{ $nh->MaNamHoc }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($nh->MaLopNam == NULL)
                                        <a href="manage/nam/getDelete/{{ $nh->MaNamHoc }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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
