@extends('student.myexam.layout')
@section('sidemenu')
<div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <div class="menu-container">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
                        <li class="">
                            <a data-toggle="modal" data-target=".bs-example-modal-sm">
                                    <span class="badge badge-green pull-right rounded-x">1</span>
                                    Session
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="modal" data-target=".bs-example-modal-sm">
                                    <span class="badge badge-green pull-right rounded-x">2</span>
                                    Instructions
                            </a>
                        </li>
                        <li class="active">
                            <a data-toggle="modal" data-target=".bs-example-modal-sm">
                                    <span class="badge badge-green pull-right rounded-x">2</span>
                                    Questions
                            </a>
                        </li>
                            {{--*/$count=1;/*--}}
                            @foreach($questions->get() as $question)
                            <li class="{{ ($count==1)? 'active' : '' }}" id="question-side-menu{{ $count }}" style="display: none;">
                                <a href="javascript:void(0);" onclick="gotoQuestion('{{ $count }}');">
                                    <span class="badge pull-right rounded-x" id="side-menu-badge{{ $count }}">{{ $count}}</span>
                                    Question - {{$count}}
                                </a>
                            </li>
                            {{--*/$count++;/*--}}
                            @endforeach
                    </ul>
                    <br/>
                    <div class="row-fluid">
                        <div class="col-md-1">  
                        </div>
                        {{--*/$count=1;/*--}}
                        @foreach($questions->get() as $question)
                        <div class="col-md-2" id="question-side-menu{{ $count }}">
                            <a href="javascript:void(0);" onclick="gotoQuestion('{{ $count }}');">
                                <span class="badge pull-right rounded-x" id="side-menu-span{{ $count }}">{{ $count }}</span>
                            </a>
                        </div>
                        {{--*/$count++;/*--}}
                        @endforeach
                        <div class="col-md-1">  
                        </div>
                    </div>
                </div>
            </div>
    </nav>
</div>

@stop
@section('content')
<div class="col-md-1">
</div>
<div class="col-md-10">
    {{--*/$questionCount=1;/*--}}
    {{--*/$questionids=[];/*--}}
    <input type="hidden" value="{{ $questionCount }}" name="active_question" />
    @foreach($questions->get() as $question)
    <div class="shadow-wrapper" id="question-{{ $questionCount }}" style="{{ ($questionCount==1)? '' : 'display:none;' }}">
        <blockquote  class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p><span class="dropcap-bg">{{ $questionCount }}</span><em id="question">{!! $question->name !!}</em></p>
        </blockquote>
        {{--*/$questionids[$question->id]= "0";/*--}}
        @if(count($question->option) > 0)
        <div class="note note-success">
            {{--*/$optionCount=0;/*--}}
            @foreach($question->option as $option)
            <label class="radio state-success"><input type="radio" class="options{{ $questionCount }}" name="option{{ $questionCount }}" value="{{ $option->id }}">{{ ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount)) }}.&nbsp;{{ $option->name }}</label>
            {{--*/$optionCount++;/*--}}
            @endforeach
            <input type="hidden" name="selection" value="" />
        </div>
        @endif
        <ul class="pager">
            <li class="previous" style="{{ ($questionCount==1)? 'display:none' : '' }}"><a class="rounded-4x" href="javascript:void(0);" onclick="previousQuestion('{{ $questionCount }}','{{ $question->id }}');">← Older</a></li>
            <li class="next"><a class="rounded-4x" href="javascript:void(0);" onclick="nextQuestion('{{ $questionCount }}','{{ $question->id }}');">{!! ($questionCount==count($questions->get()))? 'Finish &ofcir;' : 'Newer →' !!}</a></li>
        </ul>
    </div>
    {{--*/$questionCount++;/*--}}
    @endforeach
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-danger">
                    <div class="modal-header alert alert-danger fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Error Message!</h4>
                    </div>
                    <div class="modal-body alert alert-danger fade in text-center">
                        <p>You are not allowed to select this option, because an exam session has already started</p>
                        <p>
                        <a class="btn-u btn-u-xs btn-u-red" data-dismiss="modal" href="#">Continue</a>
                    </div>
            </div>
    </div>
</div>
<div class="modal fade waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p>You have chosen to continue without selecting an option. If you wish to select an option for the skipped question, you can go back at anytime during the exam</p>
                        <p><label class="checkbox"><input type="checkbox" name="donot"><i></i>Do not show this prompt again</label>
                        <a class="btn-u btn-u-xs btn-u-default" data-dismiss="modal" href="javascript:void(0);">OK</a>
                    </div>
            </div>
    </div>
</div>

<div class="modal fade finish-waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p id="message"></p>
                        <a class="btn-u btn-u-xs btn-u-default" data-dismiss="modal" href="javascript:void(0);">Cancel</a> <a class="btn-u btn-u-xs btn-u-default" onclick="finish();" href="javascript:void(0);">OK</a>
                    </div>
            </div>
    </div>
</div>
<!-- End Small Modal -->
@stop
@section('customjs')
<script type="text/javascript">
    var totalQuestion = parseInt("{!! $questions->count() !!}");
    var timeleft = "{!! $time_left !!}";
    var questionids = JSON.parse('{!! json_encode($questionids) !!}');
    var csrf = "{!! csrf_token() !!}";
    var exam = "{!! $exam !!}";
    var examcompleteurl = "{!! url('student/exam-complete') !!}";
</script>
<script type="text/javascript" src="{{ asset('public/assets/js/custom.js') }}"></script>
@stop