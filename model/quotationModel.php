<?php
require_once("./../../config/config.php");

class QuotationModel{
	function getAllQuotationDB(){
		global $conn;
		$query = "select * from quotation";
		$result = mysqli_query($conn,$query);

		return $result;
	}
	function addQuotationDB($item_no,$name,$description,$quantity,$discount,$con_id){
		global $conn;
		$sql = "insert into quotation VALUES ('','$item_no','$name','$description','$quantity','$discount','$con_id')";
        if (mysqli_query($conn, $sql)) {
            // echo "Item created successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
	}
}
?>