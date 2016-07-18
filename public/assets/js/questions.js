/* Write here your custom javascript codes */
//var examwindow = window;
//
//function openTestWindow(body,category,subject){
//        var w = screen.width;
//        var h = screen.height;
//        var s = w+"px "+h+"px";
//        $("body").css("background-size",s);
//        examwindow.open(sessionsurl+"/"+body+"/"+category+"/"+subject,'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+w+',height='+h);
//}

function nextQuestion(previous,question_id){
        var next = parseInt(previous) + 1;
        if(next <= totalQuestion){
            $("#question-"+next).css("display","");
            $("#question-"+previous).css("display","none");
            $("input[name=active_question]").val(next);
            if($(".options"+previous).is(":checked")){
                $("#side-menu-badge"+previous).attr("class","badge badge-green pull-right rounded-x");
                $("#question-side-menu"+next).attr("class","active");
                $("#question-side-menu"+previous).attr("class","");
                $(".options"+previous).each(function(index){
                    if($(this).is(":checked")){
                        updateSelection(question_id,$(this).val());
                    }
                });
            } else {
                if(!$("input[name=donot]").is(":checked"))$(".waring-message").modal("show");
                updateSelection(question_id,"0");
                $("#side-menu-badge"+previous).attr("class","badge pull-right rounded-x");
                $("#question-side-menu"+next).attr("class","active");
                $("#question-side-menu"+previous).attr("class","");

            }
        } else {
            if($(".options"+previous).is(":checked")){
                $("#side-menu-badge"+previous).attr("class","badge badge-green pull-right rounded-x");
                $("#question-side-menu"+next).attr("class","active");
                $("#question-side-menu"+previous).attr("class","");
                $(".options"+previous).each(function(index){
                    if($(this).is(":checked")){
                        updateSelection(question_id,$(this).val());
                    }
                });
            } else {
                updateSelection(question_id,"0");
                $("#side-menu-badge"+previous).attr("class","badge pull-right rounded-x");
                $("#question-side-menu"+next).attr("class","active");
                $("#question-side-menu"+previous).attr("class","");

            }
            verifySelections();
        }
    }
    
    function previousQuestion(next,question_id){
        var previous = parseInt(next) - 1;
        if(previous > 0){
            $("input[name=active_question]").val(previous);
            $("#question-"+next).css("display","none");
            $("#question-"+previous).css("display","");
            if($(".options"+next).is(":checked")){
                $("#side-menu-badge"+next).attr("class","badge badge-green pull-right rounded-x");
                $("#question-side-menu"+previous).attr("class","active");
                $("#question-side-menu"+next).attr("class","");
                $(".options"+previous).each(function(index){
                    if($(this).is(":checked")){
                        updateSelection(question_id,$(this).val());
                    }
                });
            } else {
                if(!$("input[name=donot]").is(":checked"))$(".waring-message").modal("show");
                updateSelection(question_id,"0");
                $("#side-menu-badge"+next).attr("class","badge pull-right rounded-x");
                $("#question-side-menu"+previous).attr("class","active");
                $("#question-side-menu"+next).attr("class","");
            }
        }
    }
    
    function gotoQuestion(count){
        var activequestion = $("input[name=active_question]").val();
        $("#question-"+activequestion).css("display","none");
        $("#question-"+count).css("display","");
        if($(".options"+activequestion).is(":checked")){
            $("#side-menu-badge"+activequestion).attr("class","badge badge-green pull-right rounded-x");
            $("#question-side-menu"+count).attr("class","active");
            $("#question-side-menu"+activequestion).attr("class","");
            $(".options"+activequestion).each(function(index){
                if($(this).is(":checked")){
                    updateSelection(activequestion,$(this).val());
                }
            });
        } else {
            if(!$("input[name=donot]").is(":checked"))$(".waring-message").modal("show");
            updateSelection(activequestion,"0");
            $("#side-menu-badge"+activequestion).attr("class","badge pull-right rounded-x");
            $("#question-side-menu"+count).attr("class","active");
            $("#question-side-menu"+activequestion).attr("class","");
        }
        $("input[name=active_question]").val(count);
    }

    $("#remaining").countdown(timeleft, function(event) {
      $(this).html(event.strftime('%Hh %Mm %Ss'));
        //console.log(event.strftime('%H:%M:%S:00'));
        console.log(warningTime);
        if(warningTime === event.strftime('%H:%M:%S:00')){
            var message = "Exam time allowed has almost elapsed please tidy up your work";
            $("#message").html(message);
            $(".finish-waring-message #ok").hide();
            $(".finish-waring-message #cancel").text("OK");
            $(".finish-waring-message").modal("show");
            setTimeout(function(){
                $(".finish-waring-message").modal("toggle");
            },5000);
        }
    }).on("finish.countdown", function(evt){
        var message = "The time allowed for this exam has elapsed and your exam session has expired, you will be redirected to your score board shortly";
        $("#message").html(message);
        $(".finish-waring-message #ok").hide();
        $(".finish-waring-message #cancel").text("OK");
        $(".finish-waring-message").modal("show");
        setTimeout(function(){
            $(".finish-waring-message").modal("toggle");
            finish();
        },10000);

    });

    //window.onbeforeunload = function (event) {
    //    var message = 'Important: Please click on \'Save\' button to leave this page.';
    //    if (typeof event == 'undefined') {
    //        event = window.event;
    //    }
    //    if (event) {
    //        event.returnValue = message;
    //    }
    //    $("#remaining").countdown('destroy');
    //    return message;
    //};
    
    function updateSelection(question_id,option){
        var selections = $("input[name=selection]").val();
        if(!selections){
            var selection = new Object();
            selection[question_id] = option;
            $("input[name=selection]").val(JSON.stringify(selection));
        } else {
            var selection = JSON.parse($("input[name=selection]").val());
            selection[question_id] = option;
            $("input[name=selection]").val(JSON.stringify(selection));
        }
    }
    
    function verifySelections(){
        var selections = JSON.parse($("input[name=selection]").val());
        var notansweredcount = 1;
        var notAnswered = [];
        var message = "";
        $.each(questionids, function(index){
            if(typeof selections[index] === "undefined"){
                notAnswered.push(notansweredcount);
                selections[index] = "0";
            } else {
                if(selections[index]==="0"){
                    notAnswered.push(notansweredcount);
                }
            }
            notansweredcount++;
        });
        if(notAnswered.toString()){
            message = "You are about to submit without selecting options for question: <strong><em>"+notAnswered.toString()+"</em></strong> If you wish to select an option for the skipped questions, you can go back by clicking CANCEL or click OK on this dialog to continue with submission";
        } else {
            message = "You are about to submit your exam, make sure you have verified all your answers";
        }
        $("#message").html(message);
        $(".finish-waring-message").modal("show");
        $("input[name=selection]").val(JSON.stringify(selections));
    }
    
    function finish(){
        var selections = new Object();
        selections["selections"] = getSelections();
        selections["elapsed_time"] = $("#remaining").text();
        selections["_token"] = csrf;
        selections["exam_id"] = exam;
        $.ajax({
            url:examcompleteurl,
            method:"post",
            data:selections,
            success:function(resp){
                $("#remaining").countdown("stop");
                window.location = resp;
            }
        });
    }

    function getSelections(){
        if($("input[name=selection]").val() && typeof $("input[name=selection]").val() !== "undefined" && $("input[name=selection]").val() !== null
            && $("input[name=selection]").val() !== ""){
            verifySelections();
            return JSON.parse($("input[name=selection]").val());
        }
        var selections = {};
        $.each(questionids, function(index){
            selections[index] = "0";
        });
        return selections;
    }