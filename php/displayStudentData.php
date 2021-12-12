<?php
    require("database.php");

    $sql = "SELECT * FROM students";

    $response = $db->query($sql);

    $student_list = [];
    $count = 0;
    if($response){
    while($data = $response->fetch_assoc()){
        array_push($student_list,$data);
    }
  
    }
    if(empty($student_list)){
        echo "No Student Found";
    }
    else{
        echo json_encode($student_list);
    }

    $db->close();
?>