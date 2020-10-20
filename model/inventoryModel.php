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

?>