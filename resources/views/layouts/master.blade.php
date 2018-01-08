<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="public/back-end/plugins/images/favicon.png">
    <title>Hệ thống quản lý đào tạo học sinh THPT</title>
    <base href="{{ asset('') }}">
    <!-- Bootstrap Core CSS -->
    <link href="public/back-end/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="public/back-end/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="public/back-end/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="public/back-end/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="public/back-end/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    {{--  <link href="public/back-end/plugins/bower_components/calendar/fullcalendar-print.css" rel="stylesheet" />  --}}
    <!--alerts CSS -->
    <link href="public/back-end/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- animation CSS -->
    <link href="public/back-end/css/animate.css" rel="stylesheet">
    
    <!-- Page plugins css -->
    <link href="public/back-end/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="public/back-end/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="public/back-end/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="public/back-end/plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="public/back-end/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/back-end/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="public/back-end/css/colors/megna-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('style')
    <style>
        .myadmin-alert-bottom,
        .myadmin-alert-bottom-left,
        .myadmin-alert-bottom-right,
        .myadmin-alert-fullscreen,
        .myadmin-alert-top,
        .myadmin-alert-top-left,
        .myadmin-alert-top-right{
            display: block;
        }
        .list-left li, .list-right li {
             cursor: pointer;
        }
        .tooltip-content4{
            background: #2B2B2B;
            border-bottom: 40px solid #fb9678;
            width: 260px;
            margin-left: -130px;
            padding: 1em;
        }
        .tooltip-text2{
            margin-bottom: 5px;
        }
        .mytooltip{
            z-index: 99;
        }
        body{
            font-family: Arial !important;
        }
    </style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        @include('layouts.header')
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Dashboard 1</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="active">Dashboard 1</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @yield('content')  
            </div>
            <!-- /.container-fluid -->
        @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="public/back-end/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/back-end/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="public/back-end/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="public/back-end/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="public/back-end/js/waves.js"></script>
    <!-- Sweet-Alert  -->
    <script src="public/back-end/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="public/back-end/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Calendar JavaScript -->
    <script src="public/back-end/plugins/bower_components/calendar/jquery-ui.min.js"></script>
    <script src="public/back-end/plugins/bower_components/moment/moment.js"></script>
    <script src='public/back-end/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
    <script src="public/back-end/plugins/bower_components/calendar/dist/jquery.fullcalendar.js"></script>
    <script src="public/back-end/plugins/bower_components/moment/min/locales.js"></script>
    <script src="public/back-end/plugins/bower_components/calendar/dist/cal-init.js"></script> 
    <!-- Clock Plugin JavaScript -->
    <script src="public/back-end/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="public/back-end/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="public/back-end/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="public/back-end/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="public/back-end/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="public/back-end/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="public/back-end/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="public/back-end/plugins/bower_components/ckeditor/ckeditor.js"></script>

    <script src="public/back-end/plugins/bower_components/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="public/back-end/plugins/bower_components/datatables/dataTables.bootstrap.js"></script>
    <script src="public/back-end/plugins/bower_components/tiny-editable/mindmup-editabletable.js"></script>
    <script src="public/back-end/plugins/bower_components/tiny-editable/numeric-input-example.js"></script>
    <!--Counter js -->
    <script src="public/back-end/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="public/back-end/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="public/back-end/plugins/bower_components/raphael/raphael-min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="public/back-end/js/custom.min.js"></script>
    {{-- <script src="public/back-end/js/dashboard1.js"></script> --}}
    <!-- Custom tab JavaScript -->
    <script src="public/back-end/js/cbpFWTabs.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();

    $(function () {
    var move_right = '<span class="glyphicon glyphicon-minus pull-left  dual-list-move-right" title="Remove Selected"></span>';
    var move_left  = '<span class="glyphicon glyphicon-plus  pull-right dual-list-move-left " title="Add Selected"></span>';

    $(".dual-list.list-left .list-group").sortable({
        stop: function( event, ui ) {
            updateSelectedOptions();
        }
    });


    $('body').on('click', '.list-group .list-group-item', function () {
        $(this).toggleClass('active');
    });


    $('body').on('click', '.dual-list-move-right', function (e) {
        e.preventDefault();

        actives = $(this).parent();
        $(this).parent().find("span").remove();
        $(move_left).clone().appendTo(actives);
        actives.clone().appendTo('.list-right ul').removeClass("active");
        actives.remove();

        sortUnorderedList("dual-list-right");

        updateSelectedOptions();
    });


    $('body').on('click', '.dual-list-move-left', function (e) {
        e.preventDefault();

        actives = $(this).parent();
        $(this).parent().find("span").remove();
        $(move_right).clone().appendTo(actives);
        actives.clone().appendTo('.list-left ul').removeClass("active");
        actives.remove();

        updateSelectedOptions();
    });


    $('.move-right, .move-left').click(function () {
        var $button = $(this), actives = '';
        if ($button.hasClass('move-left')) {
            actives = $('.list-right ul li.active');
            actives.find(".dual-list-move-left").remove();
            actives.append($(move_right).clone());
            actives.clone().appendTo('.list-left ul').removeClass("active");
            actives.remove();

        } else if ($button.hasClass('move-right')) {
            actives = $('.list-left ul li.active');
            actives.find(".dual-list-move-right").remove();
            actives.append($(move_left).clone());
            actives.clone().appendTo('.list-right ul').removeClass("active");
            actives.remove();

        }

        updateSelectedOptions();
    });


    function updateSelectedOptions() {
        $('#dual-list-options').find('option').remove();

        $('.list-left ul li').each(function(idx, opt) {
            $('#dual-list-options').append($("<option></option>")
                .attr("value", $(opt).data("value"))
                .text( $(opt).text())
                .prop("selected", "selected")
            );
        });
    }

        $('.dual-list .selector').click(function () {
            var $checkBox = $(this);
            if (!$checkBox.hasClass('selected')) {
                $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
                $checkBox.removeClass('glyphicon-unchecked').addClass('glyphicon-check');
            } else {
                $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
                $checkBox.removeClass('glyphicon-check').addClass('glyphicon-unchecked');
            }
        });

    $('[name="SearchDualList"]').keyup(function (e) {
        var code = e.keyCode || e.which;
        if (code == '9') return;
        if (code == '27') $(this).val(null);
        var $rows = $(this).closest('.dual-list').find('.list-group li');
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function () {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });


    $(".glyphicon-search").on("click", function() {
        $(this).next("input").focus();
    });


    function sortUnorderedList(ul, sortDescending) {
        $("#" + ul + " li").sort(sort_li).appendTo("#" + ul);

        function sort_li(a, b){
            return ($(b).data('value')) < ($(a).data('value')) ? 1 : -1;
        }
    }
    $("#dual-list-left li").append(move_right);
    $("#dual-list-right li").append(move_left);
});


    </script>
    <script src="public/back-end/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="public/back-end/js/toastr.js"></script>
    <!--Style Switcher -->
    <script src="public/back-end/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
<script>
    function bodauTiengViet(str) {  
        str= str.toLowerCase();  
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
        str= str.replace(/đ/g,"d");  
        return str;  
    }
    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    
    function toast($text,$bg,$icon){
        $.toast({
            heading: 'Thông báo',
            text: $text,
            position: 'top-right',
            loaderBg: $bg,
            icon: $icon,
            hideAfter: 4000,
            stack: 1
        });
    }
</script>
@yield('script')
