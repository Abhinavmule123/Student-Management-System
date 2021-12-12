$(document).ready(function(){
    $("#login-form").submit(function(e){
        e.preventDefault();
        const email = btoa($("#lemail").val());
        const password = btoa($("#lpassword").val());
      
        $.ajax({
            type : 'POST',
            url  : "php/login.php",
            data : {
                email : email,
                password:password
            },
            beforeSend : function(){
                $("#login-btn").html("<span class='spinner-border spinner-border-sm'></span> Loading..");   
            },
            success : function(response){
                $("#login-btn").html("Login");
                if(response.trim() == "login success"){
                    window.location = "dashboard.html";
                }else if(response.trim() == "login failed"){
                    console.log(response);
                }
            }
        });
    });
});



function check(){
   $.ajax({
       type :'POST',
       url : "php/checkUser.php",
       success : function(response){
        if(response.trim() == "success"){
            window.location = "dashboard.html";
        }
    }
   });
}