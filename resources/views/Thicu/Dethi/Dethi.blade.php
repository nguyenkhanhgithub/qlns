@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="white-box">
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                <label for="">Môn học</label>
                <select class='form-control select2' name="MaMonHoc">
                  <option value="">--Chọn môn học--</option>
                  @foreach ($monhoc as $key => $value)
                    <option value="{{$value->MaMonHoc}}">{{$value->TenMonHoc}}</option>
                  @endforeach
                </select>
              </div>
          </div>
        </div>
        <div class="row row-in">
            <div class="col-lg-3 col-sm-6">
              <ul class="col-in">
                  <li class="text-center">
                      <span>Câu 1</span>
                  </li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <ul class="col-in">
                  <li class="text-center">
                      <span>Câu 1</span>
                  </li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <ul class="col-in">
                  <li class="text-center">
                      <span>Câu 1</span>
                  </li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <ul class="col-in">
                  <li class="text-center">
                      <span>Câu 1</span>
                  </li>
              </ul>
            </div>
          {{-- </div> --}}
        </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="white-box">

    </div>
  </div>
</div>
@endsection
<style media="screen">
   .row-in .col-in li{
     height: 40px;
     padding-top:10px;
     width: 100%;
     background: #2cabe3;
   }
   .row-in .col-in li span{
     color: white;
     font-weight: bold;
   }
</style>
