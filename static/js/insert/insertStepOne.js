/**
 * Created by Administrator on 2015/8/30.
 */
$(function(){
    $("#insertSubmit").click(function(){
        //console.log($("#licence_province").val());
        if($("#licence_province").val()=='-'){
            $("#noticeProvince").css("color","red");
            $("#noticeProvince").html("省份信息未填写");
            return false;
        }else{//noticeArea
            var licence_province = $("#licence_province").val();
        }
        if($("#licence_area").val()=='-'){
            $("#noticeArea").css("color","red");
            $("#noticeArea").html("地区编号信息未填写");
            return false;
        }else{
             licence_area = $("#licence_area").val();
        }
        if($("#licence_number").val()==''){
            $("#noticeNumber").css("color","red");
            $("#noticeNumber").html("地区编号信息未填写");
            return false;
        }else{
            var licence_number = $("#licence_number").val();
        }
        var url = $("#insertStepOne").attr("submitUrl");
        $.ajax({
            url:url,
            data:{
                licence_province:licence_province,
                licence_area:licence_area,
                licence_number:licence_number
            },
            dataType:'json',
            type:'POST',
            success:function(res){
                alert(res.msg);
                //switch (res.status){
                    //代码在这里
                //}
            }
        });
    });
    $("#licence_province").blur(function(){
        if($(this).val()=='-'){
            $("#noticeProvince").css("color","red");
            $("#noticeProvince").html("省份信息未填写");
        }else{
            $("#noticeProvince").html('');
        }
    });
    $("#licence_area").blur(function(){
        if($(this).val()=='-'){
            $("#noticeArea").css("color","red");
            $("#noticeArea").html("地区编号信息未填写");
        }else{
            $("#noticeArea").html('');
        }
    });
});