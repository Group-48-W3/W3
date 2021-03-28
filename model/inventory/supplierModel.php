<?php
    require_once("./../../config/config.php");

    function insertToSupplier($supName, $supMail, $supMob, $supAddress, $supCat){
        global $conn;
        $date = date("Y-m-d h:i:sa");
        $sql = "INSERT INTO `supplier` (`sup-name`, `sup-email`, `sup-mobile`, `sup-address`, `category`, `sup-status`, `sup-created-on`) VALUES ('$supName', '$supMail', '$supMob', '$supAddress', '$supCat', true, '$date')";
        if (mysqli_query($conn, $sql)) {
            echo "Supplier created successfully!";
            
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function selectAllSuppliers(){
        global $conn;
        $query = "select * from supplier";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function selectSupplier($supplierID){
        global $conn;
        $query = "SELECT * FROM `supplier` WHERE `sup-id`='$supplierID'";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function selectActiveSuppliers(){
        global $conn;
        $query = "select * from supplier where `sup-status`=1";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function isInSupplier($supName){
        global $conn;
        $sql = "select * from supplier where `sup-name` = '".$supName."'";
				
	    $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 0){
            return 0;
        }else{
            return 1;
        }
    }
?>