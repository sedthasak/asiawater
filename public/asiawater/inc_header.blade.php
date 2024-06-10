<?php
	if(empty($_title)) 			$_title ='';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>
<title>
    <?php echo $_title;?>
</title>
<meta name="keywords" content="<?php echo $_keywords;?>" />
<meta name="description" content="<?php echo $_description;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robot" content="index, follow" />
<meta name='copyright' content='Orange Technology Solution co.,ltd.'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<link rel="stylesheet" href="{{ asset('asiawater/css/bootstrap.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('asiawater/css/layout.css') }}" />
<link type="image/ico" rel="shortcut icon" href="{{ asset('asiawater/images/favicon.ico') }}">

<link rel="stylesheet" href="{{ asset('asiawater/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('asiawater/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('asiawater/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css"
    integrity="sha512-WIWddQW7bHfs1gwICYIoXuifLb8gCPkE7Z/gq7QHk3pKuxjNs0E68Rn5c7Ig4cWguZW5CIvRroTj2GrSxsvUZQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('asiawater/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ asset('asiawater/css/flexslider-rtl.css') }}">
<link rel="stylesheet" href="{{ asset('asiawater/css/flexslider-rtl-min.css') }}">


<script src="{{ asset('asiawater/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('asiawater/js/jquery.min.js') }}"></script>
<script src="{{ asset('asiawater/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asiawater/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asiawater/js/jquery-ui.js') }}"></script>
<script src="{{ asset('asiawater/js/modernizr.js') }}"></script>
<script src="{{ asset('asiawater/js/owl.carousel.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>