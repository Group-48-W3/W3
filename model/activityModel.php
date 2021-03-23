<?php
require_once("./../../config/config.php");

class activityModel{
    function addActivityDB($act_name,$act_desc,$act_date,$con_id){
        global $conn;
        $sql = "insert into activity values ('','$act_name','$act_desc','$act_date',FALSE,'28','$con_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return 1;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
    }
    function addActivityforQuotationDB($name,$q_id,$con_id){
        global $conn;

        $date = date('Y-m-d');
        
        $sql1 = "insert into activity VALUES ('','primary wood provision','$name','$date',FALSE,'$q_id','$con_id')";
        $sql2 = "insert into activity VALUES ('','item strcture','$name','$date',FALSE,'$q_id','$con_id')";
        $sql3 = "insert into activity VALUES ('','wood paint + lacker','$name','$date',FALSE,'$q_id','$con_id')";
        $sql4 = "insert into activity VALUES ('','wood polish','$name','$date',FALSE,'$q_id','$con_id')";
        
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
            //echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function setMarkActivityDB($act_id){
        global $conn;
        $sql = "update activity SET act_complete = TRUE WHERE act_id = '$act_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return 1;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function getProgressContractDB($con_id){
        global $conn;
        $sql = "SELECT COUNT(act_id) FROM activity WHERE con_id='$con_id' AND act_complete = 1";
        $result = mysqli_query($conn, $sql);

        return $result;
    }
    function getTotalActivityContractDB($con_id){
        global $conn;
        $sql = "SELECT COUNT(act_id) FROM activity WHERE con_id='$con_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }
    function getAllTodayActivityDB($date){
        global $conn;
        $sql = "select * from activity WHERE act_date='$date'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function setContractProgressDB($con_id,$date,$progress_val){
        global $conn;
        $sql = "insert into contract_progress VALUES ('','$con_id','$date','$progress_val','')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function getAllActivityCountDB(){
        global $conn;
        $sql = "SELECT COUNT(act_id) as res from activity";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function getAllTodayDoneActivityDB($date){
        global $conn;
        $sql = "SELECT COUNT(act_id) as res from activity WHERE act_date='$date' AND act_complete='1'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function getperiodActivityDB($con_id,$start_date,$end_date){
        global $conn;
        $sql = "select * from activity where act_date between '$start_date' and '$end_date' and con_id ='$con_id';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            //echo $sql;
            return $result;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    function updateActivityDB($act_id,$act_name,$act_desc,$act_date,$act_complete){
        global $conn;
        $sql = "UPDATE activity SET act_name='$act_name', act_desc='$act_desc', act_date='$act_date', act_complete='$act_complete' WHERE act_id='$act_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "activity update successfully !";
            return 1;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
    }
    function deleteActivityDB($act_id){
        global $conn;
        $sql = "delete activity WHERE act_id='$act_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "activity retrived successfully !";
            return 1;
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
    }
}


?>