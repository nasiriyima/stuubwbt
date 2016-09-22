<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>STUUB - WBT</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="google-site-verification" content="0Z8rvhLcmoJivaYbL_lYkjEP-jfgc7xaQW5wxi4_cPs" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
        
        @include('includes.header_css')
</head>

<body>
    <div class="wrapper">
        @include('includes.menu_header')
            @yield('maincontent')
            
            @include('includes.footer')
            @include('frontweb.login')
    </div>
    @include('includes.scripts_js')
</body>
</html>
