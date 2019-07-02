<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <!--Bootstrap Main-->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/bootstrap.min.css">
  <!-- CSS Main -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/AdminLTE.min.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/font-awesome/css/font-awesome.min.css">
  <!-- Fonts chữ -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/fonts/font-time.css">
  <!--  -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/_all-skins.min.css">
  <link rel="shortcut icon" href="{{url('/')}}/backend/images/logo.jpg">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{route('admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b>CE</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">VN BAKERY</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a class="dropdown-item" href="{{ route('logout') }}">
                {{ __('Đăng xuất') }}
              </a>
            </li>
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{url('/')}}/backend/images/user3-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{!!Auth::user()->name!!}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Đang truy cập</a>
          </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><b style="color:white">QUẢN LÝ DANH MỤC</b></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-picture-o"></i>
              <span>Banner</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('banner')}}"><i class="fa fa-dashboard "></i> Danh sách Banner</a></li>
              <li><a href="{{route('them-banner')}}"><i class="fa fa-circle-o"></i> Thêm Banner</a></li>

            </ul>
          </li>
          {{--quản lý banner--}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-list-ul"></i>
              <span>Danh mục</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('danh-muc')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
              <li><a href="{{route('them-danh-muc')}}"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>

            </ul>
          </li>
          {{--quản lý danh sách--}}
          <li class="treeview">
            <a href="{{route('san-pham')}}">
              <i class="fa fa-table"></i>
              <span>Sản phẩm</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('san-pham')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
              <li><a href="{{route('them-san-pham')}}"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>

            </ul>
          </li>
          {{--quản lý sản phẩm--}}
          <li class="treeview">
            <a href="danh-sach-video">
              <i class="fa  fa-youtube"></i>
              <span>Video sản phẩm</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('danh-sach-video')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
              <li><a href="{{route('them-video')}}"><i class="fa fa-circle-o"></i> Thêm Video </a></li>

            </ul>
          </li>
          {{--quan ly video san pham--}}
          <li class="treeview">
            <a href="post.index">
              <i class="fa fa-bullhorn"></i>
              <span>Tin Tức</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('tin-tuc')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
              <li><a href="{{route('them-tin-tuc')}}"><i class="fa fa-circle-o"></i> Cập nhật tin tức </a></li>
              

            </ul>
          </li>
          {{--quản lý tin tức--}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Người dùng</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('tai-khoan')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
              <li><a href="{{route('them-tai-khoan')}}"><i class="fa  fa-user-plus"></i>Thêm người dùng </a></li>

            </ul>
          </li>

          {{--quản lý người dùng--}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Quản lý đơn hàng</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('don-hang')}}"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>

            </ul>
          </li>

          {{--quản lý hình ảnh--}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Quản lý hình ảnh</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="@@photogalleryactive"><a href="laravel-filemanager?type=image"><i class="zmdi zmdi-image"></i>
                    Thư viện</a>
            </li>

            </ul>
          </li>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 style=" font-family:Times New Roman, Times, serif;">
         Trang quản trị
       </h1>

     </section>

     <!-- Main content -->

     @yield('backend')

     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>Design by Sói!</strong>
  </footer>
  <!-- jQuery 3 -->
  <script type="text/javascript" src="{{url('/')}}/backend/js/jquery.min.js"></script>

  <script type="text/javascript" src="{{url('/')}}/backend/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="{{url('/')}}/backend/js/adminlte.min.js"></script>

  <script type="text/javascript" src="{{url('/')}}/backend/js/fastclick.js"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  @yield('script')
</body>
</html>
