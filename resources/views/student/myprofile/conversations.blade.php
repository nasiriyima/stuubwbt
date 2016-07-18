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
{{--*/ $massages = $conversations->getCollection() /*--}}
        @foreach($massages as $conversation)
            @if(in_array($conversation['store'], [2]))
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="{{ (isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$user->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $user->first_name }}" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#">{{ ucfirst($conversation['subject']) }}</a></strong></h6>
                                <p>{!! implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30))  !!} ....
                                    <a class="btn-u btn-u-sm" href="javascript:showMessage('{!! \Crypt::encrypt($conversation['id']) !!}')">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> {{ date('F d, Y', strtotime($conversation['created_at'])) }}</li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> Me</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>0</a>
                            </div>
                        </div>
                    </li>
            @endif
            @if(in_array($conversation['store'], [1]))
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
                        <div class="timeline-panel">
                            {{--*/
                                $sender_profile = \App\Profile::where(['user_id' =>  $conversation['sender']['id'] ])->first();
                            /*--}}
                            <div class="timeline-heading">
                                <img class="img-responsive" src="{{ (isset($sender_profile->image) && $sender_profile->image !="" && $sender_profile->image !=NULL)? url('student/file').'/profile_pictures/'.$sender_profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $conversation['sender']['first_name'] }}" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#">{{ ucfirst($conversation['subject']) }}</a></strong></h6>
                                <p>{!! implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30))  !!} ....
                                    <a class="btn-u btn-u-sm" href="javascript:showMessage('{!! \Crypt::encrypt($conversation['id']) !!}')">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> {{ date('F d, Y', strtotime($conversation['created_at'])) }}</li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> {{ explode(',', $conversation['sender']['first_name'])[0]  }}</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>0</a>
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
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel4">View Conversation</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('pagescripts')
    <script type="text/javascript" src="{{ asset('public/assets/js/plugins/jquery.lazyload.js') }}"></script>
    <script type="text/javascript">
        function showMessage(id){
            $.ajax({
                url: '{!! url('student/conversation-view') !!}',
                data: {'_token':'{!! csrf_token() !!}', 'id':id},
                method: 'post',
                success:function(response){
                    $("#view .modal-body").html(response);
                    $('#view').modal('show');
                }
            });
        }
    </script>
@stop