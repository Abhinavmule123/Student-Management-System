<?php 
    $db = new mysqli("localhost","root","","sms");

    if($db->connect_error){
        die("Connection failed");
    }
?>