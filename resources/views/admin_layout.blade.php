<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>STUUB WBT |</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
        @include('includes.admin.header_css')
</head>

<body>
    <div class="wrapper">
        @include('includes.admin.sidemenu')
            <div class="content-side-right" style="margin-top: 10px">
                <div class="col-md-12">
                    <div class="headline"><h2>@yield('pagetitle')</h2></div>
                @yield('maincontent')
                </div>
            </div>
        </div>
        @include('includes.admin.scripts_js')
</body>
</html>