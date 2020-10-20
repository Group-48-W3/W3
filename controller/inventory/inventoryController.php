<?php
// include model
    require_once("./../../model/inventoryModel.php");


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

    if(isset($_POST['replenishTool'])){
        $inv = new Inventory();
        $inv->replenishTool();
    } 

    if(isset($_POST['issueRawMaterial'])){
        $inv = new Inventory();
        $inv->issueRawMaterial();
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

        function issueRawMaterial(){
            $materialId = $_POST['materialId'];
            $quantity = $_POST['issueAmount'];
            $contract = $_POST['issueContract'];
            $employeeDetails = $_POST['employeeDetails'];

            if(!empty($materialId) && !empty($quantity) && !empty($contract) && !empty($employeeDetails)){
                $availableQuantity = getColumnFromRawMaterial($materialId, "mat_qty");
                $reorderValue = getColumnFromRawMaterial($materialId, "min_qty");

                if($availableQuantity - $quantity > $reorderValue){
                    //issue
                }else if($availableQuantity - $quantity <= $reorderValue){
                    if($availableQuantity - $quantity < 0){
                        //issue_failed
                    }else{
                        //warning
                    }
                }
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/issueConfirm.php');//redirection
            exit;
        }  

        function addToMaintenance($toolId){
            //
        }

        function removeFromMaintenance($maintenanceId){
            //
        }

    }

?>

