<?php

require_once("./../../model/itemModel.php");

class Item{
    // constructor function
    function __construct(){
        "here is constructor";
        $this->index();
    }
    // index function
    function index(){
        // include the abstract data input for the functions
    }
    function addItem($item_name,$item_cat,$unit_price){
        // add a new item
        $item = new ItemModel();
        $res = $item ->addItemDB($item_name,$item_cat,$unit_price);
        if($res == 1){
            $_SESSION['item_add'] = 'success';
        }else{
            echo "Error occured in add Item to the Database";
        }
    }
    //retrive a singe item
    function getSingleItem($item_id){
        $item = new ItemModel();
        $res = $item->getSingleItemDB($item_id);

        return $res;
    }
    // retrive all items
    function getAllItems(){
        // get all Items
        $item = new ItemModel();
        $res =  $item->getAllItemsDB();
        return $res;
    }
    function updateItem($item_id,$item_name,$item_cat,$unit_price){
        //update an item
        $item = new ItemModel();
        if(!empty($item_name) && !empty($item_cat) && !empty($unit_price)){
            //echo "on controller";
            $res = $item->updateItemDB($item_id,$item_name,$item_cat,$unit_price);
            if($res){
                echo "item updated successfully";
                //header('location: ./itemUpdate.php?item_id='.$item_id);
            }else{
                echo "Error occured in updation, Please check for relevance of details";
            }    
        }else{
            echo "Error on validation";
        }
    }
    function deleteItem($item_id){
        // delete an item
        $item = new ItemModel();
        $item->deleteItemDB($item_id);
        $_SESSION['delete_item'] = "success";
        //echo "controller".$item_id;
    }
}
?>