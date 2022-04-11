<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>@yield('title')</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="temp/css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="temp/css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="temp/css/responsive.css">
        <!-- fevicon -->
        <link rel="icon" href="temp/images/logo.png" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="temp/css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <!-- body -->
    <body class="main-layout">
        <!-- header -->
        @include('dashboard.layout.header')
        <!-- main container -->
        <div style="min-height: 205px;">
            @yield('container')
        </div>
        <!--  footer -->
         @include('dashboard.layout.footer')

        <!-- Javascript files-->
        <script src="temp/js/jquery.min.js"></script>
        <script src="temp/js/popper.min.js"></script>
        <script src="temp/js/bootstrap.bundle.min.js"></script>
        <script src="temp/js/jquery-3.0.0.min.js"></script>
        <!-- sidebar -->
        <script src="temp/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="temp/js/custom.js"></script>
    </body>
</html>
