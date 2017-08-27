<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Possobelenzo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{URL::asset('admin/plugins/datepicker/datepicker3.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Select 2 -->
  <link rel="stylesheet" href="{{URL::asset('admin/plugins/select2/select2.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('admin/dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('css/box.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{URL::asset('admin/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/plugins/datatables/dataTables.fontAwesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/datatables/responsive.dataTables.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{URL::asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">Administrator</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{URL::asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                  <p>
                    Administrator
                    
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <form method="POST" action="/logout">
                      {{ csrf_field() }}
                      <button href="/logout" type="submit" class="btn btn-default btn-flat">Sign out</button>
                      
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{URL::asset('Admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Administrator</p>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

          @include('admin/sidebar-menu')
          
        </ul>

      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     

      <!-- Main content -->
      <section class="content">
      @yield('dashboard')
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">@yield('box-title')</h3>
          </div>
          <div class="box-body">
            <ol class="breadcrumb" id="breadcrumbs">
              @yield('breadcrumbs')
            </ol>
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>Success!</h4>
                {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-ban"></i>Error!</h4>
                {{!! session('error') !!}}
                </div>
            @endif
            @if(session('warning'))
                <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-ban"></i>Reminder!</h4>
                {!! session('warning') !!}
                {{session()->forget('warning')}}
                </div>
            @endif
            @yield('box-body')
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            @yield('box-footer')
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /.wrapper -->
  <script src="{{URL::asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

  <!-- Bootstrap 3.3.6 -->
  <script src="{{URL::asset('admin/plugins/select2/select2.full.min.js')}}"></script>
  <script src="{{URL::asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('admin/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{URL::asset('admin/plugins/fastclick/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{URL::asset('admin/dist/js/app.min.js')}}"></script>
  <script src="{{URL::asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <!-- bootstrap datepicker -->
  <script src="{{URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
 
   
  <script>

    $(document).ready(function() {
      $('#dataTable').DataTable({
          "paging": true,
            
            "ordering": true,
            "info": true,
            "autoWidth": true,
      });

      $(".select2").select2(); 
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      });
      $(".textarea").wysihtml5();
    });
  </script>
</body>
</html>