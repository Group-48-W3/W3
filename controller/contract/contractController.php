<?php
require_once("./../../model/contractModel.php");
if(isset($_POST['contractadd'])){
    echo "condition";
    $con = new Contract();          
    $con->addContract();
    
}

class Contract{
    // 
    function __construct(){
        //echo "constrctor";
        
    }
    function addContract(){
        $con_name = $_POST['con_name'];
        $con_start_date = $_POST['con_start_date'];
        $con_end_date = $_POST['con_end_date'];
        $con_location = $_POST['con_location'];
        $con_description = $_POST['con_description'];
        $con_status = $_POST['con_status'];
        $con_payment = $_POST['con_payment'];
        $c_name = $_POST['c_name'];
        $c_address = $_POST['c_address'];
        $c_company = $_POST['c_company'];
        $c_mobile = $_POST['c_mobile'];
        $c_email = $_POST['c_email'];

        addContractDB($con_name,$con_start_date,$con_end_date,$con_location,$con_description,$con_status,$con_payment);
        echo '<script>alert("Successfully Add Contract")</script>'; 
        
        $id = 10;
        //$temp = './../../view/contract/contractSinglePage.php?con_id='.$id;
        header('location: ./../../view/contract/contractAdd.php');
        //echo $temp."</br>";
        //$this->addClient();
    }
    function addClient(){

        echo "add client";
        $c_name = $_POST['c_name'];
        $c_address = $_POST['c_address'];
        $c_company = $_POST['c_company'];
        $c_mobile = $_POST['c_mobile'];
        $c_email = $_POST['c_email'];
        // call the model
        addClientDB($c_name,$c_address,$c_company,$c_mobile,$c_email);
        echo '<script>alert("Successfully Add Contract & Client")</script>';
        $id = $this->getContractIdByName($_POST['con_name']);
        
        $row = mysqli_fetch_array($id);
        echo $row[0];
    }
    function getContractIdByName($name){
        // 
        echo $name;
        $value = getContractIdDB($name);
        echo $value;
        return $value;
    }
}



?>