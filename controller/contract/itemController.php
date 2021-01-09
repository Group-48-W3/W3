<?php

require_once("./../../model/itemModel.php");

class Item{
    // constructor function
    function __construct(){
        //"here is constructor";
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

        }
    }
}
?>