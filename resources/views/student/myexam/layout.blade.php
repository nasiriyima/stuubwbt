<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en" oncontextmenu=""> <!--<![endif]-->
    <head>
        <title>STUUB-WBT | {{ (isset($bodyname))? $bodyname : '' }} {{ (isset($categoryname))? $categoryname : '' }} {{ (isset($subjectname))? $subjectname : '' }} {{ (isset($monthname))? $monthname : '' }} {{ (isset($sessionname))? $sessionname : '' }}</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        @include('includes.admin.header_css')
        @yield('pagecss')
    </head>
    <body oncontextmenu="return false;">
        <div class="wrapper">
            @yield('sidemenu')
                <div class="content-side-right" style="margin-top: 10px">
                    @if(isset($time_allowed))
                    <div class="col-md-8">
                        <strong>Time Allowed: {{ $time_allowed }}</strong>
                    </div>
                    <div class="col-md-4">
                        <strong>Time Remaining: <span id="remaining"></span></strong>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <div class="headline"><h2>@yield('pagetitle')</h2></div>
                        @if(\Session::has('error'))
                        <div class="alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oh snap! You got an error!</h4>
                            <p>{{ \Session::get('error') }}</p>
                            <p>
                                @if(\Session::has('actionAname') && \Session::has('actionBname'))
                                    <a class="btn-u btn-u-red" href="{{ \Session::get('actionA') }}">{{ \Session::get('actionAname') }}</a>
                                    <a class="btn-u btn-u-sea" href="{{ \Session::get('actionB') }}">{{ \Session::get('actionBname') }}</a>
                                @else
                                    <a class="btn-u btn-u-red" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                                @endif
                            </p>
                        </div>
                        @endif
                        @if(\Session::has('success'))
                        <div class="alert alert-success fade in margin-bottom-40">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Well done!</h4>
                            <p>{{ \Session::get('success') }}</p>
                            <a class="btn-u btn-u-sea" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                        </div>
                        @endif
                    @yield('content')
                    </div>
                </div>
            </div>
            @include('student.include.scripts_js')
            <script type="text/javascript">
                var examwindow = window;
            </script>
            @yield('customjs')
            <script type="text/javascript">
                if(!examwindow.opener){
                    $(".wrapper").hide();
                    document.write("<center>======================================================================================================================================================================<br />");
                    document.write("EXAM WINDOW IS CLOSED!!! SORRY THIS PAGE CANNOT BE VIEWED HERE<br />");
                    document.write("======================================================================================================================================================================</center>");
                    setTimeout(function(){
                        window.location = "{!! url('student') !!}";
                    },1000);
                }
                $(document).ready(function(){
                    $(document).keydown(function(e) { if (e.keyCode === 8) e.preventDefault(); });
                    document.onkeydown = function(e){
                    if (e.ctrlKey && 
                        (e.keyCode === 67 || 
                         e.keyCode === 86 || 
                         e.keyCode === 85 || 
                         e.keyCode === 117)) {
                      return false;
                    } else {
                        return true;
                    }
                    };

                });
        </script>
        
    </body>
</html>