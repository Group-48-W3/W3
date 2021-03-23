<?php
require_once("./../../model/contractModel.php");
require_once("./../../model/activityModel.php");
require_once("./../../model/quotationModel.php");
require_once("./../../model/itemModel.php");

class MasterRep{
 function conDetails($con_id,$start_date,$end_date){
    $res = getSingleActiveContractDB($con_id);
    return $res;
 }
 function clientDetails($c_id){
    $res = getSingleClientDB($c_id);
    return $res;
 }
 function quotationDetails($con_id){
    $quotation = new QuotationModel(); 
    $res = $quotation->getAllQuotationContractDB($con_id);
    return $res;
 }
 function activityDetails($con_id,$start_date,$end_date){
    $activity = new activityModel();
    $res = $activity->getperiodActivityDB($con_id,$start_date,$end_date);

    return $res;
 }
}
class ProgressRep{
    //progress report class
}
class AccountRep{
    //account report class

}
class InventoryRep{
    //inventory report class
}
class EmployeeRep{
    //employee and user report class
}
?>