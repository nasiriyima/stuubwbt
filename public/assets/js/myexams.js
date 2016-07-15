/**
 * Created by Asibi on 7/2/2016.
 */
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

var examwindow = window;

function openTestWindow(body,category,subject){
    var w = screen.width;
    var h = screen.height;
//        var s = w+"px "+h+"px";
//        $("body").css("background-size",s);
    examwindow.open(sessionsurl+"/"+body+"/"+category+"/"+subject,'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+w+',height='+h);
}