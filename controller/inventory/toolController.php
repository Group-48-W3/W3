<?php
// include model
    require_once("./../../model/inventory/toolModel.php");

    class Inventory{
        function __construct(){
            $this->index();
        }
        function index(){
            //
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

        function replenishTool(){
            $toolId = $_POST['replenishToolId'];
            $replenishToolAmount = $_POST['replenishToolAmount'];

            if(!empty($replenishToolId) && !empty($replenisToolAmount)){
                //update database
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenishConfirm.php');//redirection
            exit;
        }

        function issueTool(){
            //to-do
        }
    }

?>

