
<table class="table color-bordered-table info-bordered-table"  id="listtable">
    <thead>
        <tr>
            <th class="text-center">Mã sách</th>
            <th class="text-center">Tên sách</th>
            <th class="text-center">Mã Học sinh</th>
            <th class="text-center">Họ tên</th>
            <th class="text-center">Ngày mượn</th>
            <th class="text-center">Ngày trả</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Tác vụ</th>
        </tr>
    </thread>
    <tbody>
        @foreach($muon as $m)
        <tr>
            <td class="text-center" style="text-transform: uppercase;" width="10%">{{$m->MaSach}}</td>
            <td>{{$m->TenSach}}</td>
            <td class="text-center">{{$m->MaHocSinh}}</td>
            <td>{{$m->HoTen}}</td>
            <td class="text-center">{{$m->NgayMuon}}</td>
            <td class="text-center">{{$m->NgayTra}}</td>
            <td class="text-center">
                <form method="post" action="manage/muonsach/updateTT">
                    <input type="hidden" value="{{csrf_Token()}}" name="_token">
                     @if($m->TrangThai === 0)
                        <button type="submit" class="btn btn-danger nut" name="trangthai" value="{{$m->TrangThai}}">Chưa trả</button>
                    @else
                        <button type="submit" class="btn btn-info nut"  name="trangthai" value="{{$m->TrangThai}}">Đã trả</button>
                    @endif
                    <input type="hidden" value="{{$m->muon_id}}" name="muon_id[]">
                </form>
            </td>
            <td class="text-center">
                <a href="jvascript:void(0)"><i class="fa fa-close text-danger model_img" data-value="{{$m->muon_id}}"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $muon->render() !!}
<style>
    .nut{
        border-radius: 20px;
    }
</style>
