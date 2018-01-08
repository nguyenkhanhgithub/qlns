@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách học kỳ</h3>
                        <p class="text-muted">Học kỳ</p>
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
                            <th>Tên học kỳ</th>
                            <th>Hệ số</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($hocky_id)){{"manage/hocky/postUpdate/"}}{{$hocky_id->MaHocKy}}@else{{"manage/hocky/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr>
                                <td width="20%">
                                    @if(isset($hocky_id))
                                        <input type="text" class="form-control" value="{{$hocky_id->MaHocKy}}" name="txtMaHocKy" readonly>
                                    @endif
                                </td>
                                <td width="40%">
                                    <input type="text" value="@if(isset($hocky_id)){{$hocky_id->TenHocKy}}@endif" class="form-control" name="txtTenHocKy">
                                </td>
                                <td width="20%"><input type="number" value="@if(isset($hocky_id)){{$hocky_id->HeSo}}@endif" class="form-control" name="txtHeSo"></td>
                                <td width="20%"><button type="submit" class="fcbtn btn btn-info btn-outline btn-1f pull-right">{{$btn}}</button></td>
                            </tr>
                        </form>
                        @foreach($hocky as $hk)
                            <tr>
                                <td>{{$hk->MaHocKy}}</td>
                                <td>{{$hk->TenHocKy}}</td>
                                <td>{{$hk->HeSo}}</td>
                                <td>
                                    <a href="manage/hocky/getUpdate/{{ $hk->MaHocKy }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($hk->MaDiemHK == NULL)
                                        <a href="manage/hocky/getDelete/{{ $hk->MaHocKy }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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
