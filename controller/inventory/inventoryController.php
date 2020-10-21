<?php
// include model
    require_once("./../../model/employeeModel.php");


    if(isset($_POST['addNewRawMaterial'])){
        $inv = new Inventory();
        $inv->addRawMaterial();
    }







    class Inventory{
        function __construct(){
            $this->index();
        }
        function index(){
            //
        }

        function addRawMaterial(){
            $materialName = $_POST['materialName'];
            $materialType = $_POST['materialType'];
            $materialPrice = $_POST['materialPrice'];
            $materialQuantity = $_POST['materialQuantity'];
            $materialReorderValue = $_POST['materialReorderValue'];

            if(!empty($materialName) && !empty($materialType) && !empty($materialPrice) && !empty($materialQuantity) && !empty($materialReorderValue)){
                if(isInRawMaterial($materialName)){
                    echo "Material already exist";
                    header('location:./../../view/inventory/issue.php');//redirection
                    exit;
                }else{
                    //get owner permission to execute following command
                    insertToRawMaterial($materialName, $materialType, $materialPrice, $materialQuantity, $materialReorderValue);
                }
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenishOwnerPermission.php');//redirection
            exit;
        }
    }









?>

