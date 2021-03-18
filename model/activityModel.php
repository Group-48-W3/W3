<?php
require_once("./../../config/config.php");

class activityModel{
    function addActivityforQuotationDB($name,$con_id){
        global $conn;
        
        $sql1 = "insert into activity VALUES ('','primary wood provision','$name','1',FALSE,'$con_id')";
        $sql2 = "insert into activity VALUES ('','item strcture','$name','1',FALSE,'$con_id')";
        $sql3 = "insert into activity VALUES ('','wood paint + lacker','$name','1',FALSE,'$con_id')";
        $sql4 = "insert into activity VALUES ('','wood polish','$name','1',FALSE,'$con_id')";
        
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
        mysqli_query($conn, $sql3);
        mysqli_query($conn, $sql4);
        
        mysqli_close($conn);
    }
    function getAllActivityContractDB($con_id){
        global $conn;
        $sql = "select * from activity WHERE con_id = '$con_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}


?>