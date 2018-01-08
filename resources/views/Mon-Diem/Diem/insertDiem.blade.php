@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="white-box">
                <h3 class="box-title m-b-0">Thêm điểm</h3>
                <p class="text-muted">Học sinh: {{$hocsinh[0]->HoTen}}</p>
                @if(count($errors) > 0)
                   {{alert_dimiss($errors)}}
                @endif
                @if(session('notification') == "danger")
                    {{ notifications("danger","Học sinh đã có điểm này.") }}
                @elseif(session('notification') == "success")
                    {{ notifications("success","Thêm điểm thành công.") }}
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="manage/diem/postInsert/{{$hocsinh[0]->MaHocSinh}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_Token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã Học Sinh</label>
                                <input type="text" class="form-control" id="" name="txtMaHocSinh" readonly placeholder="" value="{{$hocsinh[0]->MaHocSinh}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input type="text" class="form-control" id="" name="txtHoTen" readonly placeholder="" value="{{$hocsinh[0]->HoTen}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lớp Học</label>
                                <input type="hidden" name="txtMaLop" class="form-control" value="{{$hocsinh[0]->MaLop}}">
                                <input type="text" name="txtTenLop" class="form-control" value="{{$hocsinh[0]->TenLop}}" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="exampleInputPassword1">Năm Học</label>
                                        <select name="txtNamhoc" class="form-control" id="">
                                            <option value="">--Chọn năm học--</option>
                                            @foreach($namhoc as $nh)
                                                <option value="{{$nh->MaNamHoc}}">{{$nh->TenNamHoc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputPassword1">Học Kỳ</label>
                                        <select name="txtHocky" class="form-control" id="">
                                            <option value="">--Chọn học kỳ--</option>
                                            @foreach($hocky as $hk)
                                                <option value="{{$hk->MaHocKy}}">{{$hk->TenHocKy}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputPassword1">Loại Điểm</label>
                                        <select name="txtLoaiDiem" class="form-control" id="">
                                            <option value="">--Chọn loại điểm--</option>
                                            @foreach($loaidiem as $ld)
                                                <option value="{{$ld->MaLoai}}">{{$ld->TenLoai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="exampleInputPassword1">Môn Học</label>
                                        <select name="txtMonhoc" class="form-control" id="">
                                            <option value="">--Chọn môn học--</option>
                                            @foreach($monhoc as $mh)
                                                <option value="{{$mh->MaMonHoc}}">{{$mh->TenMonHoc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputPassword1">Điểm</label>
                                        <input type="number" value="" name="txtDiem" class="form-control text-center" min="1" max="10">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm mới</button>
                            <a href="{{URL::previous()}}" class="btn btn-inverse waves-effect waves-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

