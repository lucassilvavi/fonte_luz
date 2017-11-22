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

    <link href="{{asset('public/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    {{--<!-- Font Awesome -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{--<!-- Data Tables -->--}}
    <link href="{{asset('public/assets/vendor/datatables/media/css/dataTables.foundation.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}"
          rel="stylesheet">

    {{--<!-- Metis Menu -->--}}
    <link href="{{asset('public/assets/vendor/metisMenu/dist/metisMenu.min.js')}}" rel="stylesheet">
    {{--<!-- Animate CSS -->--}}
    <link href="{{asset('public/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    {{--<!-- Bootstrap Datepicker -->--}}
    <link href="{{asset('public/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}"
          rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

<!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("public/admin-lte/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("public/admin-lte/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("public/admin-lte/dist/css/skins/skin-blue.min.css") }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

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
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
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
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
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

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(\App\Http\Controllers\Facade\FotoAtiva::getFoto())
                                <img src="{{ asset("/fotos/".\App\Http\Controllers\Facade\FotoAtiva::getFoto()[0]->ds_endereco_foto) }}"
                                     class="user-image" alt="User Image">
                            @else
                                <img src=""
                                     class="img-circle" alt="User Image">
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::user()->no_nome}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(\App\Http\Controllers\Facade\FotoAtiva::getFoto())
                                    <img src="{{ asset("/fotos/".\App\Http\Controllers\Facade\FotoAtiva::getFoto()[0]->ds_endereco_foto) }}"
                                         class="img-circle" alt="User Image">
                                @else
                                    <img src=""
                                         class="img-circle" alt="User Image">
                                @endif
                                <p>
                                    {{Auth::user()->no_nome}}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/perfil" class="btn btn-default btn-flat">Meu Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                       class="btn btn-default btn-flat">Sair</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

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
                        <img src=""
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
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
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
<script src="{{asset('public/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/metisMenu/dist/metisMenu.min.js')}}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
{{--<!-- Toastr - Notificações -->--}}
{{--<script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>--}}
<!-- Data Tables -->
<script src="{{asset('public/assets/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTableDefaults.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/pdfmake/build/pdfmake.js')}}"></script>
<script src="{{asset('public/assets/vendor/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('public/assets/vendor/jszip/dist/jszip.min.js')}}"></script>
<!-- Bootstrap Datepicker -->
<script src="{{asset('public/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/assets/js/datepickerDefaults.js')}}"></script>
<!-- jQuery Mask Plugin -->
<script src="{{asset('public/assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
<script src="{{ asset("public/admin-lte/dist/js/app.min.js") }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

@section('scripts')

@show

{!! Toastr::message() !!}

</body>

</html>