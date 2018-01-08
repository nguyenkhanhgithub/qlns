<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also --><b>
                <!--This is dark logo icon--><img src="public/back-end/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="public/back-end/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
             </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                <!--This is dark logo text--><img src="public/back-end/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="public/back-end/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
             </span> </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"> <i class="mdi mdi-gmail"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li>
                        <div class="drop-title">You have 4 new messages</div>
                    </li>
                    <li>
                        <div class="message-center">
                           
                        </div>
                    </li>
                    <li>
                        <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- .Task dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"> <i class="mdi mdi-check-circle"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                    <li>
                        <a href="javascript:void(0)">
                            <div>
                                <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)">
                            <div>
                                <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)">
                            <div>
                                <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)">
                            <div>
                                <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="javascript:void(0)"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
            </li>
            <!-- .Megamenu -->
            <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"><span class="hidden-xs">Mega</span> <i class="icon-options-vertical"></i></a>
                <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Forms Elements</li>
                            <li><a href="form-basic.html">Basic Forms</a></li>
                            <li><a href="form-layout.html">Form Layout</a></li>
                            <li><a href="form-advanced.html">Form Addons</a></li>
                            <li><a href="form-material-elements.html">Form Material</a></li>
                            <li><a href="form-float-input.html">Form Float Input</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-mask.html">Form Mask</a></li>
                            <li><a href="form-img-cropper.html">Image Cropping</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Advance Forms</li>
                            <li><a href="form-dropzone.html">File Dropzone</a></li>
                            <li><a href="form-pickers.html">Form-pickers</a></li>
                            <li><a href="form-wizard.html">Form-wizards</a></li>
                            <li><a href="form-typehead.html">Typehead</a></li>
                            <li><a href="form-xeditable.html">X-editable</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                            <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Table Example</li>
                            <li><a href="basic-table.html">Basic Tables</a></li>
                            <li><a href="table-layouts.html">Table Layouts</a></li>
                            <li><a href="data-table.html">Data Table</a></li>
                            <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                            <li><a href="responsive-tables.html">Responsive Tables</a></li>
                            <li><a href="editable-tables.html">Editable Tables</a></li>
                            <li><a href="foo-tables.html">FooTables</a></li>
                            <li><a href="jsgrid.html">JsGrid Tables</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Charts</li>
                            <li> <a href="flot.html">Flot Charts</a> </li>
                            <li><a href="morris-chart.html">Morris Chart</a></li>
                            <li><a href="chart-js.html">Chart-js</a></li>
                            <li><a href="peity-chart.html">Peity Charts</a></li>
                            <li><a href="knob-chart.html">Knob Charts</a></li>
                            <li><a href="sparkline-chart.html">Sparkline charts</a></li>
                            <li><a href="extra-charts.html">Extra Charts</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /.Megamenu -->
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                    <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
            </li>
            @if(Auth::check())
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)"> <img src="public/back-end/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ words(Auth::user()->name,1,'') }}</b><span class="caret"></span> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="public/back-end/plugins/images/users/varun.jpg" alt="user" /></div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="user/profile/{{ Auth::user()->id }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="user/profile.html"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            @endif
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="javascript:void(0)" class="waves-effect"><img src="public/back-end/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Steve Gection<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                    <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                    <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-inverse pull-right">4</span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html"><i class=" fa-fw">1</i><span class="hide-menu">Dashboard 1</span></a> </li>
                    <li> <a href="index2.html"><i class=" fa-fw">2</i><span class="hide-menu">Dashboard 2</span></a> </li>
                    <li> <a href="index3.html"><i class=" fa-fw">3</i><span class="hide-menu">Dashboard 3</span></a> </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect "><i class="mdi mdi-content-copy fa-fw"></i> <span class="hide-menu">Quản lý đào tạo<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right">30</span></span></a>
                <ul class="nav nav-second-level one-li">
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Lớp - Khối Lớp</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/lop/index"><i class="fa-fw">B</i> <span class="hide-menu">Lớp Học</span></a></li>
                            <li> <a href="manage/khoilop/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Khối Lớp</span></a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-lock fa-fw"></i><span class="hide-menu">Năm Học</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="manage/hocky/index"><i class="fa-fw">L</i> <span class="hide-menu">Học Kỳ</span></a></li>
                            <li><a href="manage/nam/index"><i class="fa-fw">L</i> <span class="hide-menu">Năm Học</span></a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i class="icon-bulb fa-fw"></i> <span class="hide-menu">Môn Học<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/mon/index"><i class="fa-fw">F</i><span class="hide-menu">Môn Học</span></a> </li>
                            <li> <a href="manage/diem/index"><i class="fa-fw">T</i><span class="hide-menu">Điểm</span></a> </li>
                        </ul>
                    </li>
                    
                    <li> <a href="javascript:void(0)" class="waves-effect"><i class="icon-bulb fa-fw"></i> <span class="hide-menu">Kết quả<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/ketqua/index"><i class="fa-fw">F</i><span class="hide-menu">Kết quả</span></a> </li>
                            <li> <a href="manage/hocluc/index"><i class="fa-fw">T</i><span class="hide-menu">Học lực</span></a> </li>
                            <li> <a href="manage/hanhkiem/index"><i class="fa-fw">T</i><span class="hide-menu">Hạnh kiểm</span></a> </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-info-alt fa-fw"></i><span class="hide-menu">Học sinh</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="manage/hocsinh/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Học sinh</span></a></li>
                            <li><a href="manage/phanlop/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Phân lớp</span></a></li>
                            <li><a href="manage/dantoc/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Dân tộc</span></a></li>
                            <li><a href="manage/tongiao/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Tôn giáo</span></a></li>
                            <li><a href="manage/nghenghiep/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Nghề nghiệp</span></a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-info-alt fa-fw"></i><span class="hide-menu">Giáo viên</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="manage/giaovien/index"><i class="ti-info-alt fa-fw"></i> <span class="hide-menu">Giáo viên</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect "><i class="mdi mdi-content-copy fa-fw"></i> <span class="hide-menu">Thống kê<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right">30</span></span></a>
                <ul class="nav nav-second-level one-li">
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Kết quả học kỳ</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                             <li> <a href="manage/hklh/index"><i class="fa-fw">B</i> <span class="hide-menu">KQ học kỳ theo lớp học</span></a></li> 
                            <li> <a href="manage/hkmh/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">KQ học kỳ theo môn học</span></a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Kết quả năm học</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                             <li> <a href="manage/cnlh/index"><i class="fa-fw">B</i> <span class="hide-menu">KQ năm học theo lớp học</span></a></li> 
                            <li> <a href="manage/cnmh/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">KQ năm học theo môn học</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect "><i class="mdi mdi-content-copy fa-fw"></i> <span class="hide-menu">Lịch<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right">30</span></span></a>
                <ul class="nav nav-second-level one-li">
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Lịch</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/lich/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Lịch sự kiện</span></a></li>
                            <li><a href="manage/lichcanbo/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Lịch cán bộ</span></a></li>
                            <li> <a href="manage/lichlop/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Lịch học lớp</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-email fa-fw"></i> <span class="hide-menu">Tin nhắn<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">9</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="basic-table.html"><i class="fa-fw">B</i><span class="hide-menu">Hộp tin nhắn</span></a></li>
                    <li><a href="table-layouts.html"><i class="fa-fw">L</i><span class="hide-menu">Gửi tin nhắn</span></a></li><ul class="nav nav-second-level one-li">
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Biên soạn</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/tinnhan/quantri"><i class="fa-fw">B</i> <span class="hide-menu">Tới quản trị viên</span></a></li> 
                            <li> <a href="manage/tinnhan/canbo"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Tới Cán bộ</span></a></li>
                            <li> <a href="manage/tinnhan/hocsinh"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Tới Học sinh</span></a></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </li>
            
            <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-email fa-fw"></i> <span class="hide-menu">Quản lý thư viện<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">9</span></span></a>
                <ul class="nav nav-second-level">
                    {{--  <li><a href="basic-table.html"><i class="fa-fw">B</i><span class="hide-menu">Danh mục sách</span></a></li>
                    <li><a href="table-layouts.html"><i class="fa-fw">L</i><span class="hide-menu">Gửi tin nhắn</span></a></li><ul class="nav nav-second-level one-li">  --}}
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Danh mục</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="manage/sach/index"><i class="fa-fw">B</i> <span class="hide-menu">Đầu sách</span></a></li> 
                            <li> <a href="manage/muonsach/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Mượn sách</span></a></li>
                            <li> <a href="manage/trasach/index"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Trả sách</span></a></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->