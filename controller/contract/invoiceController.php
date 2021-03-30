<?php
require_once("./../../model/invoiceModel.php");

class Invoice{
    function getAllInvoice(){
        $invo = new InvoiceModel();
        $res = $invo->getInvoiceListDB();

        return $res;
    }
    function saveInvoice($POST){
        $invo = new InvoiceModel();
        $res = $invo->addInvoiceDB($POST);
        if($res){
            echo "Successfully add the invoice";
        }else{
            echo "Error occur in controller";
        }
    }
    function getInvoice($invo_id){
        $invo = new InvoiceModel();
        $res = $invo->getInvoiceDB($invo_id); 

        return $res;
    }
    function getInvoiceItems($invo_id){
        $invo = new InvoiceModel();
        $res = $invo->getInvoiceItemsDB($invo_id); 
        return $res;
    }
    function getIncomebyContract(){
        $invo = new InvoiceModel();
        $res = $invo->getIncomebyContractDB();
        
        return $res;
    }
    function updateInvoice($POST){
        $invo = new InvoiceModel();
        $res = $invo->updateInvoiceDB($POST);
        if($res){
            echo "Successfully update the invoice";
        }else{
            echo "Error occur in controller";
        }
    }
    function deleteInvoice($id){
        $invo = new InvoiceModel();
        $res = $invo->deleteInvoiceDB($id);
        if($res){
            //echo "Successfully delete the invoice";
        }else{
            echo "Error occur in controller";
        }
    }
    
}


?>