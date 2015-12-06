$(function(){
    $("#findUserBtn").click(function(){
        var url = $("#findUser").attr('selectUrl');
        $.ajax({
            url:url,
            data:{
            },
            dataType:'json',
            type:'POST',
            success:function(res){
                if(res.status==true){
                    $("#userList").html('');
                    $.each(res.data,function(key,value){
                        var htmlConent = "";
                        htmlConent = htmlConent+"<li data-role='list-divider'>"+key+"</li>";
                        var htmlContent2 = "";
                        $.each(value,function(k,v){
                            htmlContent2 = htmlContent2+"<li style='cursor:pointer;text-align: center;' class='user' userId='"+ v.id+"'><span>"+ v.name+"</span></li>";
                        });
                        htmlConent = htmlConent+htmlContent2;
                        $("#userList").append(htmlConent);
                    });
                    $("#userList").listview("refresh");
                }else{
                    alert(res.msg);
                }
            }
        });
    });
    $("#userList").delegate(".user","click",function(){
        console.log($(this));
        var val = $(this).attr("userId");
        var carId = $("#carIdStep2").val();
        var url = $("#findUser").attr('submitUrl');
        $.ajax({
            url:url,
            data:{
                carId:carId,
                userId:val
            },
            type:"POST",
            dataType:"json",
            success:function(data){
                if(data.status==1){
                    $("#exitsUser").attr("value",val);
                    location.href = "#insertStepThree";
                }else{
                    console.log($("#exitsUser").val());
                    alert("添加失败，请重试");
                }
            },
            error:function(){
                alert("请求出错");
            }
        });
    });
});