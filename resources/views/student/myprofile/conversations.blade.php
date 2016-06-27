@extends('student.myprofile.myprofile_layout')

@section('pagestyles')
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline1.css') }}">
@stop

@section('pagecontent')
    <div class="profile-body">
        <div class="panel-heading">
            Showing all your conversations between {{ $conversationStartDate->format('d-m-Y') }} to {{ $conversationEndDate->format('d-m-Y') }}
        </div>
        <ul class="timeline-v1">
{{--{{ dd($conversations) }}--}}
        @foreach($conversations->getCollection() as $conversation)
            @if($conversation['sender_id'] == $user->id && in_array($conversation['status'], [2]))
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="{{ (isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$user->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $user->first_name }}" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#">{{ ucfirst($conversation['subject']) }}</a></strong></h6>
                                <p>{!! implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30))  !!} ....
                                    <a class="btn-u btn-u-sm" href="#">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> {{ date('F d, Y', strtotime($conversation['created_at'])) }}</li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> Me</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>239</a>
                            </div>
                        </div>
                    </li>
            @endif
            @if($conversation['sender_id'] != $user->id && in_array($conversation['status'], [0, 1]))
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="{{ (isset($conversation['sender_profile'][0]['image']) && $conversation['sender_profile'][0]['image'] !="" && $conversation['sender_profile'][0]['image'] !=NULL)? url('student/file').'/profile_pictures/'.$conversation['sender_profile'][0]['image'] : asset('public/assets/img/user.jpg') }}" alt="{{ $conversation['sender']['first_name'] }}" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#">{{ ucfirst($conversation['subject']) }}</a></strong></h6>
                                <p>{!! implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30))  !!} ....
                                    <a class="btn-u btn-u-sm" href="#">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> {{ date('F d, Y', strtotime($conversation['created_at'])) }}</li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> {{ explode(',', $conversation['sender']['first_name'])[0]  }}</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>87</a>
                            </div>
                        </div>
                    </li>
            @endif
        @endforeach
            <li class="clearfix" style="float: none;"></li>
        </ul>
        <center>
            <div class="row">
                {!! $conversations->links() !!}
            </div>
        </center>
    </div>
@stop

@section('pagescripts')
    <script type="text/javascript" src="{{ asset('public/assets/js/plugins/jquery.lazyload.js') }}"></script>
@stop