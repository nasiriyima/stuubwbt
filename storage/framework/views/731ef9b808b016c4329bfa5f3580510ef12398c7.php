<?php $__env->startSection('pagestyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/ladda-buttons/css/custom-lada-btn.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/hover-effects/css/custom-hover-effects.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
    <div class="profile-body margin-bottom-20">
        <form action="javascript:searchQuery()" id="sky-form3" class="sky-form">
           <fieldset>
                <section>
                    <label for="autocomplete" class="input">
                        <i class="hover-hand-cursor icon-append fa fa-search" onclick="searchQuery();"></i>
                        <input type="text" autocomplete="off" name="search" id="search" />
                    </label>
                </section>
           </fieldset>
        </form>
        <div class="margin-bottom-50"></div>
        <table  class="sTable">
            <thead style="display:none;">
                <tr>
                    <th>Grid1</th>
                    <th>Grid2</th>
                </tr>
            </thead>
            <tbody>
            <?php /**/
                $rows = $friends->chunk(2);
            /**/ ?>
                <?php foreach($rows as $row): ?>
                    <tr class="row margin-bottom-20">
                    <?php foreach($row as $data): ?>
                  <?php /**/
                        $rows = $friends->chunk(2);
                        $index = 0;
                    /**/ ?>
                        <?php if($index%2 == 0): ?>
                            <td class="col-sm-6 sm-margin-bottom-20 profile-body">
                                <div class="profile-blog">
                                    <img class="rounded-x" src="<?php echo e((isset($data->friend->profile->image) && $data->friend->profile->image !="" && $data->friend->profile->image !=NULL)? url('student/file').'/'.$data->friend->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($data->friend->profile->first_name); ?>">
                                    <div class="name-location">
                                        <strong><a href="<?php echo e(url('student/friend-profile')); ?>/<?php echo e(\Crypt::encrypt($data->friend->id)); ?>"><?php echo e($data->friend->first_name); ?></a></strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#"><?php echo e(isset($data->profile->address) ? $data->profile->address : ''); ?></a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p><?php echo e(isset($data->friend->profile->school->name) ? $data->friend->profile->school->name : ''); ?></p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li>
                                        <li><i class="fa fa-group"></i><a href="#"><?php echo e($data->friend->friendship()->requestAccepted()->count()); ?> Friends</a></li>
                                        <li><i class="fa fa-share"></i><a href="#">Suggest</a></li>
                                    </ul>
                                </div>
                            </td>
                        <?php endif; ?>
                        <?php if($index%2 == 1): ?>
                            <td class="col-sm-6 profile-body">
                                <div class="profile-blog">
                                    <img class="rounded-x" src="<?php echo e((isset($data->friend->profile->image) && $data->friend->profile->image !="" && $data->friend->profile->image !=NULL)? url('student/file').'/'.$data->friend->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($data->friend->first_name); ?>">
                                    <div class="name-location">
                                        <strong><?php echo e($data->friend->first_name); ?></strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#"><?php echo e(isset($data->profile->address) ? $data->profile->address : ''); ?></a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p><?php echo e($data->friend->profile->school->name); ?></p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li>
                                        <li><i class="fa fa-group"></i><a href="#"><?php echo e($data->friend->friendship()->requestAccepted()->count()); ?> Friends</a></li>
                                        <li><i class="fa fa-share"></i><a href="#">Suggest</a></li>
                                    </ul>
                                </div>
                            </td>
                        <?php endif; ?>
                        <?php if(count($row)%2 == 1 && $index == count($row) -  1): ?>
                            <td class="col-sm-6 profile-body">

                            </td>
                        <?php endif; ?>
                            <?php /**/
                                $index++;
                            /**/ ?>
                    <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="ladda-btn">
            <center>
                <button type="button" class="btn-u btn-u-defaulttext-center ladda-button" data-style="contract" <?php echo e(($friends->total() > 6)? 'style=display:block' : 'style=display:none'); ?> id="load_more">Load Friends</button>
                <button type="submit" class="btn-u" style="display: none;" onclick="returnFriendsList();" id="return">Friend List</button>
            </center>
        </div>
        <?php if($friends->total() > 6): ?>
            <input type="hidden" id="currentPage" name="currentPage" value="<?php echo e($friends->currentPage()); ?>" />
            <input type="hidden" id="nextPage" name="nextPage" value="<?php echo e($friends->currentPage() + 1); ?>" />
        <?php endif; ?>
        <!--End Profile Blog-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescripts'); ?>
<?php /*<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/jquery.lazyload.min.js')); ?>"></script>*/ ?>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/jquery.lazyload.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/plugins/ladda-buttons/js/spin.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/plugins/ladda-buttons/js/ladda.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/plugins/jquery/autocomplete/jquery-ui.js')); ?>"></script>
<?php /*<script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/ladda-buttons.js')); ?>"></script>*/ ?>

<script type="text/javascript">
    var l = Ladda.create(document.querySelector('.ladda-btn button'));
    var savedTableStructure = getTableStructure();
    initialize(".sTable");
    function initialize(tableName){
        return $(tableName).DataTable({
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
                        "zeroRecords": "No matching records found in your friends list - Please use the search button to find friends.",
                    }
                });
    }
    $('#search').keyup(function () {
        $(".sTable").dataTable().fnFilter($(this).val());
        var displayRecordCount = $(".sTable").DataTable().page.info().recordsDisplay;
        if(displayRecordCount < 1){
            $("#load_more").hide();
        }
    });

    $.ajax({
        url: "<?php echo url('student/load-autocomplete'); ?>",
        method: "post",
        data:{ _token:"<?php echo csrf_token(); ?>" },
        success: function(data){
            if(data.session_expired)window.location.replace(data.url);
            $("#search").autocomplete({
                source: function( request, response ) {
                    var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                    response( $.grep( data, function( item ){
                        return matcher.test( item );
                    }) );
                }
            });
        }
    });

    $("#load_more").on("click", function(){
        l.start();
        var nextPage =  parseInt($("#nextPage").val());
        var pageCount = parseInt("<?php echo $friends->count(); ?>");
        if(nextPage <= pageCount){
            $.ajax({
                url: "<?php echo url('student/lazy-load'); ?>",
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
                                td1 = td1 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile[0].image)+'" alt="'+row[i].friend.first_name+'"><div class="name-location"><strong>'+row[i].friend.first_name+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile[0].address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list"><li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li><li><i class="fa fa-group"></i><a href="#">'+row[i].friendship.length+' Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
                                tr.push(td1);
                            }
                            if(index%2 === 1){
                                td2 = td2 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile[0].image)+'" alt="'+row[i].friend.first_name+'"><div class="name-location"><strong>'+row[i].friend.first_name+'</strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile[0].address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list"><li><i class="fa fa-ban"></i><a href="#">Unfriend</a></li><li><i class="fa fa-group"></i><a href="#">'+row[i].friendship.length+' Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
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
                    savedTableStructure = getTableStructure();
                    l.stop();
                }
            });
            return;
        }
        $("#load_more").hide();
    });

    function searchQuery(){
        $(".sTable").DataTable().clear().draw();
        $.ajax({
            url: "<?php echo url('student/search'); ?>",
            method: "post",
            data: {_token:"<?php echo csrf_token(); ?>", searchQuery:$("#search").val()},
            success:function(response){
                if(response.session_expired)window.location.replace(response.url);
                $.each(response, function(index, row){
                    var tr = [];
                    var td1 = '';
                    var td2 = '';
                    var index = 0;
                    for(var i in row){
                        if(index%2 === 0){
                            td1 = td1 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile.image)+'" alt="'+row[i].first_name+'"><div class="name-location"><strong><a href="'+'<?php echo url("student/friend-profile"); ?>/'+row[i].id+'">'+row[i].first_name+'</a></strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile.address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list">'+enableRequest('<?php echo $profileStats; ?>', row[i].id, row[i].first_name, '<?php echo $friendships; ?>')+'<li><i class="fa fa-group"></i><a href="#">'+row[i].friendship.length+' Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
                            tr.push(td1);
                        }
                        if(index%2 === 1){
                            td2 = td2 + '<div class="profile-blog"><img class="rounded-x" src="'+getImageUrl(row[i].profile.image)+'" alt="'+row[i].first_name+'"><div class="name-location"><strong><a href="'+'<?php echo url("student/friend-profile"); ?>/'+row[i].id+'">'+row[i].first_name+'</a></strong><span><i class="fa fa-map-marker"></i><a href="#">'+row[i].profile.address+'</a></span></div><div class="clearfix margin-bottom-20"></div><p>'+row[i].school[0].name+'</p><hr><ul class="list-inline share-list">'+enableRequest('<?php echo $profileStats; ?>', row[i].id, row[i].first_name, '<?php echo $friendships; ?>')+'</li><li><i class="fa fa-group"></i><a href="#">'+row[i].friendship.length+' Friends</a></li><li><i class="fa fa-share"></i><a href="#">Suggest</a></li></ul></div>';
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
                $("#return").show();
            }
        });

    }

    function enableRequest(profileStats, user, name, friendships){
        if(parseInt(profileStats) > 49){
            if(is_me(user)) return '<li><i class="fa fa-user"></i><a href="#">Me</a></li>';
            if(is_pendingFriend(user, JSON.parse(friendships)))return '<li><i class="fa fa-hourglass-half"></i><a href="#">Pending</a></li>';
            if(!is_friend(user, JSON.parse(friendships)))return '<li id="request'+user+'"><i class="fa fa-plus"></i><a href="#" onclick="sendFriendRequest('+user+', \''+name+'\');">Request</a></li>';
            return '<li><i class="fa fa-ban"></i><a href="#">UnFriend</a></li>';
        }
        return '';
    }

    function getImageUrl(img){
        if(img && img !="" && img !=null){
            return "<?php echo url('student/file'); ?>/"+img;
        }
        return "<?php echo asset('public/assets/img/user.jpg'); ?>";
    }

    function is_friend(needle, haystack){
        for(var i in haystack){
            if(needle === haystack[i].friend_id && haystack[i].status === 1) return true;
        }
        return false;
    }

    function is_pendingFriend(needle, haystack){
        for(var i in haystack){
            if(needle === haystack[i].friend_id && haystack[i].status === 0) return true;
        }
        return false;
    }
    function is_me(user){
        var id = parseInt('<?php echo $user->id; ?>');
        if(user === id)return true;
        return false;
    }

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

    function getTableStructure(){
        var tbl = $('.sTable tbody tr').get().map(function(row) {
            return $(row).find('td').get().map(function(cell) {
                return $(cell).html();
            });
        });
        return tbl;
    }


    function returnFriendsList(){
        $(".sTable").DataTable().clear().draw();
        $("#search").val("");
        $.each(savedTableStructure, function(index, value){
            $(".sTable").DataTable().row.add(value).draw()
                    .nodes()
                    .to$()
                    .addClass("row margin-bottom-20");
        });
        $(".sTable").DataTable().search('')
                .columns().search('')
                .draw();
        $("#return").hide();
        if(parseInt("<?php echo $friends->count(); ?>") >= 6)$("#load_more").show();
    }

    function sendFriendRequest(id, name){
        $.ajax({
            url: "<?php echo url('student/friendship-request'); ?>",
            method:"post",
            data: {_token:"<?php echo csrf_token(); ?>", friend:id},
            success:function(response){
                console.log(response);
                if(response.message === "success"){
                    showAlert("info", "Friendship request sent to "+name);
                    $("#request"+id).replaceWith('<li id="pending'+id+'"><i class="fa  fa-hourglass-end"></i><a href="#">Pending</a></li>');
                    return;
                }
            }
        });
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myprofile.myprofile_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>