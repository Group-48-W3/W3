<?php
    require_once("./../../config/config.php");

    function insertToRawMaterial($materialName, $materialDescription, $materialReorderValue){
        global $conn;
        //insert to database
        $sql = "INSERT INTO `raw_material` (`inv_desc`, `min_qty`, `mat_name`) VALUES ('$materialDescription', '$materialReorderValue', '$materialName')";
        //$sql = "insert into raw_material VALUES ('','$materialName','$materialType','$materialPrice','$materialQuantity','1')";
        if (mysqli_query($conn, $sql)) {
            echo "Raw material category created successfully !";
            
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function insertToRawMaterialDetails($inventoryCode, $materialType, $materialPrice, $materialQuantity){
        global $conn;
        if(empty($materialQuantity)){
            $sql = "INSERT INTO `raw_material_details` (`unit_price`, `mat_type`, `mat_qty`, `inv_code`) VALUES ('$materialPrice', '$materialType', '0', '$inventoryCode')";
        } else {
            $sql = "INSERT INTO `raw_material_details` (`unit_price`, `mat_type`, `mat_qty`, `inv_code`) VALUES ('$materialPrice', '$materialType', '$materialQuantity', '$inventoryCode')";
        }
        if (mysqli_query($conn, $sql)) {
            echo "New raw material inserted successfully !";
            
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function selectAllRawMaterialCategories(){
        global $conn;
        $query = "select * from raw_material";
        $result = mysqli_query($conn,$query);

        return $result;
    }

    function selectAllRawMaterial(){
        global $conn;
        $query = "select * from raw_material_details";
        $result = mysqli_query($conn,$query);

        return $result;
    }

    function isInRawMaterial($materialName){
        global $conn;
        $sql = "select * from raw_material where mat_name = '".$materialName."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    function isInRawMaterialDetails($materialType, $inventoryCode){
        global $conn;
        $sql = "select * from raw_material_details where mat_type = '".$materialType."' and inv_code = '".$inventoryCode."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    function getColumnFromRowMaterial($inventoryCode, $columnName){
        global $conn;
        $sql = "select ".$columnName." from row_material_details where 'inv_code' = '".$inventoryCode."'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //read commands
    function selectFromRawMaterial(){
        global $conn;
    }

    //update commands
    function updateRawMaterial(){
        global $conn;
        //
    }

?>