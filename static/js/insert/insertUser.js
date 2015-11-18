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
                    telphone:$('.telphonehidden').val(),
                    sex:$("#userSex").val(),
                    conpany:$("#userCompany").val(),
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
    $('#addTelephone').on('click',function (){
        var lastTel = $("#telephone").val();
        $("#telephone").parent().before('<span class="telephone" data-iconpos="right" data-role="button" data-icon="minus" data-telephone="'+lastTel+'">'+lastTel+'</span>');
        $("#addTelephone").prev().remove();
        $("#addTelephone").before('<input type="text" id="telephone" name="telephone[]">');
        //console.log($('#telephone').parent());
        $("#telephone").parent().trigger("create");
    });
    $('.telephone').delegate('click',function(){
        alert("adadad");
    });
});
