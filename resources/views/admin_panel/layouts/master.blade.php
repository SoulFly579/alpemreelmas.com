<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("admin_panel/")}}/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/plugins/plugins.css">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/helper.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset("admin_panel")}}/css/style.css">
    @yield("css")
</head>

<body class="skin-dark">

<div class="main-wrapper">

    @include("admin_panel.layouts.header")
    @include("admin_panel.layouts.sidebar")

    <!-- Content Body Start -->
        <div class="content-body">

        @yield("body")

    </div><!-- Content Body End -->
    @include("admin_panel.layouts.footer")
</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
<script src="{{asset("admin_panel")}}/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset("admin_panel")}}/js/vendor/jquery-3.3.1.min.js"></script>
<script src="{{asset("admin_panel")}}/js/vendor/popper.min.js"></script>
<script src="{{asset("admin_panel")}}/js/vendor/bootstrap.min.js"></script>
<!--Plugins JS-->
<script src="{{asset("admin_panel")}}/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/tippy4.min.js.js"></script>
<!--Main JS-->
<script src="{{asset("admin_panel")}}/js/main.js"></script>

<!-- Plugins & Activation JS For Only This Page -->

<!--Moment-->
<script src="{{asset("admin_panel")}}/js/plugins/moment/moment.min.js"></script>

<!--Daterange Picker-->
<script src="{{asset("admin_panel")}}/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/daterangepicker/daterangepicker.active.js"></script>

<!--Echarts-->
<script src="{{asset("admin_panel")}}/js/plugins/chartjs/Chart.min.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/chartjs/chartjs.active.js"></script>

<!--VMap-->
<script src="{{asset("admin_panel")}}/js/plugins/vmap/jquery.vmap.min.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/vmap/maps/jquery.vmap.world.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js"></script>
<script src="{{asset("admin_panel")}}/js/plugins/vmap/vmap.active.js"></script>
@yield("js")
</body>

</html>
