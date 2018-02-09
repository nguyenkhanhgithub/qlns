@extends('layouts.master')
@section('content')
<div class="row">
  <form action="" method="post">
    <input type="hidden" value="{{csrf_Token()}}" name="_token">
    <div class="col-sm-4">
      <div class="white-box">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Môn học</label>
                  <select class='form-control select2' name="MaMonHoc" id="MaMonHoc">
                    <option value="">--Chọn môn học--</option>
                    @foreach ($monhoc as $key => $value)
                      <option value="{{$value->MaMonHoc}}">{{$value->TenMonHoc}}</option>
                    @endforeach
                  </select>
                </div>
                <input type="hidden" name="hMaMonHoc" value="">
            </div>
          </div>
          <div class="row row-in">
            <a href="javascript:void(0)" class="themCauhoi">
              <div class="col-lg-3 col-sm-6">
                <ul class="col-in">
                  <li class="text-center">
                    <span>+</span>
                  </li>
                </ul>
              </div>
            </a>
          </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="white-box">
        <div class="row" style="margin-bottom: 15px;">
          <div class="col-sm-12">
            <div class="form-group">
              <button type="button" id="capnhat" class="fcbtn btn btn-info btn-outline btn-1f pull-right">Cập nhật</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="input-group bootstrap-touchspin">
                  <span class="input-group-addon bootstrap-touchspin-prefix">Câu hỏi</span><input id="Cauhoi" readonly="" type="text" class="form-control" name="Cauhoi" value="" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" style="display: block;">
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="form">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="" style="font-weight: bold; color: red;font-style: italic;">Đáp án:&nbsp;</label><span class="da_ch" style="font-weight: bold;"> </span>
              <input type="hidden" id="hidden_id" value="">
            </div>
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon beautiful">
                      <input type="radio" name="dapan" disabled="" value="A" id="A">
                  </span>
                  <span class="input-group-addon beautiful">
                      A
                  </span>
                  <input type="text" class="form-control" id="dapanA" name="dapanA" readonly="" id="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon beautiful">
                      <input type="radio" name="dapan"  disabled="" value="B" id="B">
                  </span>
                  <span class="input-group-addon beautiful">
                      B
                  </span>
                  <input type="text" class="form-control" id="dapanB" name="dapanB" readonly="" id="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon beautiful">
                      <input type="radio" name="dapan" disabled="" value="C" id="C">
                  </span>
                  <span class="input-group-addon beautiful">
                      C
                  </span>
                  <input type="text" class="form-control" id="dapanC" name="dapanC" readonly="" id="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon beautiful">
                      <input type="radio" name="dapan" disabled="" value="D" id="D">
                  </span>
                  <span class="input-group-addon beautiful">
                      D
                  </span>
                  <input type="text" class="form-control" id="dapanD" name="dapanD" readonly="" id="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
<style media="screen">
   .row-in .col-in li{
     height: 40px;
     padding-top:10px;
     width: 100%;
     background: #2cabe3;
   }
   .row-in .col-in{
     width: 100%;
   }
   .row-in .col-in li span{
     color: white;
     font-weight: bold;
   }
   .row-in div{
     margin: 10px auto;
   }
