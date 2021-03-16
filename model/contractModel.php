<?php
require_once("./../../config/config.php");

function addContractDB($con_name,$con_start_date,$con_end_date,$con_location,$con_description,$con_status,$con_payment,$c_id){
    global $conn;
    $sql = "insert into contract VALUES ('','$con_name','$con_start_date','$con_end_date','$con_location','$con_description','$con_status','$con_payment','$c_id','2')";
	 if (mysqli_query($conn, $sql)) {
		echo "contract created successfully !";
		return 1;
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}
function addClientDB($c_name,$c_address,$c_company,$c_mobile,$c_email){
	global $conn;
	$pre_sql = "select con_id from contract order by con_id desc limit 1";

    $sql = "insert into client VALUES (' ','$c_name','$c_address','$c_company','$c_mobile','$c_email')";
	 if (mysqli_query($conn, $sql)) {
		echo "client created successfully !";
		return 1;
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}
function getContractIdDB($name){
    global $conn;
    $sql = "select con_id from contract WHERE con_name='$name'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "contract retrive successfully !";
       
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
    mysqli_close($conn);
    return $result;
}
function getClientIdDB($name){
	global $conn;
	$sql = "select c_id from client WHERE c_name ="."'".$name."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	return $row["c_id"]; 
}
function getAllActiveContractsDB(){
    global $conn;
	$query = "select * from contract where status = 'Active'";
	$result = mysqli_query($conn,$query);

	return $result;
}
function getAllInactiveContractsDB(){
	global $conn;
	$query = "select * from contract where status = 'Inactive'";
	$result = mysqli_query($conn,$query);

	return $result;
}
    
function getSingleActiveContractDB($id){
	global $conn;
	$query = "select * from contract where con_id =".$id;
	$result = mysqli_query($conn,$query);

	return $result;
}
function getSingleClientDB($id){
	global $conn;
	$query = "select * from client where c_id = ".$id;
	$result = mysqli_query($conn,$query);

	return $result;
}
function updateContractDB(){
	return 1;
}
function deleteContractDB($id){
	global $conn;
	$query = "delete from contract where con_id = ".$id;
	$result = mysqli_query($conn, $query);
    if ($result) {
        return 1;
       
	} else {
		return 0;
	}
    mysqli_close($conn);
}


?>