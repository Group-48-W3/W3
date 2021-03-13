<?php
// include model
    require_once("./../../model/inventory/rawMaterialModel.php");

    if(isset($_POST['addNewRawMaterialCategory'])){
        // echo "condition";
         $con = new RawMaterial();     
         $con->addRawMaterialCategory();
     }

     if(isset($_POST['replenishRawMaterial'])){
        // echo "condition";
         $con = new RawMaterial();     
         $con->replenishRawMaterial();
     }
     
    class RawMaterial{
        function __construct(){
            $this->index();
        }
        function index(){
            //
        }
        function addRawMaterialCategory(){
            $materialName = $_POST['materialName'];
            $materialDescription = $_POST['materialDescription'];
            $materialReorderValue = $_POST['materialReorderValue'];
            $materialAbcCategory = $_POST['materialAbcCategory'];

            if(!empty($materialName) && !empty($materialDescription) && !empty($materialReorderValue) && !empty($materialAbcCategory)){
                if(isInRawMaterial($materialName)){
                    echo "<script>
                    if (confirm('Material Already Exists!')) {
                        window.location.replace(\"./../../view/inventory/replenish.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/replenish.php\");
                    }</script>";
                }else{
                    //get owner permission to execute following command
                    insertRawMaterialCategory($materialName, $materialDescription, $materialReorderValue, $materialAbcCategory);
                }
            }else{
                echo 'All fields are required';
            }
            //header('location:./../../view/inventory/replenishOwnerPermission.php');//redirection
            exit;
        }

        function getAllRawMaterialCategory(){
            // select all raw material categories from db
            $res =  selectAllRawMaterialCategories();
            return $res;
            
        }

        function replenishRawMaterial(){
            $replenishMaterialId = $_POST['inventoryCode'];
            $replenishMaterialAmount = $_POST['replenishMaterialAmount'];
            $replenishUnitPrice = $_POST['replenishUnitPrice'];
            $replenishLocation = $_POST['replenishLocation'];
            $replenishPeriod = $_POST['replenishPeriod'];
            $replenishSupplier = $_POST['replenishSupplier'];
            $replenishDelivery = $_POST['replenishDelivery'];

            if(!empty($replenishMaterialId) && !empty($replenishMaterialAmount) && !empty($replenishUnitPrice) && !empty($replenishLocation) && !empty($replenishPeriod) && !empty($replenishSupplier) && !empty($replenishDelivery)){
                addNewBatch($replenishMaterialId, $replenishMaterialAmount, $replenishUnitPrice, $replenishLocation, $replenishPeriod, $replenishSupplier, $replenishDelivery);
            }else{
                echo 'All fields are required';
            }
            //redirection
            exit;
        }

        function getBatchDetails($inventoryCode){
            $res =  getBatchDetailsDB($inventoryCode);
            return $res;
        }

        function getAllBatchDetailsOf($inventoryCode){
            $res = getAllBatchDetailsWhere($inventoryCode);
            return $res;
        }



        function getAllRawMaterial(){
            // select all raw material categories from db
            $res =  selectAllRawMaterial();
            return $res;
            
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
        
    }

?>
    