<?php
    require("database.php");

    $sname = $_REQUEST['sname'];
    $sbranch = $_REQUEST['sbranch'];
    $fadte = $_REQUEST['fdate'];
    $tdate = $_REQUEST['tdate'];
    $syear = $_REQUEST['syear'];
    $smobile = $_REQUEST['smobile'];
    $saddress = $_REQUEST['saddress'];
    $sphoto = $_FILES['sphoto'];

    $check_dir =  is_dir("../students_pic");
    // if($check_dir){

    // }else{
    //     mkdir("../students_pic");
    // }
    ($check_dir) ?  :  mkdir("../students_pic");
            
    $filename = $sphoto['name'];

    $location = $sphoto['tmp_name'];

    $current_url = "students_pic/".$filename;

    if(move_uploaded_file($location,"../students_pic/".$filename)){
          $sql = "INSERT INTO students (sname,sphoto,sbranch,syear,bFrom,bTo,saddress,smobile) VALUES('$sname','$current_url','$sbranch','$syear','$fadte','$tdate','$saddress','$smobile')";

            if($db->query($sql)){
                echo "success";
            }else{
                echo "fail";
            }
    }
  

    $db->close();

?>