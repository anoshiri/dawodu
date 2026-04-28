<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{ $pageTitle ?? 'Dawodu' }}</title>

	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--::::: FABICON ICON :::::::-->
	<link rel="icon" href="/assets/img/icon/favicon.ico">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--::::: Google AdSense :::::-->
	<script async src=https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6032450622428638 crossorigin="anonymous"></script>

	

	<!--::::: ALL CSS FILES :::::::-->
	<link rel="stylesheet" href="/assets/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/plugins/animate.min.css">
	<link rel="stylesheet" href="/assets/css/plugins/fontawesome.css">
	<link rel="stylesheet" href="/assets/css/plugins/owl.carousel.css">
	<link rel="stylesheet" href="/assets/css/plugins/slick.css">
	<link rel="stylesheet" href="/assets/css/plugins/stellarnav.css">
	<link rel="stylesheet" href="/assets/css/theme.css">
	<link rel="stylesheet" href="/assets/css/custom.css">

	@livewireStyles
</head>

<body class="theme-1">
	<!--::::: SEARCH FORM START:::::::-->
	<x-search></x-search>
	<!--:::::SEARCH FORM END :::::::-->

	<!--::::: TOP BAR START :::::::-->
	<x-topbar></x-topbar>
	<!--::::: TOP BAR END :::::::-->

	<div class="border_black"></div>

	<!--::::: LOGO AREA START  :::::::-->
	<x-logo></x-logo>
	<!--::::: LOGO AREA END :::::::-->


	<!--::::: MENU AREA START  :::::::-->
	<x-main-menu></x-main-menu>
	<!--::::: MENU AREA END :::::::-->

	{{ $slot }}

	<div class="space-70"></div>

	<!--::::: FOOTER AREA START :::::::-->
	<x-footer></x-footer>
	<!--::::: FOOTER AREA END :::::::-->


	<!--::::: ALL JS FILES :::::::-->
	<script src="/assets/js/plugins/jquery.3.6.0.min.js"></script>
	<script src="/assets/js/plugins/bootstrap.min.js"></script>
	<script src="/assets/js/plugins/jquery.nav.js"></script>
	<script src="/assets/js/plugins/owl.carousel.js"></script>
	<script src="/assets/js/plugins/popper.min.js"></script>
	<script src="/assets/js/plugins/circle-progress.js"></script>
	<script src="/assets/js/plugins/slick.min.js"></script>
	<script src="/assets/js/plugins/stellarnav.js"></script>
	<script src="/assets/js/plugins/wow.min.js"></script>
	<script src="/assets/js/main.js"></script>

	@livewireScripts

	@stack('scripts')
</body>

</html>