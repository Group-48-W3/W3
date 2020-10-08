<?php

require_once("./../../inc/config.php");

function addEmployeeDB($emp_nic,$emp_name,$emp_dob,$emp_address,$emp_contact,$emp_type){
    global $conn;
	
	$sql = "insert into employee VALUES (' ','$emp_nic','$emp_name','$emp_dob','$emp_address','$emp_contact','$emp_type')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
function getNICEmployee($nic){
	global $conn;
	$sql = "select * from employee where nic = '".$nic."'";
				
	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);

	if($numRows == 0){
		return 1;
	}else{
		return 0;
	}
}
function getAllEmployeeDB(){
    global $conn;
	$query = "select * from employee";
	$result = mysqli_query($conn,$query);

	return $result;
}
function getSingleEmployeeDB($id){
    global $conn;
    $query = "select * from employee WHERE emp_id = '".$id."'";
    $result = mysqli_query($conn,$query);

    return $result;
}
function deleterUserByNic($nic){
	global $conn;
	$sql = "delete from employee WHERE nic='" . $nic . "'";
	if (mysqli_query($conn, $sql)) {
		return 1;
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
}
?>