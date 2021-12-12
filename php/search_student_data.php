<?php

    require("database.php");

    $query = $_REQUEST['query'];

    $sql = "SELECT * FROM students WHERE (sname like '%$query%') OR (sbranch like '%$query%') OR (syear like '%$query%') OR (bFrom like '%$query%') OR (bTo like '%$query%') OR (saddress like '%$query%') OR (smobile like '%$query%')";

    $response = $db->query($sql);

    $student_list = [];

    if($response){
    while($data = $response->fetch_assoc()){
        array_push($student_list,$data);
    }
    echo json_encode($student_list);
    }else{
        echo "No Student Found";
    }
    $db->close();
?>