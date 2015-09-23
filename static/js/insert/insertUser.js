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
            $.ajax({
                url:url,
                data:{
                    name:$("#userName").val(),
                    sex:$("#userSex").val(),
                    conpany:$("#userCompany").val(),
                    content:$("#userContent").val(),
                    carId:$("#carIdStep2").val()
                },
                dataType:'json',
                type:'POST',
                success:function(res){
                    if(res){
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
});
