<?php
require_once("./../../config/config.php");

class QuotationModel{
	function getAllQuotationDB(){
		global $conn;
		$query = "select * from quotation";
		$result = mysqli_query($conn,$query);

		return $result;
	}
	function lastIndexDB(){
		global $conn;
		$sql = "select q_id from quotation ORDER BY q_id DESC LIMIT 1";
		$result = mysqli_query($conn, $sql); 
        if ($result) {
            echo "Quotation last index get successfully !";
            return $result;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
	}
	function addQuotationDB($item_no,$name,$description,$budget,$quantity,$discount,$discount_desc,$con_id){
		global $conn;
		$budget = (int)$budget*(1 - ((int)$discount)/100);
		$sql = "insert into quotation VALUES ('','$item_no','$name','$description','$budget','$quantity','$discount','$discount_desc','$con_id')";
        if (mysqli_query($conn, $sql)) {
            echo "Quotation created successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
	}
	function getAllQuotationContractDB($con_id){
		global $conn;
		$query = "select * from quotation where q_con_id = '$con_id'";
		$result = mysqli_query($conn,$query);

		return $result;
	}
	function getSingleQuotationDB($q_id){
		global $conn;
		$query = "select * from quotation where q_id = '$q_id'";
		$result = mysqli_query($conn,$query);

		return $result;

	}
	function getQuotationTotContractDB(){
		global $conn;
		$query = "select q_con_id, sum(q_budget*q_quantity) as value from quotation group by q_con_id";
		$result = mysqli_query($conn,$query);

		return $result;
	}
	function updateQuotationDB($quo_id,$q_item,$q_name,$q_desc,$q_budget,$q_discount,$discount_desc){
		global $conn;
		$sql = "update quotation SET q_item='$q_item',q_name='$q_name',q_desc='$q_desc', q_budget='$q_budget', q_discount='$q_discount', q_discount_desc='$discount_desc'
		WHERE q_id = '$quo_id'";
        if (mysqli_query($conn, $sql)) {
            // echo "Item created successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
	}
	function deleteQuotationDB($quo_id){
		global $conn;
		$sql = "delete from quotation where q_id = '$quo_id'";
        if (mysqli_query($conn, $sql)) {
            echo "Quotation deleted successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        mysqli_close($conn);
	}
}
?>