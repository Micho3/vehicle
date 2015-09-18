$(function(){
    $("#findUserBtn").click(function(){
        var url = $("#findUser").attr('submitUrl');
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
                    $(".user").on("click",function(){
                        var val = $(this).attr("userId");
                        $("#exitsUser").val(val);
                        location.href = "#insertStepThree";
                    });
                }else{
                    alert(res.msg);
                }
            }
        });
    });
});