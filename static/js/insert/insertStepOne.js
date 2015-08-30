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
        }//noticeArea
        if($("#licence_area").val()=='-'){
            $("#noticeArea").css("color","red");
            $("#noticeArea").html("地区编号信息未填写");
            return false;
        }
        if($("#licence_number").val()==''){
            $("#noticeNumber").css("color","red");
            $("#noticeNumber").html("地区编号信息未填写");
            return false;
        }
        $("#licenceForm").submit(function(){

        });
    });
});