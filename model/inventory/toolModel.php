<?php
    require_once("./../../config/config.php");

    function insertToTool($toolName, $toolPrice, $toolManufacturer, $toolQuantity, $toolReorderValue){
        global $conn;
    }

    function isInTool($toolName){
        global $conn;
        $sql = "select * from tool where mat_name = '".$toolName."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    function updateTool(){
        global $conn;
    }
?>