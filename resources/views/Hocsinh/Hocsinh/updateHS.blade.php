@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="white-box">
                <h3 class="box-title m-b-0">Cập nhật mã học sinh {{ $hocsinh->MaHocSinh}}</h3>
                <p class="text-muted m-b-30 font-13">Học sinh {{ $hocsinh->TenHocSinh}}</p>
                @if(count($errors) > 0)
                    {{alert_dimiss($errors)}}
                @endif
                @if(session('notification'))
                    {{ notifications('success',session('notification')) }}
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="manage/hocsinh/postUpdate/{{ $hocsinh->MaHocSinh }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_Token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã Học Sinh</label>
                                <input type="text" class="form-control" id="" placeholder="Nhập tên lớp" value="{{$hocsinh->MaHocSinh}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input type="text" class="form-control" id="" name="txtHoTen" placeholder="Nhập họ tên" value="{{$hocsinh->HoTen}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sinh</label>
                                <input type="text" name="txtNgaySinh" value="{{$hocsinh->NgaySinh}}" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="form-group">
                                <label for="">Giới tính</label>&nbsp;&nbsp;
                                <label class="radio-inline">
                                  <input type="radio" name="rdGioiTinh" id="" @if($hocsinh->GioiTinh === 1) {{ "Checked" }} @endif value="1"> Nam
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="rdGioiTinh" id="" @if($hocsinh->GioiTinh === 0) {{ "Checked" }} @endif value="0"> Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Dân tộc</label>
                                        <select name="txtDanToc" id="" class="form-control">
                                            <option value="">--Chọn dân tộc--</option>
                                            @foreach($dantoc as $dt)
                                            <option value="{{ $dt->MaDanToc }}" @if($hocsinh->MaDanToc == $dt->MaDanToc) {{"Selected"}} @endif>{{ $dt->TenDanToc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Tôn giáo</label>
                                        <select name="txtTonGiao" id="" class="form-control">
                                            <option value="">--Chọn tôn giáo--</option>
                                            @foreach($tongiao as $tg)
                                            <option value="{{ $tg->MaTonGiao }}" @if($hocsinh->MaTonGiao == $tg->MaTonGiao) {{"Selected"}} @endif>{{ $tg->TenTonGiao }}</option>
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
                                            <input type="text" class="form-control" name="txtHoTenCha" value="{{ $hocsinh->HoTenCha }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nghề nghiệp cha</label>
                                            <select name="txtNNCha" class="form-control" id="">
                                                <option value="">--Chọn nghề nghiệp</option>
                                                @foreach($ngheN as $n)
                                                <option value="{{ $n->MaNghe }}" @if($hocsinh->MaNNghiepCha == $n->MaNghe) {{"Selected"}} @endif>{{ $n->TenNghe }}</option>
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
                                            <input type="text" class="form-control" name="txtHoTenMe" value="{{ $hocsinh->HoTenMe }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nghề nghiệp mẹ</label>
                                            <select name="txtNNMe" class="form-control" id="">
                                                <option value="">--Chọn nghề nghiệp</option>
                                                @foreach($ngheN as $n)
                                                <option value="{{ $n->MaNghe }}" @if($hocsinh->MaNNghiepMe == $n->MaNghe) {{"Selected"}} @endif>{{ $n->TenNghe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Cập nhật</button>
                            <a href="manage/hocsinh/index" class="btn btn-inverse waves-effect waves-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection