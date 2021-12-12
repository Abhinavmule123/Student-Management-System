<?php
    require("database.php");

    $email = base64_decode($_POST['email']);
    $password = md5(base64_decode($_POST['password']));

    $sql = "SELECT email FROM admin WHERE email='$email' AND password='$password'";

    $response =  $db->query($sql);
    
    if($response->num_rows != 0){
        session_start();
        $_SESSION['username'] = $email;
        echo "login success";
    }else{
        echo "login failed";
    }       

    $db->close();

?>