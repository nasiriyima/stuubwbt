/**
 * Created by Asibi on 7/2/2016.
 */
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
        alert("Please select a month and session to continue");
    }
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