@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách nghề nghiệp</h3>
                        <p class="text-muted">Nghề nghiệp</p>
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
                            <th>Tên nghề nghiệp</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($nghe_id)){{"manage/nghenghiep/postUpdate/"}}{{$nghe_id->MaNghe}} @else {{"manage/nghenghiep/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr >
                                <td>
                                    @if(isset($nghe_id))
                                        <input type="text" readonly value="{{$nghe_id->MaNghe}}" class="form-control">
                                    @endif
                                </td>
                                <td><input type="text" class="form-control" name="txtTenNghe" value="@if(isset($nghe_id)){{$nghe_id->TenNghe}}@endif"></td>
                                <td width="15%">
                                    <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($nghe as $n)
                            <tr>
                                <td>{{ $n->MaNghe}}</td>
                                <td>{{ $n->TenNghe}}</td>
                                <td class="text-nowrap center">
                                    <a href="manage/nghenghiep/getUpdate/{{ $n->MaNghe}}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
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
