<?php
require_once("./../../model/contractModel.php");


class Activity{
    // activity constructor
    function __construct(){
        //echo "This is activity control section";
        
    }
    function addActivity(){
        //
         
            
    }
    function addActivityforQuotation(){
        //setup basic activities for each quotation
        
    }
    function getActivityforContract($con_id){ 
        //
        $activity = new activityModel();
        $res = $activity->getAllActivityContractDB($con_id);

        return $res;
    }
    function setMarkActivity($act_id,$con_id){
        $activity = new activityModel();
        $res = $activity->setMarkActivityDB($act_id);

        if($res){
            header('location: ./contractSinglePage.php?con_id='.$con_id);
        }else{
            echo "Error on mark activity";
        }

        
    }
    function updateActivity(){
        //
    }

    function setCompleteActivity($id){
        //
    }

    function deleteActivity($id){
        //
    }
}

?>