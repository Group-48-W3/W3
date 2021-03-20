<?php
require_once("./../../model/contractModel.php");
require_once("./../../model/activityModel.php");


class Activity{
    // activity constructor
    function __construct(){
        //echo "This is activity control section";
        
    }
    function addActivity($act_name,$act_desc,$act_date,$con_id){
        //add a custom activity
        $activity = new activityModel();
        $res = $activity->addActivityDB($act_name,$act_desc,$act_date,$con_id);

        if($res){
            header('location: ./contractSinglePage.php?con_id='.$con_id);
        }else{
            echo "Error on add activity";
        }           
    }
    
    function getActivityforContract($con_id){ 
        // get activities for a single contract
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

    function deleteActivity($id){
        //
    }
}

?>