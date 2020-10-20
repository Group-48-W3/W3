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