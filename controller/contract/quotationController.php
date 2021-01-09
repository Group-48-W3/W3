<?php
require_once("./../../model/quotationModel.php");

class Quotation{
    // constructor function
    function __construct(){
        //"here is constructor";
        $this->index();
    }
    // index function
    function index(){
        // include the abstract data input for the functions
    }
    // add quotation controller function
    function addQuotation($item_no,$name,$description,$quantity,$discount){
        // add a new quotation
    }
    // get all quotations
    function getAllQuotation(){
        $res =  getAllQuotationDB();
        return $res;
        
    }
    function getSingleQuotation(){

    }
    
}
?>