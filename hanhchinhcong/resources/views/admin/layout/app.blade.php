<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('asset1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/css/style.css')}}" />
    <script src="{{asset('asset1/js/angular.min.js')}}"></script>
    <script src="{{asset('asset1/js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.layout.nav')

    @include('admin.layout.menu')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    @include('admin.layout.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{asset('asset1/js/jquery.min.js')}}"></script>
<script src="{{asset('asset1/js/jquery-ui.js')}}"></script>
<script src="{{asset('asset1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset1/js/adminlte.min.js')}}"></script>
<script src="{{asset('asset1/js/dashboard.js')}}"></script>
{{-- <script src="{{asset('asset1/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('asset1/tinymce/config.js')}}"></script> --}}
<script src="{{asset('asset1/js/function.js')}}"></script>
</body>
</html>
