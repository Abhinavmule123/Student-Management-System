<?php
    session_start();
    require("database.php");
    $id = $_REQUEST['studentId'];
    $sname = $_REQUEST['sname'];
    $sbranch = $_REQUEST['sbranch'];
    $fadte = $_REQUEST['fdate'];
    $tdate = $_REQUEST['tdate'];
    $syear = $_REQUEST['syear'];
    $smobile = $_REQUEST['smobile'];
    $saddress = $_REQUEST['saddress'];
    $sphoto = $_FILES['sphoto'];
    $existing_url = $_SESSION['old_url'];
    $check_dir =  is_dir("../students_pic");
    // if($check_dir){

    // }else{
    //     mkdir("../students_pic");
    // }
    ($check_dir) ?  :  mkdir("../students_pic");
            
    $filename = $sphoto['name'];

    $location = $sphoto['tmp_name'];

    $current_url = "students_pic/".$filename;
    
    $correctUrl = (empty($filename))?$existing_url:$current_url;

    if($filename != ""){
    if(unlink("../".$existing_url)){

     if(move_uploaded_file($location,"../students_pic/".$filename)){
        
        $_SESSION['old_url'] = $correctUrl;

        $sql = "UPDATE students SET sname='$sname',sphoto='$correctUrl',sbranch='$sbranch',syear='$syear',bFrom='$fadte',bTo='$tdate',saddress='$saddress',smobile='$smobile' WHERE id='$id'";

            if($db->query($sql)){
                echo "success";
            }else{
                echo "fail";
            }
        }
    }
    }else{
        $sql = "UPDATE students SET sname='$sname',sphoto='$correctUrl',sbranch='$sbranch',syear='$syear',bFrom='$fadte',bTo='$tdate',saddress='$saddress',smobile='$smobile' WHERE id='$id'";

            if($db->query($sql)){
                echo "success";
            }else{
                echo "fail";
            }
    }

    $db->close();
?>