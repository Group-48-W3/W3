<?php
require_once("./../../model/quotationModel.php");
require_once("./../../model/activityModel.php");

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
    function addQuotation($item_no,$name,$description,$budget,$quantity,$discount,$con_id){
        // add a new quotation
        $quotation = new QuotationModel();
        $activity = new activityModel();
        $res = $quotation->addQuotationDB($item_no,$name,$description,$budget,$quantity,$discount,$con_id);
        if($res){
            $quo_id = mysqli_fetch_array($quotation->lastIndexDB());
            $res1 = $activity->addActivityforQuotationDB($name,$quo_id['q_id'],$con_id);
            header('location: ./contractSinglePage.php?con_id='.$con_id);
        }else{
            echo "Error on Model";
        }
        
    }
    // get all quotations
    function getAllQuotation(){
        $quotation = new QuotationModel();
        $res =  $quotation->getAllQuotationDB();
        return $res;
        
    }
    function getAllQuotationContract($con_id){
        $quotation = new QuotationModel();
        $res =  $quotation->getAllQuotationContractDB($con_id);
        return $res;
        
    }
    function getQuotationTotContract(){
        $quotation = new QuotationModel();
        $res =  $quotation->getQuotationTotContractDB();
        return $res;
    }
    function getSingleQuotation($q_id){
        // to be implemented
        $quotation = new QuotationModel();
        $res =  $quotation->getSingleQuotationDB($q_id);
        return $res;
    }
    function updateQuotation($quo_id,$q_item,$q_name,$q_desc,$q_budget,$q_discount){
        // 
        $quotation = new QuotationModel();
        $res = $quotation->updateQuotationDB($quo_id,$q_item,$q_name,$q_desc,$q_budget,$q_discount);
        if($res){
            echo "quotation update successfully";
            header('location: ./quotationSinglePage.php?q_id='.$quo_id);
        }else{
            echo "quotation updation has an error";
        }
    }
    function deleteQuotation($quo_id,$con_id){
        //
        $quotation = new QuotationModel();
        $res = $quotation->deleteQuotationDB($quo_id);
        if($res){
            echo "quotation deleted successfully";
            header('location: ./contractSinglePage.php?con_id='.$con_id);
        }else{
            echo "problem having deleting the quotation";
        }
    }
    
}
?>