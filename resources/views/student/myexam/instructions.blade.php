@extends('student.myexam.layout')
@section('sidemenu')
<div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <div class="menu-container">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
                        <li class="">
                            <a href="{{ url('student/session/') }}/{{ $body }}/{{ $category }}/{{ $subject }}">
                                    <span class="badge badge-green pull-right rounded-x">1</span>
                                    Session
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                    <span class="badge pull-right rounded-x">2</span>
                                    Instructions
                            </a>
                        </li>
                            {{--*/$count=1;/*--}}
                            @while($questions > 0)
                            <li class="">
                                    <a href="#">
                                            <span class="badge pull-right rounded-x">{{ $count +  2 }}</span>
                                            Question - {{ $count }}
                                    </a>
                            </li>
                            {{--*/$count++;/*--}}
                            {{--*/$questions--;/*--}}
                            @endwhile
                    </ul>
                </div>
            </div>
    </nav>
</div>

@stop
@section('content')
<div class="col-md-9">
    <div class="tag-box tag-box-v3 tag-text-space margin-bottom-40">
        <!-- Bootstrap Modal -->
        <div class="margin-bottom-50">
                <div class="headline"><h2>Instructions</h2></div>
                <p>{{ $instruction->description }}</p>
                <p><strong>Time Allowed: {{ $instruction->exam->time_allowed }}</strong></p>

        </div>
        <!-- Small modal -->
        <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Start</button>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                        <div class="modal-content alert alert-warning">
                                <div class="modal-header alert alert-warning fade in text-center">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 id="myLargeModalLabel3" class="modal-title">WBT Confirmation!</h4>
                                </div>
                                <div class="modal-body alert alert-warning fade in text-center">
                                    <p>By clicking the continue button on this dialog, It is assumed that you have read and understood all instruction, and have also accepted our terms of use (TOU). Also note that, After clicking the continue option, your exam session starts.</p>
                                    <p>
                                    <a class="btn-u btn-u-xs btn-u-red" data-dismiss="modal" href="#">Cancel</a> <a class="btn-u btn-u-xs btn-u-sea" href="{{ (isset($trynow) && $trynow)?  url('web/try-now') :  url('student/questions') }}/{{ $exam }}">Continue</a>
                                </div>
                        </div>
                </div>
        </div>
        <!-- End Small Modal -->
    </div>
        <!-- End Bootstrap Modals With Forms -->
    </div>
</div>
@stop