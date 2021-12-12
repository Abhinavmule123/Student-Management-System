<?php
    require("database.php");

    $id = $_REQUEST['id'];
    $picPath = $_REQUEST['picPath'];
    if(unlink("../".$picPath)){
    $sql = "DELETE FROM students WHERE id='$id'";

    if($db->query($sql)){
        echo "success";
    }else{
        echo "fail";
    }

}

$db->close();
?>