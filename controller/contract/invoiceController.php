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
    function updateInvoice(){

    }
    function deleteInvoice(){

    }
    function printInvoice(){

    }
}


?>