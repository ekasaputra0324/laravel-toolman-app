<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/smk.png" />
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="../assets-admin/images/favicon.png"> --}}
    <link rel="stylesheet" href="../assets-admin/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets-admin/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../assets-admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../assets-admin/css/style.css" rel="stylesheet">
    <link href="../assets-admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="../assets-admin/images/logo.png" alt="" >
                <img class="logo-compact" src="../assets-admin/images/logo-text.png" alt="" >
                <img class="brand-title" src="../assets-admin/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        @include('partials-admin.navbar')
        <!--**********************************
            Sidebar start
        ***********************************-->
       @include('partials-admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
           @yield('page-admin')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('partials-admin.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../assets-admin/vendor/global/global.min.js"></script>
    <script src="../assets-admin/js/quixnav-init.js"></script>
    <script src="../assets-admin/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="../assets-admin/vendor/raphael/raphael.min.js"></script>
    <script src="../assets-admin/vendor/morris/morris.min.js"></script>


    <script src="../assets-admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets-admin/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="../assets-admin/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="../assets-admin/vendor/flot/jquery.flot.js"></script>
    <script src="../assets-admin/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="../assets-admin/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="../assets-admin/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="../assets-admin/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="../assets-admin/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="../assets-admin/vendor/global/global.min.js"></script>
    <script src="../assets-admin/js/quixnav-init.js"></script>
    <script src="../assets-admin/js/custom.min.js"></script>

    {{-- sweet alaert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script  src="../assets-admin/js/peminjaman.js" ></script>
    <!-- Datatable -->
    <script src="../assets-admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets-admin/js/plugins-init/datatables.init.js"></script>

    <script src="../assets-admin/js/dashboard/dashboard-1.js"></script>

</body>

</html>
