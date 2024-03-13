<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1" name="viewport">
<meta name="referrer" content="no-referrer">

<title>@yield('title')</title>

@stack('head')

<meta name="description" content="@yield('description')" />
<meta name="keywords" content="@yield('meta_keywords')" />
<link rel="canonical" href="@yield('canonical')" />

<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="@yield('canonical')" />



<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&amp;display=swap" rel="stylesheet" />
<link rel="stylesheet" href="assets/font/stylesheet.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:800&amp;display=swap" rel="stylesheet" />

<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

<link rel="stylesheet" href="assets/css/jquery-ui.css" />

<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css" />

<link rel="stylesheet" href="assets/css/font-awosome.css" />

<link rel="stylesheet" href="assets/flat-font/flaticon.css" />

<link rel="stylesheet" href="assets/css/ticker.min.css" />

<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

<link rel="stylesheet" href="assets/css/sm-core-css.css" />
<link rel="stylesheet" href="assets/css/sm-mint.css" />
<link rel="stylesheet" href="assets/css/sm-style.css" />

<link rel="stylesheet" href="assets/css/aos.css" />
<link rel="stylesheet" href="assets/css/animate.min.css" />

<link rel="stylesheet" href="assets/sliders/slider-1/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
<link rel="stylesheet" href="assets/sliders/slider-1/fonts/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="assets/sliders/slider-1/css/rs6.css" />

<link rel="stylesheet" href="assets/scss/style.minified.css" />

<link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png" />

<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->