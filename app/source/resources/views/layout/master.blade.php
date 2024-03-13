<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.head')

</head>

<body class="@yield('pageclass')">

    <!-- site wrapper -->

    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="flaticon-up scrollup-icon"></i>
    </button>

    @include('layout.header')

    <main class="main">

        @yield('content')

    </main>

    @include('layout.footer')


    <script src="assets/js/jquery-3.4.1.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/aos.js"></script>

    <script src="assets/js/jquery-ui.js"></script>

    <script src="assets/js/jquery.smartmenus.js"></script>

    <script src="assets/sliders/slider-1/js/revolution.tools.min.js"></script>
    <script src="assets/sliders/slider-1/js/rs6.min.js"></script>
    <script src="assets/sliders/slider-1/js/slideractivation.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/countdown.js"></script>

    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>

    @stack('footer-libs')

    <script src="assets/js/theme.js"></script>

    @stack('page-scripts')

</body>

</html>