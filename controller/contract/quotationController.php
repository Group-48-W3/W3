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
    function addQuotation($item_no,$name,$description,$quantity,$discount,$con_id){
        // add a new quotation
        $quotation = new QuotationModel();
        $res = $quotation->addQuotationDB($item_no,$name,$description,$quantity,$discount,$con_id);

    }
    // get all quotations
    function getAllQuotation(){
        $quotation = new QuotationModel();
        $res =  $quotation->getAllQuotationDB();
        return $res;
        
    }
    function getSingleQuotation(){

    }
    
}
?>