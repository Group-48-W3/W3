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
    function updateInvoice(){

    }
    function deleteInvoice(){

    }
}


?>