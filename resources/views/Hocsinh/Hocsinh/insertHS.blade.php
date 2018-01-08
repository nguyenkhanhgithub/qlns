@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="white-box">
                <h3 class="box-title m-b-0">Thêm mới học sinh</h3>
                <p class="text-muted m-b-30 font-13"></p>
                @if(count($errors) > 0)
                    {{alert_dimiss($errors)}}
                @endif
                @if(session('notification'))
                    {{ notifications('success',session('notification')) }}
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="manage/hocsinh/postInsert" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_Token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input type="text" class="form-control" id="" name="txtHoTen" placeholder="Nhập họ tên" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sinh</label>
                                <input type="text" name="txtNgaySinh" value="" class="form-control" placeholder="Nhập ngày sinh" placeholder="Ngày sinh">
                            </div>
                            <div class="form-group">
                                <label for="">Giới tính</label>&nbsp;&nbsp;
                                <label class="radio-inline">
                                  <input type="radio" name="rdGioiTinh" checked="" id="" value="1"> Nam
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="rdGioiTinh" id="" value="0"> Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Dân tộc</label>
                                        <select name="txtDanToc" id="" class="form-control">
                                            <option value="">--Chọn dân tộc--</option>
                                            @foreach($dantoc as $dt)
                                            <option value="{{ $dt->MaDanToc }}">{{ $dt->TenDanToc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Tôn giáo</label>
                                        <select name="txtTonGiao" id="" class="form-control">
                                            <option value="">--Chọn tôn giáo--</option>
                                            @foreach($tongiao as $tg)
                                            <option value="{{ $tg->MaTonGiao }}" >{{ $tg->TenTonGiao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Họ tên cha</label>
                                            <input type="text" class="form-control" name="txtHoTenCha" value="" placeholder="Họ tên cha">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nghề nghiệp cha</label>
                                            <select name="txtNNCha" class="form-control" id="">
                                                <option value="">--Chọn nghề nghiệp</option>
                                                @foreach($ngheN as $n)
                                                <option value="{{ $n->MaNghe }}" >{{ $n->TenNghe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Họ tên mẹ</label>
                                            <input type="text" class="form-control" name="txtHoTenMe" value="" placeholder="Họ tên mẹ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nghề nghiệp mẹ</label>
                                            <select name="txtNNMe" class="form-control" id="">
                                                <option value="">--Chọn nghề nghiệp</option>
                                                @foreach($ngheN as $n)
                                                <option value="{{ $n->MaNghe }}">{{ $n->TenNghe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm mới</button>
                            <a href="manage/hocsinh/index" class="btn btn-inverse waves-effect waves-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection