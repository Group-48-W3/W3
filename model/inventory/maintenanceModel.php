<?php
    require_once("../../../config/config.php");

    function insertToMaintenance(){
        global $conn;
    }

    function isInMaintenance($toolId){
        global $conn;
        $sql = "select * from maintenance where tool_id = '".$toolId."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    function removeFromMaintenance(){
        global $conn;
    }
?>