@extends('student.myprofile.myprofile_layout')

@section('pagestyles')

@stop

@section('pagecontent')
    <div class="profile-body margin-bottom-20">
        <form action="assets/php/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form">
           <fieldset>
                <section>
            <label class="input">
                <i class="icon-append fa fa-search"></i>
                <input type="text" name="search" id="search" />
            </label>
        </section>
               </fieldset>
        </form>
        <div class="margin-bottom-50"></div>
        <table  class="sTable">
            <thead style="display:none;">
                <tr>
                    <th></th>
                    <th></th>
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

        <button type="button" class="btn-u btn-u-default btn-block text-center">Load More</button>
        <!--End Profile Blog-->
    </div>
@stop

@section('pagescripts')
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery.lazyload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        oTable = $(".sTable").dataTable({
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
            oTable.fnFilter($(this).val());
            console.log($(".sTable").DataTable().page.info().recordsDisplay);
        });
    });
</script>
@stop