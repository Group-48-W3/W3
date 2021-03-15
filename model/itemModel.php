<?php
require_once("./../../config/config.php");

class ItemModel{

    function addItemDB($item_name,$item_cat,$unit_price){
        global $conn;
        $sql = "insert into furniture_item VALUES ('','$item_name','$item_cat','$unit_price')";
        if (mysqli_query($conn, $sql)) {
            // echo "Item created successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
    }
    function getAllItemsDB(){
        global $conn;
        $sql = "select * from furniture_item";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "all items retrive successfully !";
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
        return $result;
        
    }
    function getSingleItemDB($id){
        global $conn;
        $sql = "select * from furniture_item WHERE item_id = ".$id;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "item retrive successfully !";
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
        return $result;
    }
    function deleteItemDB($id){
        global $conn;
        $query = "delete from furniture_item where item_id = ".$id;
        $result = mysqli_query($conn, $query);
        if ($result) {
            return 1;
           
        } else {
            return 0;
        }
        mysqli_close($conn);
    }
}

?>