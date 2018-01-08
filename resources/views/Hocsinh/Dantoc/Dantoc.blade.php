@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách dân tộc</h3>
                        <p class="text-muted">Dân tộc</p>
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
                            <th>Tên dân tộc</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        <form action="@if(isset($dantoc_id)){{"manage/dantoc/postUpdate/"}}{{$dantoc_id->MaDanToc}} @else {{"manage/dantoc/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr >
                                <td>
                                    @if(isset($dantoc_id))
                                        <input type="text" readonly value="{{$dantoc_id->MaDanToc}}" class="form-control">
                                    @endif
                                </td>
                                <td><input type="text" class="form-control" name="txtTenDanToc" value="@if(isset($dantoc_id)){{$dantoc_id->TenDanToc}}@endif"></td>
                                <td width="15%">
                                    <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($dantoc as $dt)
                            <tr>
                                <td>{{ $dt->MaDanToc }} </td>
                                <td>{{ $dt->TenDanToc }}</td>
                                <td class="text-nowrap center">
                                    <a href="manage/dantoc/getUpdate/{{ $dt->MaDanToc }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                    @if($dt->HSDT == NULL) 
                                    <a href="manage/dantoc/getDelete/{{ $dt->MaDanToc }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$dantoc->links()}}
                </div>
                <div class="row">
                </div>
            </div>
        </div>
    </div>
@endsection

