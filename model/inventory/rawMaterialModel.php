<?php
    require_once("./../../config/config.php");

    function insertRawMaterialCategory($materialName, $materialDescription, $materialReorderValue, $materialAbcCategory){
        global $conn;
        //insert to database
        $sql = "INSERT INTO `raw-material-category` (`inv-desc`, `min-qty`, `mat-name`, `abc-category`) VALUES ('$materialDescription', '$materialReorderValue', '$materialName', '$materialAbcCategory')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            if (confirm('Raw Material category has been successfully created!')) {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            } else {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            }</script>";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function isInRawMaterial($materialName){
        global $conn;
        $sql = "select * from `raw-material-category` where `mat-name` = '".$materialName."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    function selectAllRawMaterialCategories(){
        global $conn;
        $query = "select * from `raw-material-category`";
        $result = mysqli_query($conn,$query);

        return $result;
    }

    function addNewBatch($replenishMaterialId, $replenishMaterialAmount, $replenishUnitPrice, $replenishLocation, $replenishPeriod, $replenishSupplier, $replenishDelivery){
        global $conn;
        $date = Date("Y-m-d");
        $sql = "INSERT INTO `raw-material-batch` (`added-date`, `end-date`, `unit-price`, `batch-quantity`, `stored-location`, `inv-code`, `delivered-by`, `supplier`) VALUES ('$date', '$replenishPeriod', '$replenishUnitPrice', '$replenishMaterialAmount', '$replenishLocation', '$replenishMaterialId', '$replenishDelivery', '$replenishSupplier')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            if (confirm('New batch will be added to the stock when owner grants permission. Details have been recorded successfully!')) {
                window.location.replace(\"./../../view/inventory/goodRecieveNote.php\");
            } else {
                window.location.replace(\"./../../view/inventory/goodRecieveNote.php\");
            }</script>";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function getRawMaterialDetailsDB(){
        global $conn;
        $sql = "SELECT * FROM ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function getBatchDetailsDB($inventoryCode){
        global $conn;
        $sql = "SELECT COUNT(`batch-id`) AS `batch-count`, SUM(`batch-quantity`) AS `total-amount`, CAST(AVG(`unit-price`) AS DECIMAL(10,2)) AS `avg-price` FROM `raw-material-batch` WHERE `inv-code`= '$inventoryCode'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function getAllBatchDetailsWhere($inventoryCode){
        global $conn;
        $sql = "SELECT `raw-material-batch`.*, `supplier`.`sup-name` FROM `raw-material-batch` INNER JOIN `supplier` ON `raw-material-batch`.`supplier` = `supplier`.`sup-id` AND `raw-material-batch`.`inv-code`= '$inventoryCode' ORDER BY `added-date`";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    










    function selectAllRawMaterial(){
        global $conn;
        $query = "select * from raw_material_details";
        $result = mysqli_query($conn,$query);

        return $result;
    }

    function isInRawMaterialDetails($inventoryCode){
        global $conn;
        $sql = "select * from raw_material_details where inv_code = '".$inventoryCode."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    //read commands
    function getColumnWhere($materialId, $column){
        global $conn;
        $query = "SELECT $column from raw_material_details WHERE mat_id=$materialId";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    //update commands
    function dd(){
        global $conn;
        $sql = "INSERT INTO `raw-material-batch` set mat_qty = mat_qty + '".$replenishMaterialAmount."' where mat_id = '".$replenishMaterialId."'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            if (confirm('Raw Material details has been successfully updated!')) {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            } else {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            }</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

?>