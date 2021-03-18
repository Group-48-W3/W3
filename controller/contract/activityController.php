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
        echo "in controller";
        $res = $activity->getAllActivityContractDB($con_id);

        return $res;
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