$(function(){
    function checkUsernameNotNull(){
        if($("#userName").val()==''){
            $("#userNameInfo").html("用户名不能为空");
            $("#userNameInfo").css("color","red");
            return false;
        }else{
            $("#userNameInfo").html("");
            return true;
        }
    }
    $("#userName").blur(function(){
        checkUsernameNotNull();
    });
    $("#insertUserSubmit").click(function(){
        if(checkUsernameNotNull()){
            var url = $("#newUser").attr("submitUrl");
            var teles = {};
            var i = 0;
            $.each($("span[role='teles']"),function(){
                teles[i] = $(this).attr("data-telephone");
                i++;
            });
            var telephone = $("#telephone").val();
            if(telephone !== ''){
                teles[i] = telephone;
            }
            $.ajax({
                url:url,
                data:{
                    name:$("#userName").val(),
                    telphone:teles,
                    sex:$("#userSex").val(),
                    company:$("#userCompany").val(),
                    content:$("#userContent").val(),
                    carId:$("#carIdStep2").val()
                },
                dataType:'json',
                type:'POST',
                success:function(res){
                    if(res.status){
                        $("#exitsUser").val(res.data);
                        location.href = "#insertStepThree";
                    }else{
                        alert(res.msg);
                    }
                },
                error:function(){
                    alert("系统错误");
                }
            });
        }else{
            return false;
        }
    });
    //$('#addTelephone').on('click',function (){
    $('#addTelephone').click(function (){
        pattern =  /^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$/;
        var lastTel = $("#telephone").val();
        alert(lastTel);
        if(pattern.test(lastTel)){
            $("#telephone").parent().before('<span role="teles" data-iconpos="right" data-role="button" data-icon="minus" data-telephone="'+lastTel+'">'+lastTel+'</span>');
            $("#addTelephone").prev().remove();
            $("#addTelephone").before('<input type="text" id="telephone" name="telephone[]">');
            //console.log($('#telephone').parent());
            $("#telephone").parent().trigger("create");
        }else{
            alert("手机号错误，请确认后重试");
            return false;
        }
    });
    $("#userParent").delegate('span','click',function(){
        var role = $(this).attr("role");
        if(role == "teles"){
            $(this).remove();
        }
    });
    $("#skipDetail").click(function(){
        var data = {};
        data['brand'] = $("#brand").val();
        data['series'] = $("#series").val();
        data['mailage'] = $("#mailage").val();
        $.each(data,function(key,val){
            if(val!==''){
                var isOrNo = confirm("注：跳过会丢失当页已填写的数据,是否继续跳过？");
                if(isOrNo==true){
                    location.href = "#insertSuccess";
                    return true;
                }else{
                    return false;
                }
            }
        });
        location.href = "#insertSuccess";
    });
    $("#insertDetailSubmit").click(function(){
        var vin = $('#vin').val();
        if(vin.length>0&&vin.length!=17){
            alert("vin填写错误");
            return false;
        }
        $.ajax({
            url:$("#insertStepThree").attr("submitUrl"),
            data:{
                carId : $("#carIdStep2").attr('value'),
                vin:vin,
                brand : $("#brand").val(),
                series : $("#series").val(),
                mailage : $("#mailage").val()
            },
            dataType : "json",
            type : "post",
            success:function(data){
                if(data.status==1){
                    location.href = "#insertSuccess";
                }else{
                    alert("操作失败，请重试");
                }
            },
            error:function(){
                alert("系统发生错误，请重试");
            }
        });
    });
});
