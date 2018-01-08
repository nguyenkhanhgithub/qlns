@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12" id="danhsach">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Danh sách học sinh</h3>
                        <p class="text-muted">Học sinh</p>
                    </div>
                    <div class="col-sm-6">
                        <a href="manage/hocsinh/getInsert" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Thêm mới</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if(session('notification'))
                            {{ notifications('success',session('notification')) }}
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table color-bordered-table info-bordered-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Dân tộc</th>
                            <th>Tôn giáo</th>
                            <th>Họ tên cha</th>
                            <th>Nghề nghiệp cha</th>
                            <th>Họ tên mẹ</th>
                            <th>Nghề nghiệp mẹ</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody id="listtable">
                        @foreach($hocsinh as $hs)
                            <tr>
                                <td>{{ $hs->MaHocSinh}}</td>
                                <td>{{ $hs->HoTen}}</td>
                                <td>{{ $hs->NgaySinh }}</td>
                                <td>
                                    @if($hs->GioiTinh === 0)
                                        {{"Nữ"}}
                                    @else
                                        {{"Nam"}}
                                    @endif
                                </td>
                                <td>{{ $hs->TenDanToc }}</td>
                                <td>{{ $hs->TenTonGiao }}</td>
                                <td>{{ $hs->HoTenCha }}</td>
                                @foreach($ngheN as $n)
                                    @if($n->MaNghe === $hs->MaNNghiepCha)
                                        <td>{{$n->TenNghe}}</td>
                                    @endif
                                @endforeach
                                <td>{{$hs->HoTenMe}}</td>
                                @foreach($ngheN as $n)
                                    @if($n->MaNghe === $hs->MaNNghiepMe)
                                        <td>{{$n->TenNghe}}</td>
                                    @endif
                                @endforeach
                                <td class="text-nowrap center">
                                    <a href="manage/hocsinh/getUpdate/{{ $hs->MaHocSinh }}" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    @if($hs->MaHSPL == NULL)
                                        <a href="manage/hocsinh/getDelete/{{ $hs->MaHocSinh }}" class="model_img" id="sa-warning" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $hocsinh->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection