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

    function insertToRawMaterialDetails($inventoryCode, $materialType, $materialPrice, $materialQuantity){
        global $conn;
        if(empty($materialQuantity)){
            $sql = "INSERT INTO `raw_material_details` (`unit_price`, `mat_type`, `mat_qty`, `inv_code`) VALUES ('$materialPrice', '$materialType', '0', '$inventoryCode')";
        } else {
            $sql = "INSERT INTO `raw_material_details` (`unit_price`, `mat_type`, `mat_qty`, `inv_code`) VALUES ('$materialPrice', '$materialType', '$materialQuantity', '$inventoryCode')";
        }
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            if (confirm('Raw Material has been successfully created!')) {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            } else {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            }</script>";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
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

    function getRawMaterialDetailsDB($inventoryCode){
        global $conn;
        $sql = "select * from raw_material_details where inv_code = '".$inventoryCode."'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //read commands
    function getColumnWhere($materialId, $column){
        global $conn;
        $query = "SELECT $column from raw_material_details WHERE mat_id=$materialId";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    //update commands
    function updateRawMaterialAmount($replenishMaterialId, $replenishMaterialAmount){
        global $conn;
        $sql = "update raw_material_details set mat_qty = mat_qty + '".$replenishMaterialAmount."' where mat_id = '".$replenishMaterialId."'";
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