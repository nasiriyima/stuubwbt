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
                            {{--*/$count=1;/*--}}
                            @foreach($questions->get() as $question)
                            <li class="{{ ($count==1)? 'active' : '' }}" id="question-side-menu{{ $count }}">
                                <a href="javascript:void(0);" onclick="gotoQuestion('{{ $count }}');">
                                    <span class="badge pull-right rounded-x" id="side-menu-badge{{ $count }}">{{ $count +  2 }}</span>
                                    Question - {{ $count }}
                                </a>
                            </li>
                            {{--*/$count++;/*--}}
                            @endforeach
                    </ul>
                </div>
            </div>
    </nav>
</div>

@stop
@section('content')
<div class="col-md-12">
    {{--*/$questionCount=1;/*--}}
    {{--*/$questionids=[];/*--}}
    <input type="hidden" value="{{ $questionCount }}" name="active_question" />
    @foreach($questions->get() as $question)
    <div class="shadow-wrapper" id="question-{{ $questionCount }}" style="{{ ($questionCount==1)? '' : 'display:none;' }}">
        <div class="col-sm-8">
            <blockquote  class="tag-box tag-box-v1 box-shadow shadow-effect-2">
                <p><span class="dropcap-bg">{{ $questionCount }}</span><em id="question">{!! $question->name !!}</em></p>
                {{--*/ $word_count = count(explode(' ', $question->name));/*--}}
                {!! ($word_count < 18)? '<br />': '' !!}
            </blockquote>
        </div>
        @if($question->question_additional_information_id)
            <div class="col-sm-4">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            @if($question->questionAdditionalInformation->information_type_id == 1 )
                                <img class="img-responsive" src="{{ url('student/file/additional_info') }}/{{ $question->questionAdditionalInformation->description }}" width="200" height="50" alt="{{ $question->questionAdditionalInformation->name }}" />
                            @else
                                {{--*/ $description = explode(' ', $question->questionAdditionalInformation->description);/*--}}
                                <p>{!! implode(' ', array_splice($description, 0, 25)) !!} ....</p>

                            @endif
                        </div>
                        <a class="btn-more hover-effect" href="javascript:void(0)" onclick="$('#view{{ $questionCount }}').appendTo('body').modal('show');">more +</a>
                    </div>
                    <div class="caption">
                        <h5><a class="hover-effect" href="#"><strong>{{ $question->questionAdditionalInformation->name }}</strong></a></h5>
                        <p>{{ $question->questionAdditionalInformation->informationType->name or '' }}</p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="view{{ $questionCount }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width: 700px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel4">{{ $question->questionAdditionalInformation->informationType->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="tag-box tag-box-v3">
                                <div class="headline"><h2>{{ $question->questionAdditionalInformation->name }}</h2></div>
                                <center>
                                   @if($question->questionAdditionalInformation->information_type_id == 1 )
                                       <img class="img-responsive" src="{{ url('student/file/additional_info') }}/{{ $question->questionAdditionalInformation->description }}" width="300" height="400" alt="{{ $question->questionAdditionalInformation->name }}" />
                                   @else
                                       <p style="height: 300px; overflow-y: scroll;">{!! $question->questionAdditionalInformation->description !!}</p>
                                   @endif
                               </center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{--*/$questionids[$question->id]= "0";/*--}}
        <div class="col-sm-12">
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
        </div>
       <div class="col-sm-10">
           <ul class="pager">
               <li class="previous" style="{{ ($questionCount==1)? 'display:none' : '' }}"><a class="rounded-4x" href="javascript:void(0);" onclick="previousQuestion('{{ $questionCount }}','{{ $question->id }}');">← Older</a></li>
               <li class="next"><a class="rounded-4x" href="javascript:void(0);" onclick="nextQuestion('{{ $questionCount }}','{{ $question->id }}');">{!! ($questionCount==count($questions->get()))? 'Finish &ofcir;' : 'Newer →' !!}</a></li>
           </ul>
       </div>
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