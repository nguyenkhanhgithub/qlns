@extends('layouts.master')
@section('content')

  <div class="row">
  	<div class="col-sm-12">
  	   <div class="white-box">
            <div class="tab-content">
                <div class="table-responsive" style="text-align: justify;">
                      @include('Thuvien.Docsach.ajaxNoidung')
                </div>
            </div>
  	   </div>
  	</div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
/* hàm lấy id trên url*/
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
  };
	$(document).ready(function() {
			$(document).on('click', '.pagination a', function (e) {
          var idParameter = getUrlParameter('id');
					getPosts(idParameter,$(this).attr('href').split('page=')[1]);
					e.preventDefault();
			});
	});
  /* thay đổi url ko sử load lại trang */
  function ChangeUrl(page, url) {
      if (typeof (history.pushState) != "undefined") {
          var obj = { Page: page, Url: url };
          history.pushState(obj, obj.Page, obj.Url);
      } else {
          alert("Browser does not support HTML5.");
      }
  }
	function getPosts(id,page) {
    var url = 'manage/doctruyen/index?id='+id+'&page=' + page;
			$.ajax({
					url : url,
					dataType: 'json',
			}).done(function (data) {
					$('.table-responsive').html(data);
          ChangeUrl('Page1', url);
			});
	}
</script>
@endsection
