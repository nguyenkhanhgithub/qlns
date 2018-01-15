@foreach ($doctruyen as $dc)
<center>
  <h2>Chương {{$dc->Chuong}}: </h2>
</center>
{!!$dc->Noidung!!}
@endforeach
<center>
  {!!$doctruyen->appends(Request::except('page'))->render()!!}
</center>
