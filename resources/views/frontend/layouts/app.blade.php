<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>MCPLUS - {{ $title ?? 'The Biggest Online Tuition' }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/frontend/assets/images/logo/favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="/frontend/assets/css/select2.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="/frontend/assets/css/slick.css">
    <!-- Slick -->
    <link rel="stylesheet" href="/frontend/assets/css/magnific-popup.css">
    <!-- jquery-ui -->
    <link rel="stylesheet" href="/frontend/assets/css/jquery-ui.css">
    <!-- plyr Css -->
    <link rel="stylesheet" href="/frontend/assets/css/plyr.css">
    <!-- animate -->
    <link rel="stylesheet" href="/frontend/assets/css/animate.css">

    <link rel="stylesheet" href="/frontend/assets/css/aos.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/frontend/assets/css/main.css">
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="preloader">
        <img src="/frontend/assets/images/icons/preloader.png" class="animation-scalation" alt="">
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- ==================== Mobile Menu Start Here ==================== -->
    @include('frontend.layouts.partials.mobile-menu')
    <!-- ==================== Mobile Menu End Here ==================== -->


    <!-- ==================== Header Start Here ==================== -->
    @include('frontend.layouts.partials.header')
    <!-- ==================== Header End Here ==================== -->

    <!-- ==================== Breadcrumb Start Here ==================== -->
    @include('frontend.layouts.partials.breadcrumb')
    <!-- ==================== Breadcrumb End Here ==================== -->

    @yield('content')
    <!-- ==================== Footer Start Here ==================== -->
    @include('frontend.layouts.partials.footer')
    <!-- ==================== Footer End Here ==================== -->


    <!-- Jquery js -->
    <script src="/frontend/assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="/frontend/assets/js/boostrap.bundle.min.js"></script>
    <!-- select2 Js -->
    <script src="/frontend/assets/js/select2.min.js"></script>
    <!-- Phosphor Icon Js -->
    <script src="/frontend/assets/js/phosphor-icon.js"></script>
    <!-- Slick js -->
    <script src="/frontend/assets/js/slick.min.js"></script>
    <!-- Slick js -->
    <script src="/frontend/assets/js/counter.min.js"></script>
    <!-- magnific popup -->
    <script src="/frontend/assets/js/magnific-popup.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="/frontend/assets/js/jquery-ui.js"></script>
    <!-- plyr Js -->
    <script src="/frontend/assets/js/plyr.js"></script>
    <!-- vanilla Tilt -->
    <script src="/frontend/assets/js/vanilla-tilt.min.js"></script>
    <!-- wow -->
    <script src="/frontend/assets/js/wow.min.js"></script>

    <script src="/frontend/assets/js/aos.js"></script>

    <!-- main js -->
    <script src="/frontend/assets/js/main.js"></script>



</body>

</html>
