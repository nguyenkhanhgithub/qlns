
<table class="table color-bordered-table info-bordered-table"  id="listtable">
    <thead>
    <tr>
        <th class="text-center" width="5%">Mã vạch</th>
        <th class="text-center">Ảnh</th>
        <th class="text-center" width="15%">Tên sách</th>
        <th class="text-center" width="15%">Tác giả</th>
        <th class="text-center">Loại sách</th>
        <th class="text-center">Thể loại</th>
        <th class="text-center">Năm XB</th>
        <th class="text-center">Tác vụ</th>
    </tr>
    </thead>
    <tbody>
      @if(!empty($sach))
      @foreach($sach as $s)
          <tr>
              <td class="text-center" style="text-transform: uppercase;">{{$s->MaSach}}</td>
              <td class="text-center">
                  <img src="@if($s->Image !== NULL)/public/upload/sach/{{$s->Image}} @else /public/upload/sach/book_default.jpg @endif" style="width: 67px; height: 96px; border: 1px solid #ddd;" alt="">
              </td>
              <td class=""><a class="" href="manage/doctruyen/index?id={{$s->id}}">{{$s->TenSach}}</a></td>
              <td class="">{{words($s->TacGia,5,'...')}}</td>
              <td class="text-center">{{$s->TenLoaiSach}}</td>
              <td class="text-center">{{$s->TenTheLoai}}</td>
              <td class="text-center">{{$s->XuatBan}}</td>
              <td class="text-center">
                  <a href="jvascript:void(0" data-toggle="tooltip" data-original-title="Cập nhật"> <i class="fa fa-pencil text-inverse m-r-10 capnhat" data-target='#myModal' data-toggle='modal' data-value="{{$s->id}}"></i> </a>
                  <a href="jvascript:void(0)"><i class="fa fa-close text-danger model_img  m-r-10" data-value="{{$s->id}}"></i></a>
                  <a href="javacscript:void(0)" title="Thêm chương"><i class="fa fa-book themchuong"  data-toggle="modal" data-target=".bs-example-modal-lg" data-value="{{$s->id}}"></i></a>
              </td>
          </tr>
      @endforeach
      @endif
    </tbody>
</table>
{!! $sach->render() !!}
<style>
    .nut{
        border-radius: 20px;
    }
</style>
