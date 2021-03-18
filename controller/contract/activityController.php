<?php
require_once("./../../model/contractModel.php");
require_once("./../../model/activityModel.php");


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
    function getProgressContract($con_id){
        $activity = new activityModel();
        $res1 = mysqli_fetch_array($activity->getProgressContractDB($con_id));
        $res2 = mysqli_fetch_array($activity->getTotalActivityContractDB($con_id));
         
        if($res2[0] !=0){
            $result = round(($res1[0]/$res2[0])*100);
            return $result;
        }else{
            return 0;
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