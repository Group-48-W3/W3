<?php
require_once("./../../inc/config.php");

function getAllQuotationDB(){
    global $conn;
	$query = "select * from quotation";
	$result = mysqli_query($conn,$query);

	return $result;
}

?>