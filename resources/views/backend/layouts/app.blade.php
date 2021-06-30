<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Butler Logistics Limited </title>
    <link rel="apple-touch-icon" href="/backend/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/backend/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/material-vendors.min.css">

    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/core/menu/menu-types/material-vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/hospital.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu material-vertical-layout material-layout 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('backend.layouts.navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include('backend.layouts.sidenav')

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
   @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    @include('backend.layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/backend/app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/backend/app-assets/vendors/js/charts/chart.min.js"></script>

    <script src="/backend/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/buttons.flash.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/jszip.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/pdfmake.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/vfs_fonts.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/buttons.html5.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/buttons.print.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/backend/app-assets/js/core/app-menu.js"></script>
    <script src="/backend/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/backend/app-assets/js/scripts/pages/material-app.js"></script>
    <script src="/backend/app-assets/js/scripts/pages/appointment.js"></script>
    <script src="/backend/app-assets/js/scripts/tables/datatables/datatable-advanced.js"></script>

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
