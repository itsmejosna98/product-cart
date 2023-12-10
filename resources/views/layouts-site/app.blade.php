<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('../../asset/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/style.css')}}" />

	<!-- star-rating style -->
	<link type="text/css" rel="stylesheet" href="{{asset('../../asset/css/star-style.css')}}" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- font-awesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	@include('layouts-site.header')
	<!-- /HEADER -->

	@yield('content')

	<!-- FOOTER -->
	@include('layouts-site.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('../../asset/js/jquery.min.js')}}"></script>
	<script src="{{asset('../../asset/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('../../asset/js/slick.min.js')}}"></script>
	<script src="{{asset('../../asset/js/nouislider.min.js')}}"></script>
	<script src="{{asset('../../asset/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('../../asset/js/main.js')}}"></script>

</body>

</html>