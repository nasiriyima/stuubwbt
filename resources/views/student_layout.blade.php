
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>Stuub - WBT | {{ $page_name or ''  }}</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Web Fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
        @include('student.include.header_css')
    </head>
    <body>
        <div class="wrapper">
            @include('student.include.sidemenu')
            <!--=== Content Side Left Right ===-->
            <div class="content-side-right">
                <div class="container content">
                    @yield('maincontent')
                </div>
                @include('student.include.footer')
            </div>
            <!--=== End Content Side Left Right ===-->
        </div><!--/wrapper-->
        @include('student.include.scripts_js')
        @yield('pagejs')
    </body>
</html>