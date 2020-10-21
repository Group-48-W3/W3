<?php
// include model
    require_once("./../../model/employeeModel.php");


    if(isset($_POST['addNewRawMaterial'])){
        $inv = new Inventory();
        $inv->addRawMaterial();
    }
 

    if(isset($_POST['addNewTool'])){
        $inv = new Inventory();
        $inv->addTool();
    } 

    if(isset($_POST['replenishRawMaterial'])){
        $inv = new Inventory();
        $inv->replenishRawMaterial();
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



        function addTool(){
            $toolName = $_POST['toolName'];
            $toolPrice = $_POST['toolPrice'];
            $toolManufacturer = $_POST['toolManufacturer'];
            $toolQuantity = $_POST['toolQuantity'];
            $toolReorderValue = $_POST['toolReorderValue'];
    
            if(!empty($toolName) && !empty($toolPrice) && !empty($toolManufacturer) && !empty($toolQuantity) && !empty($toolReorderValue)){
                if(isInTool($toolName)){
                    echo "Material already exist";
                    header('location:./../../view/inventory/issue.php');//redirection
                    exit;
                }else{
                    //get owner permission to execute following command
                    insertToTool($toolName, $toolPrice, $toolManufacturer, $toolQuantity, $toolReorderValue);
                }
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenishOwnerPermission.php');//redirection
            exit;
        }
    
        
        function replenishRawMaterial(){
            $replenishMaterialId = $_POST['replenishRawMaterialId'];
            $replenishMaterialAmount = $_POST['replenishMaterialAmount'];

            if(!empty($replenishMaterialId) && !empty($replenishMaterialAmount)){
                //update database
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenishConfirm.php');//redirection
            exit;
        }













    }


    
   








?>

