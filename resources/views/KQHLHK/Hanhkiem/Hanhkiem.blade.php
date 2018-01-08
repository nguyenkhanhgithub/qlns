@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách hạnh kiểm</h3>
                        <p class="text-muted">Hạnh kiểm</p>
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
                            <th>Tên hạnh kiểm</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($hanhkiem_id)){{"manage/hanhkiem/postUpdate/"}}{{$hanhkiem_id->MaHanhKiem}}@else{{"manage/hanhkiem/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr>
                                <td width="">
                                    @if(isset($hanhkiem_id))
                                        <input type="text" class="form-control" value="{{$hanhkiem_id->MaHanhKiem}}" name="txtMaHocLuc" readonly>
                                    @endif
                                </td>
                                <td width="">
                                    <input type="text" value="@if(isset($hanhkiem_id)){{$hanhkiem_id->TenHanhKiem}}@endif" class="form-control" name="txtTenHanhKiem">
                                </td>
                                <td width=""><button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button></td>
                            </tr>
                        </form>
                        @foreach($hanhkiem as $hk)
                            <tr>
                                <td>{{$hk->MaHanhKiem}}</td>
                                <td>{{$hk->TenHanhKiem}}</td>
                                <td>
                                    <a href="manage/hanhkiem/getUpdate/{{ $hk->MaHanhKiem }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($hk->HKNam == NULL || $hk->HKKy)
                                        <a href="manage/hanhkiem/getDelete/{{ $hk->MaHanhKiem }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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
