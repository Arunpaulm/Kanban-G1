<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kanban</title>
    <link rel="icon" type="image/png" href="{{ asset('img/wmx_fav.png') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icheck-bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @yield('style')
    @livewireStyles

    <style>
        .custom-loader {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background:
                radial-gradient(farthest-side,#dd7326 94%,#0000) top/8px 8px no-repeat,
                conic-gradient(#0000 30%,#dd7326);
            -webkit-mask: radial-gradient(farthest-side,#0000 calc(100% - 8px),#000 0);
            animation:s3 1s infinite linear;
        }
        @keyframes s3{
            100%{transform: rotate(1turn)}
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <div class="custom-loader"></div>
    </div>

    @include('layout.nav')

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('layout.logo')

        <!-- Sidebar -->
        @include('layout.admin-sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        @include('layout.content-header')
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->

        {{-- @include('admin.partials.header')--}}
    </div>

    @include('layout.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/notiflix-aio-3.2.6.min.js') }}"></script>
@include('layout.partials.notiflix')
<script src="{{ asset('assets/js/custom.js') }}"></script>


<script>
    $(function () {

        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        bsCustomFileInput.init();
    });
</script>

@yield('script')
@livewireScripts
@stack('livewire-scripts')
</body>
</html>

