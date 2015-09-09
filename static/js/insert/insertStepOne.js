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
            $("#noticeNumber").html("车牌信息未填写");
            return false;
        }else{
            var licence_number = $("#licence_number").val();
            var numFlag = checkCarNum();
            if(numFlag==false){
                return false
            }
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
                switch (res.status){
                    case 0 :
                        alert(res.msg);
                        break;
                    case 1 :
                        $("#carIdStep2").attr('value',res.data);
                        location.href = "#insertStepTwo?id="+res.data;
                        break;
                    case 2 :
                        location.href = "#result?id="+res.data;
                        break;
                    default :
                        alert('未知错误');
                        break;
                }
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
        $("#licence_area").html();
        var url = $("#insertStepOne").attr("areaUrl");
        var pCode = $("#licence_province").val();
        $.ajax({
            url:url,
            data:{
                code:pCode
            },
            dataType:'json',
            type:'POST',
            success:function(res){
                var data = res.data;
                var htmlCode = "<option value='-'>-</option>";
                $.each(data,function(key,vals){
                    htmlCode = htmlCode + "<option value='"+vals.code+"'>"+vals.code+"</option>";
                });
                $("#licence_area").html(htmlCode);
            }
        });
    });
    $("#licence_area").blur(function(){
        if($(this).val()=='-'){
            $("#noticeArea").css("color","red");
            $("#noticeArea").html("地区编号信息未填写");
        }else{
            $("#noticeArea").html('');
        }
    });
    $("#licence_number").blur(function(){
        if($("#licence_number").val()=='') {
            $("#noticeNumber").css("color", "red");
            $("#noticeNumber").html("车牌信息未填写");
        }else{
            $("#noticeNumber").html('');
            checkCarNum();
        }
    });
    function checkCarNum(){
        var num = $("#licence_number").val();
        var partten = /^[A-Za-z0-9]{5}$/;
        if(!(partten.test(num))){
            $("#noticeNumber").css("color", "red");
            $("#noticeNumber").html('车牌号格式不正确');
        }
    }
});