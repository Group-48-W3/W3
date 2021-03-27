<?php
require_once("./../../model/contractModel.php");
// require_once("./../controller.php");

if(isset($_POST['contractadd'])){
    $con = new Contract();     
    $con->addContract();
    
}
class Contract{
    // contract class
    function __construct(){
        //echo "This is contract control section";
        
    }
    function addContract(){
        // contract
        $con_name = $_POST['con_name'];
        $con_start_date = $_POST['con_start_date'];
        $con_end_date = $_POST['con_end_date'];
        $con_location = $_POST['con_location'];
        $con_description = $_POST['con_description'];
        $con_status = $_POST['con_status'];
        $con_payment = $_POST['con_payment'];
        // client
        $c_name = $_POST['c_name'];
        $c_address = $_POST['c_address'];
        $c_company = $_POST['c_company'];
        $c_mobile = $_POST['c_mobile'];
        $c_email = $_POST['c_email'];
        
        // adding data in order fill up all columns
        $client = addClientDB($c_name,$c_address,$c_company,$c_mobile,$c_email);
        $c_id = getClientIdDB($c_name);
        $con = addContractDB($con_name,$con_start_date,$con_end_date,$con_location,$con_description,$con_status,$con_payment,$c_id);
        if($con && $client){
           //echo '<script>alert("Successfully Add Contract")</script>';
            $to_email = $c_email;
			$subject = "Thank You for Engage with W3 Contracts";
			$body =  "you have made a new furniture contract with us. Your Contract Name is "." ".$con_name;
			$headers = "From: w3contracts@gmail.com";
			
			$sendMail = mail($to_email, $subject, $body, $headers); 
        }
        
        $id = $this->getContractIdByName($con_name);
        echo $id;
        if($con_status == "Active"){
            header('location: ./../../view/contract/contractSinglePage.php?con_id='.$id);
        }else{
            header('location: ./../../view/contract/contractHome.php');
        }
        
    }
    function getContractIdByName($name){ 
        //echo $name;
        $value = getContractIdDB($name);
        $row = mysqli_fetch_array($value);
        //echo $row['con_id'];
        return $row['con_id'];
    }
    function getAllActiveContracts(){
        $res =  getAllActiveContractsDB();
        
        return $res;
    }
    function getSingleActiveContract($id){
        $res =  getSingleActiveContractDB($id);
        
        return $res;
    }
    
    function getSingleClient($id){
        $res =  getSingleClientDB($id);
        
        return $res;

    }
    function getAllProgressPointContract($con_id){
        $res = getAllProgressPointContractDB($con_id);

        return $res;
    }
    function updateContract($contract_id,$con_name,$con_start_date,$con_end_date,
    $con_location,$con_description,$con_payment,
    $c_id,$c_name,$c_address,$c_company,$c_mobile,$c_email){
        //update the details of a contract
        if(updateContractDB($contract_id,$con_name,$con_start_date,$con_end_date,
        $con_location,$con_description,$con_payment)){
            echo "Update contract success";
            if(updateClientDB($c_id,$c_name,$c_address,$c_company,$c_mobile,$c_email)){
                echo "Update client success";
            }else{
                echo "Error update on client";
            }
            //header('location: ./contractUpdate.php?con_id='.$contract_id);
        }else{
            echo "Error on Contract Updation, please check for relevance of data";
            
        }    
    }
    function updateClient($con_id,$c_id,$c_name,$c_address,$c_company,$c_mobile,$c_email){
        //update the details of a client
        updateClientDB($c_id,$c_name,$c_address,$c_company,$c_mobile,$c_email);
        
    }
    function deleteContract($id){
        $stat = deleteContractDB($id);
        if($stat == 1){
            header('location: ./contractHome.php');
            exit;
        }
    }
}



?>