/* Write here your custom javascript codes */
var examwindow = window;
function getSubjects(exam_body_id,category_id){
    $.ajax({
        url:subjectsurl,
        data:{_token:csrf,exam_body_id:exam_body_id,category_id:category_id},
        method:"post",
        success:function(resp){
            $("."+exam_body_id+"-subjects").html(resp);
        }
    });
}

function openTestWindow(body,category,subject){
        var w = screen.width;
        var h = screen.height;
//        var s = w+"px "+h+"px";
//        $("body").css("background-size",s); 
        examwindow.open(sessionsurl+"/"+body+"/"+category+"/"+subject,'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+w+',height='+h);
}

function getMonth(id,name){
    $("#month").html(name);
    if(name==='Select Month'){
        $("input[name=month]").val("");
    } else {
        $("input[name=month]").val(id);
    }
}

function getSession(id,name){
    $("#session").html(name);
    if(name==='Select Month'){
         $("input[name=session]").val("");
    } else {
         $("input[name=session]").val(id);
    }
}
    
function submitform(){
    if($("input[name=month]").val() && $("input[name=session]").val()){
        $.ajax({
            url:instructionurl,
            method:"post",
            data:$("form").serialize(),
            success:function(resp){
                var data = JSON.parse(resp);
                window.location = data.url;
            }
        });
    } else {
        alert("Please select aa month and session to coninue");
    }
}
    
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
        }else {
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
    });
    
    function updateSelection(question_id,option){
        var selections = $("input[name=selection]").val();
        if(!selections){
            var selection = new Object();
            selection[question_id] = option;
            $("input[name=selection").val(JSON.stringify(selection));
        } else {
            var selection = JSON.parse($("input[name=selection").val());
            selection[question_id] = option;
            $("input[name=selection").val(JSON.stringify(selection));
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
        $("input[name=selection").val(JSON.stringify(selections));
    }
    
    function finish(){
        var selections = new Object();
        selections["selections"] = JSON.parse($("input[name=selection]").val());
        selections["elapsed_time"] = $("#remaining").text();
        selections["_token"] = csrf;
        selections["exam_id"] = exam;
        $.ajax({
            url:examcompleteurl,
            method:"post",
            data:selections,
            success:function(resp){
                window.location = resp;
            }
        });
    }