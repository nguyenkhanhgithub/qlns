@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-offset-3" >
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách tôn giáo</h3>
                        <p class="text-muted">Tôn giáo</p>
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
                        <form action="@if(isset($tongiao_id)){{"manage/tongiao/postUpdate/"}}{{$tongiao_id->MaTonGiao}} @else {{"manage/tongiao/postInsert"}} @endif" method="post">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <tr >
                                <td>
                                    @if(isset($tongiao_id))
                                        <input type="text" readonly value="{{$tongiao_id->MaTonGiao}}" class="form-control">
                                    @endif
                                </td>
                                <td><input type="text" class="form-control" name="txtTenTonGiao" value="@if(isset($tongiao_id)){{$tongiao_id->TenTonGiao}}@endif"></td>
                                <td width="15%">
                                    <button type="submit" class="fcbtn btn btn-info btn-outline btn-1f">{{$btn}}</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($tongiao as $tg)
                            <tr>
                                <td>{{ $tg->MaTonGiao }}</td>
                                <td>{{ $tg->TenTonGiao }}</td>
                                <td class="text-nowrap center">
                                    <a href="manage/tongiao/getUpdate/{{ $tg->MaTonGiao }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                    @if($tg->HSTG == NULL) 
                                    <a href="manage/tongiao/getDelete/{{ $tg->MaTonGiao }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$tongiao->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

