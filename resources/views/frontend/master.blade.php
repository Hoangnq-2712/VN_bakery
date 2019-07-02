<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurant</title>
	<script type="text/javascript" src="{{asset('assets/js/jquery-2.2.4.js')}}"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="images/png" href="{{asset('assets/images/logo_banner.png')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
	<link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet">
	<script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/menu.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/eat.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<link href="{{asset('assets/css/baguetteBox.css')}}" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Tinos:400,400i,700&amp;subset=vietnamese" rel="stylesheet">
	<!--  -->
	

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=928992934098918";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	@include('frontend.elements.header')

	@yield('content')

	@include('frontend.elements.footer')
	<script type="text/javascript" src="{{asset('assets/js/ajax.js')}}"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				navigation : true,
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem : true

			});

			$("#owl-demo1").owlCarousel({
				navigation : true,
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem : false,
				itemsMobile : [479, 3],
				items: 4

			});
		});
	</script> 
	
</body>

</html>