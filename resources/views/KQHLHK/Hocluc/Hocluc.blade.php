@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách học lực</h3>
                        <p class="text-muted">Học lực</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                            {{notifications('success',session('notification')) }}
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
                            <th>Tên học lực</th>
                            <th>Cận dưới</th>
                            <th>Cận trên</th>
                            <th>Khống chế</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($hocluc_id)){{"manage/hocluc/postUpdate/"}}{{$hocluc_id->MaHocLuc}}@else{{"manage/hocluc/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr>
                                <td width="">
                                    @if(isset($hocluc_id))
                                        <input type="text" class="form-control" value="{{$hocluc_id->MaHocLuc}}" name="txtMaHocLuc" readonly>
                                    @endif
                                </td>
                                <td width="">
                                    <input type="text" value="@if(isset($hocluc_id)){{$hocluc_id->TenHocLuc}}@endif" class="form-control" name="txtTenHocLuc">
                                </td>
                                <td>
                                    <input type="text" value="@if(isset($hocluc_id)){{$hocluc_id->DiemCanDuoi}}@endif" min="1" class="form-control" name="txtCanDuoi">
                                </td>
                                <td>
                                    <input type="text" value="@if(isset($hocluc_id)){{$hocluc_id->DiemCanTren}}@endif" min="1" class="form-control" name="txtCanTren">
                                </td>
                                <td>
                                    <input type="text" value="@if(isset($hocluc_id)){{$hocluc_id->DiemKhongChe}}@endif" min="1" class="form-control" name="txtKhongChe">
                                </td>
                                <td width=""><button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button></td>
                            </tr>
                        </form>
                        @foreach($hocluc as $hl)
                            <tr>
                                <td>{{$hl->MaHocLuc}}</td>
                                <td>{{$hl->TenHocLuc}}</td>
                                <td>{{$hl->DiemCanDuoi}}</td>
                                <td>{{$hl->DiemCanTren}}</td>
                                <td>{{$hl->DiemKhongChe}}</td>
                                <td>
                                    <a href="manage/hocluc/getUpdate/{{ $hl->MaHocLuc }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($hl->HLNam == NULL || $hl->HLKy)
                                        <a href="manage/hocluc/getDelete/{{ $hl->MaHocLuc }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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
