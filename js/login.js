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
                    $("#notice-msg").html(`<div class="container p-3">
                    <div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>E-mail ID or Password Incorrect  !</strong>
                    </div>
                    </div>`);

                    setTimeout(()=>{
                        $("#notice-msg").html("");
                    },2000);
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