</style>
@section('script')
<script type="text/javascript">

  function getCauhoi(id) {

      $.ajax({
        url:'manage/ajax/tracnghiem?MaMonHoc='+id,
        type: 'get',
        success:function(response){
          var array = JSON.parse(response);
          var len = array.length;
          var html = "";
          for (i = 0; i < len; i++) {
            html+='<a href="javascript:void(0)" class="xemDapan" data-value="'+array[i]['id']+'"><div class="col-lg-3 col-sm-6">';
              html+='<ul class="col-in">';
                  html+='<li class="text-center">';
                      html+='<span>Câu '+(i+1)+'</span>';
                  html+='</li>';
              html+='</ul>';
            html+='</div></a>';
          }
          html+='<a href="javascript:void(0)" class="themCauhoi" data-value=""><div class="col-lg-3 col-sm-6">';
            html+='<ul class="col-in">';
                html+='<li class="text-center">';
                    html+='<span>+</span>';
                html+='</li>';
            html+='</ul>';
          html+='</div></a>';
          $('.row-in').html(html);
        }
      });
  }

  $(document).on('change','#MaMonHoc',function(){
    $('input[name="hMaMonHoc"]').val($(this).val());
    getCauhoi($(this).val());
  });

  function xemDapan(id){
    $.ajax({
      url:'manage/ajax/xemDapan?idCauhoi='+id,
      type: 'get',
      success:function(response){
        var array = JSON.parse(response);
        var len = array.length;
        if(len > 0){
          for (i = 0; i < len; i++) {
            if(array[i]['tl'] == 'A'){
              $('input[name="dapanA"]').val(array[i]['CauTraLoi'])
            }
            if(array[i]['tl'] == 'B'){
              $('input[name="dapanB"]').val(array[i]['CauTraLoi'])
            }
            if(array[i]['tl'] == 'C'){
              $('input[name="dapanC"]').val(array[i]['CauTraLoi'])
            }
            if(array[i]['tl'] == 'D'){
              $('input[name="dapanD"]').val(array[i]['CauTraLoi'])
            }
          }
          $('#Cauhoi').val(array[1]['CauHoi']);
          $('.da_ch').html(array[1]['da']);
          if(array[1]['da']=='A'){
            $('#A').attr('checked',true);
          }else if(array[1]['da']=='B'){
            $('#B').attr('checked',true);
          }else if(array[1]['da']=='C'){
            $('#C').attr('checked',true);
          }else if(array[1]['da']=='D'){
            $('#D').attr('checked',true);
          }
          $('#hidden_id').val(array[1]['id']);
        }else{
          $('#Cauhoi').val('');
          $('input[name="dapanA"]').val('');
          $('input[name="dapanB"]').val('');
          $('input[name="dapanC"]').val('');
          $('input[name="dapanD"]').val('');
        }
      }
    });
  }

  $(document).on('click','.xemDapan',function(){
    xemDapan($(this).data('value'));
  });
  $(document).on('click','.themCauhoi',function(){
    if($('#MaMonHoc').val() !== ''){
      var html="";
      html='<a href="javascript:void(0)" class="xemDapan" data-value=""><div class="col-lg-3 col-sm-6">';
        html+='<ul class="col-in">';
            html+='<li class="text-center">';
                html+='<span>Câu 10</span>';
            html+='</li>';
        html+='</ul>';
      html+='</div></a>';
      $('.row-in').append(html);
    }
  });

  $(document).on('click','#capnhat',function(){
    $('#form').find('input').attr('readonly',false);
    $('#Cauhoi').removeAttr('readonly',false);
    $('#form').find('input').attr('disabled',false);
    $(this).html('Lưu');
    $(this).attr('id','save');
  });

  $(document).on('click','#save',function(){
    
    $('#form').find('input').attr('readonly', true);
    $('#Cauhoi').attr('readonly',true);  
    $('#form').find('input').attr('disabled',true);  
    $(this).html('Cập nhật');
    $(this).attr('id','capnhat');
    var idCH = $('#hidden_id').val();
    $.ajax({
      url: 'manage/ajax/capnhatTN?idCH='+idCH,
      type: 'POST',
      beforeSend: function (xhr) {
          var token = $('input[name="_token"]').val();

          if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
      data:{
        'Cauhoi': $('#Cauhoi').val(),
        'dapanA': $('#dapanA').val(),
        'dapanB': $('#dapanB').val(),
        'dapanC': $('#dapanC').val(),
        'dapanD': $('#dapanD').val(),
        'dapan' : $('.da_ch').html()
      },
      success:function(response){

      }
    });

    xemDapan(idCH);



  });
  $(document).on('click','input[type="radio"]',function(){
    $('.da_ch').html($(this).val());
  });
</script>
@endsection
