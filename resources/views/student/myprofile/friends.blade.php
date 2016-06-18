@extends('student.myprofile.myprofile_layout')

@section('pagestyles')

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
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="{{ asset('public/assets/img/testimonials/img1.jpg') }}" alt="">
                            <div class="name-location">
                                <strong>Mikel Andrews</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="{{ asset('public/assets/img/testimonials/user.jpg') }}" alt="">
                            <div class="name-location">
                                <strong>Natasha Kolnikova</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="{{ asset('public/assets/img/testimonials/img2.jpg') }}" alt="">
                            <div class="name-location">
                                <strong>Sasha Elli</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">3 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">25 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                            <div class="name-location">
                                <strong>Frank Heller</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">7 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">77 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="{{ asset('public/assets/img/testimonials/img2.jpg') }}" alt="">
                            <div class="name-location">
                                <strong>Sasha Elli</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">3 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">25 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>

                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                            <div class="name-location">
                                <strong>Frank Heller</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">7 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">77 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/user.jpg" alt="">
                            <div class="name-location">
                                <strong>John W.A</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">0 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">9 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img5.jpg" alt="">
                            <div class="name-location">
                                <strong>Natalia J.</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">56 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">125 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/user.jpg" alt="">
                            <div class="name-location">
                                <strong>John W.A</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">0 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">9 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img5.jpg" alt="">
                            <div class="name-location">
                                <strong>Natalia J.</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">56 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">125 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="row margin-bottom-20">
                    <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                            <div class="name-location">
                                <strong>Sasha Elli</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">3 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">25 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="col-sm-6 profile-body">
                        <div class="profile-blog">
                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                            <div class="name-location">
                                <strong>Frank Heller</strong>
                                <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><i class="fa fa-bell"></i><a href="#">7 Notifications</a></li>
                                <li><i class="fa fa-group"></i><a href="#">77 Followers</a></li>
                                <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn-u btn-u-default btn-block text-center" id="load_more">Load More</button>
        <!--End Profile Blog-->
    </div>
@stop

@section('pagescripts')
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery.lazyload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        initializeTable(".sTable");
    });

    function searchQuery(){
        var sTable = $(".sTable").DataTable();
        var displayRecordCount = sTable.page.info().recordsDisplay;
        if(displayRecordCount === 0){
            $.ajax({
                url: "{!! url('student/search') !!}",
                method: "post",
                data: {_token:"{!! csrf_token() !!}", searchQuery:$("#search").val()},
                success:function(response){

                    if(response.session_expired)window.location = response.url;

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
    }

    function initializeTable(className){
        sTable = $(className).dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "sDom": "ltipr",
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
        var friends = JSON.parse('{!! json_encode($friends->load('user', 'profile', 'school')) !!}');
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

    function is_friend(needle, haystack){
        for(var i in haystack){
            if(needle === haystack[i].friend_id) return true;
        }
        return false;
    }

</script>
@stop