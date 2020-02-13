<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Kuteshop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
	<meta name="keywords" content="kuteshop,7uptheme" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name='revisit-after' content='1 days' />
	<title>Kute Shop | Home Style 4</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/font-awesome.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/bootstrap.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/bootstrap-theme.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/jquery.fancybox.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/owl.carousel.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/owl.transitions.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/owl.theme.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/jquery.mCustomScrollbar.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/animate.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/libs/hover.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/color-orange.css')}}" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/theme.css')}}" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/browser.css')}}" media="all"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/rtl.css')}}" media="all"/> -->
</head>
<body style="background:#f4f4f4">
<div class="wrap">
	@include('pages.layouts.header')
	<!-- End Header -->
    @yield('content')
	<!-- End Content -->	
	@include('pages.layouts.footer')
	<!-- End Footer -->
	<a href="#" class="radius scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/jquery.mCustomScrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/libs/wow.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/theme.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>