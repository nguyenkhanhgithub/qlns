@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách kết quả</h3>
                        <p class="text-muted">Kết quả</p>
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
                            <th>Tên Kết quả</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($ketqua_id)){{"manage/ketqua/postUpdate/"}}{{$ketqua_id->MaKetQua}}@else{{"manage/ketqua/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr>
                                <td width="20%">
                                    @if(isset($ketqua_id))
                                        <input type="text" class="form-control" value="{{$ketqua_id->MaKetQua}}" name="txtMaKetQua" readonly>
                                    @endif
                                </td>
                                <td width="40%">
                                    <input type="text" value="@if(isset($ketqua_id)){{$ketqua_id->TenKetQua}}@endif" class="form-control" name="txtTenKetQua">
                                </td>
                                <td width="20%"><button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button></td>
                            </tr>
                        </form>
                        @foreach($ketqua as $kq)
                            <tr>
                                <td>{{$kq->MaKetQua}}</td>
                                <td>{{$kq->TenKetQua}}</td>
                                <td>
                                    <a href="manage/ketqua/getUpdate/{{ $kq->MaKetQua }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($kq->KQNam == NULL)
                                        <a href="manage/ketqua/getDelete/{{ $kq->MaKetQua }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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