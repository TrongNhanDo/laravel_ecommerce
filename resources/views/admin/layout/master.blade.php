<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('admintitle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/admin.css')}}">
  <link rel="icon" href="{{asset('temp/images/logo.png')}}" type="image/gif" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('admin.layout.header')
@include('admin.layout.mainsidebar')

<div class="content-wrapper">
  @yield('admincontainer')
</div>

@include('admin.layout.controlsidebar')
@include('admin.layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- adminlteLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
