<?php
    require_once("./../../inc/config.php");

    //insert commands
    function insertToRawMaterial($materialName, $materialType, $materialPrice, $materialQuantity, $materialReorderValue){
        global $conn;
        //insert to database
    }

    function insertToTool($toolName, $toolPrice, $toolManufacturer, $toolQuantity, $toolReorderValue){
        global $conn;
    }

    function insertToMaintenance(){
        global $conn;
    }

    function isInRawMaterial($materialName){
        global $conn;
        $sql = "select * from row_material where mat_name = '".$materialName."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
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

    //read commands
    function selectFromRawMaterial(){
        global $conn;
    }

    function selectFromRawMaterial(){
        global $conn;
    }

    //update commands
    function updateRawMaterial(){
        global $conn;
        //
    }

    function updateTool(){
        global $conn;
    }

    //delete commands
    function removeFromMaintenance(){
        global $conn;
    }

?>