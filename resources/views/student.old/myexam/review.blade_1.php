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
                            {{--*/$redundant_question= [];/*--}}
                            @foreach($questions->get() as $question)
                            @foreach($selections as $answeredquestion => $answer)
                            {{--*/if(!in_array($question->id,$redundant_question) && $question->id == $answeredquestion):/*--}}
                            {{--*/array_push($redundant_question,$question->id);/*--}}
                            <li class="{{ ($count==1)? 'active' : '' }}" id="question-side-menu{{ $count }}">
                                <a href="javascript:void(0);" onclick="gotoQuestion('{{ $count }}','{{ $question->id }}');">
                                    <span class="badge badge-{{($question->option()->correctAnswer()->id == $answer)? 'green' : 'red' }} pull-right rounded-x" id="side-menu-badge{{ $count }}">{{ $count +  2 }}</span>
                                    Question - {{ $count }}
                                </a>
                            </li>
                            {{--*/endif;/*--}}
                            @endforeach
                            {{--*/$count++;/*--}}
                            @endforeach
                    </ul>
                </div>
            </div>
    </nav>
</div>

@stop
@section('content')
<div class="col-md-9">
    {{--*/$questionCount=1;/*--}}
    {{--*/$questionids=[];/*--}}
    <input type="hidden" value="{{ $questionCount }}" name="active_question" />
    {{--*/$redundantquestion= [];/*--}}
    @foreach($questions->get() as $question)
    @foreach($selections as $answeredquestion => $answer)
    {{--*/if(!in_array($question->id,$redundantquestion) && $question->id == $answeredquestion):/*--}}
    {{--*/array_push($redundantquestion,$question->id);/*--}}
    <div class="shadow-wrapper" id="question-{{ $questionCount }}" style="{{ ($questionCount==1)? '' : 'display:none;' }}">
        <blockquote  class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p><span class="dropcap-bg">{{ $questionCount }}</span><em id="question">{{ $question->name }}</em></p>
        </blockquote>
        {{--*/$questionids[$question->id]= "0";/*--}}
        @if(count($question->option) > 0)
        <div class="note note-success">
            {{--*/$optionCount=0;/*--}}
            @foreach($question->option as $option)
            <label class="radio state-success">
                <input type="radio" class="options{{ $questionCount }}" name="option{{ $questionCount }}" value="{{ $option->id }}" {{ ($option->id == $answer)? 'checked' : '' }} disabled>
                @if($question->option()->correctAnswer()->id == $option->id)
                <span class="badge badge-green rounded-2x">{{ ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount)) }}.&nbsp;{{ $option->name }}</span>
                @elseif($answer != $question->option()->correctAnswer()->id && $option->id == $answer)
                <span class="badge badge-red rounded-2x">{{ ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount)) }}.&nbsp;{{ $option->name }}</span>
                @else
                {{ ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount)) }}.&nbsp;{{ $option->name }}
                @endif
            </label>
            {{--*/$optionCount++;/*--}}
            @endforeach
            <input type="hidden" name="selection" value="" />
        </div>
        @endif
        <ul class="pager">
            <li class="previous" style="{{ ($questionCount==1)? 'display:none' : '' }}"><a class="rounded-4x" href="javascript:void(0);" onclick="previousQuestion('{{ $questionCount }}','{{ $question->id }}');">← Older</a></li>
            <li class="next"><a class="rounded-4x" href="javascript:void(0);" onclick="nextQuestion('{{ $questionCount }}','{{ $question->id }}');">{!! ($questionCount==count($questions->get()))? 'Retake &ofcir;' : 'Newer →' !!}</a></li>
        </ul>
    </div>
    {{--*/endif;/*--}}
    @endforeach
     {{--*/$questionCount++;/*--}}
    @endforeach
</div>

<div class="modal fade finish-waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p>If you want to retake this exam click OK on this dialog or click cancel to return to exam score board</p>
                        <a class="btn-u btn-u-xs btn-u-default" href="{{ url('student/exam-complete') }}">Cancel</a> 
                        <a class="btn-u btn-u-xs btn-u-default" href="{{ url('student/instructions').'/'.\Session::get('body').'/'.\Session::get('category').'/'.\Session::get('subject').'/'.\Session::get('month').'/'.\Session::get('session') }}">OK</a>
                    </div>
            </div>
    </div>
</div>
<!-- End Small Modal -->
@stop
@section('customjs')
<script type="text/javascript">
    function nextQuestion(previous,question_id){
        var totalQuestion = parseInt("{!! $questions->count() !!}");
        var next = parseInt(previous) + 1;
        if(next <= totalQuestion){
            $("#question-"+next).css("display","");
            $("#question-"+previous).css("display","none");
            $("input[name=active_question]").val(next);
            $("#question-side-menu"+next).attr("class","active");
            $("#question-side-menu"+previous).attr("class","");
        } else {
            $("#question-side-menu"+next).attr("class","active");
            $("#question-side-menu"+previous).attr("class","");
            $(".finish-waring-message").modal("show");
        }
    }
    
    function previousQuestion(next,question_id){
        var previous = parseInt(next) - 1;
        if(previous > 0){
            $("input[name=active_question]").val(previous);
            $("#question-"+next).css("display","none");
            $("#question-"+previous).css("display","");
            $("#question-side-menu"+previous).attr("class","active");
            $("#question-side-menu"+next).attr("class","");
        }
    }
    
    function gotoQuestion(count,question_id){
        var activequestion = $("input[name=active_question]").val();
        $("#question-"+activequestion).css("display","none");
        $("#question-"+count).css("display","");
        $("#question-side-menu"+count).attr("class","active");
        $("#question-side-menu"+activequestion).attr("class","");
        $("input[name=active_question]").val(count);
    }
	
    $("#remaining").countdown("stop");
    $("#remaining").text("{!! $elapsed_time !!}");
    
    function finish(){
        
    }
</script>
@stop