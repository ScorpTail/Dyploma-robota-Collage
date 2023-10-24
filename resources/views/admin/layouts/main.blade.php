<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кабінет адміна</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    @vite([
    "resources/js/plugins/select2/css/select2.min.css",
    "resources/js/plugins/fontawesome-free/css/all.min.css",
    "resources/js/plugins/summernote/summernote-bs4.min.css",
    "resources/js/dist/css/adminlte.min.css",
    "resources/js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
    "resources/js/plugins/daterangepicker/daterangepicker.css",
    "resources/sass/app.scss",
    "resources/sass/tools.scss",
    "resources/sass/reset.scss",
    "resources/sass/lightbox.scss",
    ])
    @livewireStyles
</head>
@include("admin.includes.alert")
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="col-12 d-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav gap-5">
                <li class="nav-item">
                    <a href="{{ route("user.main.index") }}" class="btn btn-outline-primary">Назад</a>
                </li>
                <li class="nav-item">
                    <form action="{{route("user.logout.index")}}" method="POST">
                        @csrf
                        <input class="btn btn-outline-danger" type="submit" value="Вийти">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            @include("admin.includes.sidebar")
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield("content")
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@vite([
    "resources/js/plugins/jquery/jquery.min.js",
    "resources/js/plugins/jquery-ui/jquery-ui.min.js",
    "resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js",
   // "resources/js/plugins/moment/moment.min.js",
   // "resources/js/plugins/daterangepicker/daterangepicker.js",
    "resources/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
    "resources/js/dist/js/adminlte.js",
    "resources/js/plugins/summernote/summernote-bs4.min.js",
    "resources/js/plugins/bs-custom-file-input/bs-custom-file-input.min.js",
    "resources/js/plugins/select2/js/select2.full.min.js",
    "resources/js/plugins/tools.js",
    "resources/js/plugins/lightbox.js",
    ])
@livewireScripts
</body>
</html>
