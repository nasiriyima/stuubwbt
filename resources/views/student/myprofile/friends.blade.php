@extends('student.myprofile.myprofile_layout')

@section('pagestyles')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/ladda-buttons/css/custom-lada-btn.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/hover-effects/css/custom-hover-effects.css') }}">
@stop

@section('pagecontent')
    <div class="profile-body margin-bottom-20">
        <form action="javascript:searchQuery()" id="sky-form3" class="sky-form">
           <fieldset>
                <section>
                    <label class="input">
                        <i class="hover-hand-cursor icon-append fa fa-search" onclick="searchQuery();"></i>
                        <input type="text" name="search" id="search" />
                    </label>
                </section>
           </fieldset>
        </form>
        <div class="margin-bottom-50"></div>
        <button type="button" class="btn-u btn-block text-center" style="display: none;" onclick="returnFriendsList();" id="return">Return to Friends List</button>
        <table  class="sTable">
            <thead style="display:none;">
                <tr>
                    <th>Grid1</th>
                    <th>Grid2</th>
                </tr>
            </thead>
            <tbody>
            {{--*/
                $rows = $friends->chunk(2);
            /*--}}
                @foreach($rows as $row)
                    {{--*/
                        $index = 0;
                    /*--}}
                    <tr class="row margin-bottom-20">
                    @foreach($row as $data)
                        @if($index%2 == 0)
                            <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                                <div class="profile-blog">
                                    <img class="rounded-x" src="{{ (isset($data->friend->profile->image) && $data->friend->profile->image !="" && $data->friend->profile->image !=NULL)? url('student/file').'/'.$data->friend->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $data->friend->profile->first_name }}">
                                    <div class="name-location">
                                        <strong>{{ $data->friend->first_name }}</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">{{ $data->profile[0]->address or ''}}</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>{{ $data->friend->profile->school->name  or ''}}</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">{{  $data->friend->friendship()->requestAccepted()->count() }} Friends</a></li>
                                        <li><i class="fa fa-share"></i><a href="#">Suggest</a></li>
                                    </ul>
                                </div>
                            </td>
                        @endif
                        @if($index%2 == 1)
                            <td class="col-sm-6 profile-body">
                                <div class="profile-blog">
                                    <img class="rounded-x" src="{{ (isset($data->friend->profile->image) && $data->friend->profile->image !="" && $data->friend->profile->image !=NULL)? url('student/file').'/'.$data->friend->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $data->friend->first_name }}">
                                    <div class="name-location">
                                        <strong>{{ $data->friend->first_name }}</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">{{ $data->profile[0]->address }}</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>{{ $data->friend->profile->school->name }}</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">{{  $data->friend->friendship()->requestAccepted()->count() }} Friends</a></li>
                                        <li><i class="fa fa-share"></i><a href="#">Suggest</a></li>
                                    </ul>
                                </div>
                            </td>
                        @endif
                            {{--*/
                                $index++;
                            /*--}}
                    @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($friends->total() > 6)
            <input type="hidden" id="currentPage" name="currentPage" value="{{ $friends->currentPage() }}" />
            <input type="hidden" id="nextPage" name="nextPage" value="{{ $friends->currentPage() + 1 }}" />
        <div class="ladda-btn">
            <center>
                <button type="button" class="btn-u btn-default btn-block text-center ladda-button center" data-style="contract" id="load_more">Load More</button>
            </center>
        </div>
        @endif
        <!--End Profile Blog-->
    </div>
@stop

@section('pagescripts')
{{--<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery.lazyload.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/jquery.lazyload.js') }}"></script>
<script src="{{ asset('public/assets/plugins/ladda-buttons/js/spin.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/ladda-buttons/js/ladda.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('public/assets/js/plugins/ladda-buttons.js') }}"></script>--}}

<script type="text/javascript">
    var l = Ladda.create(document.querySelector('.ladda-btn button'));
    $(document).ready(function(){
        initializeTable(".sTable");
    });

    $("#load_more").on("click", function(){
        l.start();
        var nextPage =  parseInt($("#nextPage").val());
        var pageCount = parseInt("{!! $friends->count() !!}");
        if(nextPage <= pageCount){
            $.ajax({
                url: "{!! url('student/lazy-load') !!}",
                data: {page:nextPage},
                method: "get",
                success:function(response){
                    if(response.session_expired)window.location.replace(response.url);
                    nextPage = nextPage + 1;
                    $("#nextPage").val(nextPage);
                    $.each(response, function(index, row){
                        var tr = [];
                        var td1 = '';
                        var td2 = '';
                        var index = 0;
                        for(var i in row){
                            if(index%2 === 0){
                                td1 = td1 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile[0].image)+'" alt="'+row[i].friend.first_name+'"><div class="name-location"><strong>'+row[i].friend.first_name+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile[0].address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list"><li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li><li><i class="fa fa-group"></i><a href="#">Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
                                tr.push(td1);
                            }
                            if(index%2 === 1){
                                td2 = td2 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile[0].image)+'" alt="'+row[i].friend.first_name+'"><div class="name-location"><strong>'+row[i].friend.first_name+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile[0].address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list"><li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li><li><i class="fa fa-group"></i><a href="#">Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
                                tr.push(td2);
                            }
                            if(Object.keys(row).length%2 === 1 && index === (Object.keys(row).length-1)){
                                td2 = td2 + '';
                                tr.push(td2);
                            }
                            index++;
                        }
                        $(".sTable").DataTable().row.add(tr).draw()
                                .nodes()
                                .to$()
                                .addClass("row margin-bottom-20");
                    });
                    l.stop();
                }
            });
            return;
        }
        $("#load_more").hide();
    });

    function searchQuery(){
//        var sTable = $(".sTable").DataTable();
//        var displayRecordCount = sTable.page.info().recordsDisplay;
//        if(displayRecordCount === 0){
//
//        }
        $.ajax({
            url: "{!! url('student/search') !!}",
            method: "post",
            data: {_token:"{!! csrf_token() !!}", searchQuery:$("#search").val()},
            success:function(response){

                if(response.session_expired)window.location.replace(response.url);

                var table = '<table  class="oTable"><thead style="display:none;"><tr><th>Grid1</th><th>Grid2</th></tr></thead><tbody>';
                var tr = '<tr class="row margin-bottom-20">';
                var td1 = '<td class="col-sm-6 sm-margin-bottom-20 profile-body">';
                var td2 = '<td class="col-sm-6 profile-body">';
                var index  = 0;
                for(var i in response){

                    if(index%2 === 0){
                        td1 = td1 + '<div class="profile-blog"><img class="rounded-x" src="'+response[i].profile.image+'" alt=""><div class="name-location"><strong>'+response[i].user.first_name.toUpperCase()+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+response[i].profile.school_id.toLowerCase()+',</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+response[i].profile.description+'</p><hr><ul class="list-inline share-list">'+enableRequest('{!! $profileStats !!}', response[i].user.id, '{!! json_encode($friends) !!}')+'<li><i class="fa fa-group"></i><a href="#">'+response[i].friendsStats+' Friend(s)</a></li></ul></div>' + '</td>';
                        tr = tr + td1;
                    }
                    if(index%2 === 1){
                        td2 = td2 + '<div class="profile-blog"><img class="rounded-x" src="'+response[i].profile.image+'" alt=""><div class="name-location"><strong>'+response[i].user.first_name.toUpperCase()+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+response[i].profile.school_id.toLowerCase()+',</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+response[i].profile.description+'</p><hr><ul class="list-inline share-list">'+enableRequest('{!! $profileStats !!}', response[i].user.id, '{!! json_encode($friends) !!}')+'<li><i class="fa fa-group"></i><a href="#">'+response[i].friendsStats+' Friend(s)</a></li></ul></div>' + '</td>';
                        tr = tr + td2;
                    }
                    if(Object.keys(response).length%2 === 1 && index === (Object.keys(response).length-1)){
                        td2 = td2 + '' + '</td>';
                        tr = tr + td2;
                    }
                    table = table + tr + '</tr>';
                    index++;
                }
                table = table + '</tbody></table>';
                $("#return").show();
                $(".sTable").replaceWith(table);
                initializeTable(".sTable");
            }
        });
    }

    function initializeTable(className){
        sTable = $(className).dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "sDom": "ltipr",
            "columns": [
                { "className": "col-sm-6 sm-margin-bottom-20 profile-body" },
                { "className": "col-sm-6 profile-body" }
            ],
            "language": {
                "zeroRecords": "No matching records found in your friends list - Please use the search button to find more friends.",
            }
        });
        $('#search').keyup(function () {
            sTable.fnFilter($(this).val());
            var displayRecordCount = $(className).DataTable().page.info().recordsDisplay;
            (displayRecordCount === 0)? $("#load_more").hide(): $("#load_more").show();
        });
    }
    
    function returnFriendsList(){
        var friends = JSON.parse('{!! json_encode($friends)!!}');
        var sTable = $(".sTable").DataTable();
        var table = '<table  class="sTable"><thead style="display:none;"><tr><th>Grid1</th><th>Grid2</th></tr></thead><tbody>';
        var tr = '<tr class="row margin-bottom-20">';
        var td1 = '<td class="col-sm-6 sm-margin-bottom-20 profile-body">';
        var td2 = '<td class="col-sm-6 profile-body">';
        var index  = 0;
        console.log(friends);
        for(var i in friends){

            if(index%2 === 0){
                td1 = td1 + '<div class="profile-blog"><img class="rounded-x" src="'+friends[i].profile[0].image+'" alt=""><div class="name-location"><strong>'+friends[i].user.first_name.toUpperCase()+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+friends[i].school[0].name.toLowerCase()+',</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+friends[i].profile[0].description+'</p><hr><ul class="list-inline share-list">'+enableRequest('{!! $profileStats !!}', friends[i].user.id, '{!! json_encode($friends) !!}')+'<li><i class="fa fa-group"></i><a href="#">'+friends[i].friendsStats+' Friend(s)</a></li></ul></div>' + '</td>';
                tr = tr + td1;
            }
            if(index%2 === 1){
                td2 = td2 + '<div class="profile-blog"><img class="rounded-x" src="'+friends[i].profile[0].image+'" alt=""><div class="name-location"><strong>'+friends[i].user.first_name.toUpperCase()+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+friends[i].school[0].name.toLowerCase()+',</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+friends[i].profile[0].description+'</p><hr><ul class="list-inline share-list">'+enableRequest('{!! $profileStats !!}', friends[i].user.id, '{!! json_encode($friends) !!}')+'<li><i class="fa fa-group"></i><a href="#">'+friends[i].friendsStats+' Friend(s)</a></li></ul></div>' + '</td>';
                tr = tr + td2;
            }
            if(Object.keys(friends).length%2 === 1 && index === (Object.keys(friends).length-1)){
                td2 = td2 + '' + '</td>';
                tr = tr + td2;
            }
            table = table + tr + '</tr>';
            index++;
        }
        table = table + '</tbody></table>';
        $(".sTable").replaceWith(table);
        initializeTable(".sTable");
        $("#return").hide();
        $("#load_more").show();
    }

    function enableRequest(profileStats, user, friendships){
        if(parseInt(profileStats) > 49){
            if(!is_friend(user, JSON.parse(friendships)))return '<li><i class="fa fa-plus"></i><a href="#">Request</a></li>';
            return '<li><i class="fa fa-ban"></i><a href="#">UnFriend</a></li>';
        }
        return '';
    }

    function getImageUrl(img){
        if(img && img !="" && img !=null){
            return "{!! url('student/file') !!}/"+row[i].profile[0].image
        }
        return "{!!asset('public/assets/img/user.jpg')!!}";
    }

    function is_friend(needle, haystack){
        for(var i in haystack){
            if(needle === haystack[i].friend_id) return true;
        }
        return false;
    }

</script>
@stop