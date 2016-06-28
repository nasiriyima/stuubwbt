@extends('student.myprofile.myprofile_layout')

@section('pagestyles')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/ladda-buttons/css/custom-lada-btn.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/hover-effects/css/custom-hover-effects.css') }}">

@stop

@section('pagecontent')
    <div class="profile-body margin-bottom-20">
        <!--Profile Blog-->
        <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Friendship Requests</h2>
                <center>{!! $friendshipRequests->links() !!}</center>
            </div>
            <div class="panel-body">
                {{--*/
                    $requests = $friendshipRequests->getCollection()->chunk(2);
                    $count = 0;
                /*--}}
                @if(count($requests) < 1)
                    You have no friendship requests. Add your social contact information to invite your friends from facebook, google-plus and twitter
                @endif
                @foreach($requests as $rows)
                    <div class="row">
                        @foreach($rows as $data)
                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="{{ (isset($data->user->profile->image) && $data->user->profile->image !="" && $data->user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$data->user->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $data->user->profile->first_name }}">
                                    <div class="name-location">
                                        <strong><a href="{{ url('student/friend-profile') }}/{{ \Crypt::encrypt($data->user->id) }}">{{ $data->user->first_name }}</a></strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">{{ $data->user->profile->address or ''}}</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>{{ $data->user->profile->school->name  or ''}}</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li id="accept{{ $count }}"><i class="fa fa-check"></i><a href="javascript:void(0)" onclick="acceptFriendRequest('{{ \Crypt::encrypt($data->user->id) }}', '{{ $data->user->first_name }}', '{{ $count }}');">Accept</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">{{  $data->user->friendship()->requestAccepted()->count() }} Friends</a></li>

                                    </ul>
                                </div>
                            </div>
                            {{--*/$count++;/*--}}
                        @endforeach
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <!--End Profile Blog-->

        <hr>
    </div>
@stop

@section('pagescripts')
<script type="text/javascript">
    function showAlert(type, message){
        if(type === 'error'){
            $("div#alert-message").html('<div class="alert alert-danger fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Oh snap!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'success'){
            $("div#alert-message").html('<div class="alert alert-success fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Well done</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'warning'){
            $("div#alert-message").html('<div class="alert alert-warning fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'info'){
            $("div#alert-message").html('<div class="alert alert-info fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Heads up!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        setTimeout(function(){
            $("div#alert-message").hide("slow");
        }, 10000);
    }

    function acceptFriendRequest(id, name, count){
        $.ajax({
            url: "{!! url('student/process-friend') !!}/"+id+"/accept",
            method:"get",
            data: {_token:"{!! csrf_token() !!}", friend:id},
            success:function(response){
                console.log(response);
                if(response.message === "success"){
                    showAlert("success", "You have accepted a friendship request from "+name);
                    $("#accept"+count).replaceWith('<li id="accept'+count+'"><i class="fa fa-user"></i><a href="{{ url('student/friend-profile') }}/'+id+'">Profile</a></li>');
                    return;
                }
            }
        });
    }
</script>
@stop