<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='language' content='pt-br'/>
    <meta name='country' content='Brazil'/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>@yield('title')</title>

    <!-- Bootstrap -->

    <link href="{{asset('/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    {{--<!-- Font Awesome -->--}}
    <link href="{{asset('/assets/vendor/Font-Awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    {{--<!-- Data Tables -->--}}
    <link href="{{asset('/assets/vendor/datatables/media/css/dataTables.foundation.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}"
          rel="stylesheet">

    {{--<!-- Metis Menu -->--}}
    <link href="{{asset('/assets/vendor/metisMenu/dist/metisMenu.min.js')}}" rel="stylesheet">
    {{--<!-- Animate CSS -->--}}
    <link href="{{asset('/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    {{--<!-- Bootstrap Datepicker -->--}}
    <link href="{{asset('/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}"
          rel="stylesheet">

    <link href="{{asset('/assets/vendor/datatables.net/css/buttons.dataTables.min.css')}}" rel="stylesheet">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css") }}">
    <link href="{{asset('/assets/vendor/toastr/toastr.min.css')}}" rel="stylesheet">
    @section('style')

    @show
    <style>
        .central {
            margin-left: 2em;
            margin-right: 2em;
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>F</b>DL</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Fonte de </b>Luz</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">


                        <ul class="dropdown-menu">

                        <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">

                                            <!-- User Image -->
                                            @if(\App\Http\Controllers\Facade\FotoAtiva::getFoto())
                                                <img src="{{ asset("/fotos/".\App\Http\Controllers\Facade\FotoAtiva::getFoto()[0]->ds_endereco_foto) }}"
                                                     class="img-circle" alt="User Image">
                                            @else
                                                <img src=""
                                                     class="img-circle" alt="User Image">
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                            <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if(\App\Http\Controllers\Facade\FotoAtiva::getFoto())
                        <img src="{{ asset("/fotos/".\App\Http\Controllers\Facade\FotoAtiva::getFoto()[0]->ds_endereco_foto) }}"
                             class="img-circle" alt="User Image">
                    @else
                        <img src="/fotos/newPerson.jpg"
                             class="img-circle" alt="User Image">
                    @endif

                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->no_nome}}</p>
                    <!-- Status -->
                </div>
            </div>
            <hr>
            <!-- Sidebar Menu -->
        @include('layouts.menu')
        <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header central">
            @yield('content')
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
        </div>
        <!-- Default to the left -->

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- /#wrapper -->

<!-- scripts -->
<script src="{{asset('/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/vendor/metisMenu/dist/metisMenu.min.js')}}"></script>
<script src="{{asset('/assets/vendor/jquery/dist/jquery.form.js')}}"></script>
{{--<!-- Toastr - Notificações -->--}}
<script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
<!-- Data Tables -->
<script src="{{asset('/assets/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/dataTableDefaults.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/assets/vendor/pdfmake/build/pdfmake.js')}}"></script>
<script src="{{asset('/assets/vendor/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('/assets/vendor/jszip/dist/jszip.min.js')}}"></script>
<!-- Bootstrap Datepicker -->
<script src="{{asset('/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/assets/js/datepickerDefaults.js')}}"></script>
<!-- jQuery Mask Plugin -->
<script src="{{asset('/assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
<script src="{{ asset("/admin-lte/dist/js/app.min.js") }}"></script>
<script src="{{asset('/assets/vendor/toastr/toastr.min.js')}}"></script>
@section('scripts')

@show

{!! Toastr::message() !!}

</body>

</html>