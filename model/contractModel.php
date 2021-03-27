<?php
require_once("./../../config/config.php");

function addContractDB($con_name,$con_start_date,$con_end_date,$con_location,$con_description,$con_status,$con_payment,$c_id){
    global $conn;
	//$uid = $_SESSION['u_id'];
    $sql = "insert into contract VALUES ('','$con_name','$con_start_date','$con_end_date','$con_location','$con_description','$con_status','$con_payment','','$c_id','2')";
	 if (mysqli_query($conn, $sql)) {
		//echo "contract created successfully !";
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
    
    return $result;
	mysqli_close($conn);
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
function updateContractProgressDB($progress,$con_id){
	global $conn;
    $sql = "update contract SET con_progress = '$progress' WHERE con_id='$con_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //echo "contract progress update successfully !";
		
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
    
    return $result;
	mysqli_close($conn);
}
function getAllProgressPointContractDB($con_id){
	global $conn;
    $sql = "select * from contract_progress WHERE con_id='$con_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //echo "contract point retrive successfully !";
       
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
    
    return $result;
	mysqli_close($conn);
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
function updateContractDB($contract_id,$con_name,$con_start_date,$con_end_date,
$con_location,$con_description,$con_payment){
	global $conn;
	$sql = "update contract SET con_name='$con_name',startdate='$con_start_date',
	enddate='$con_end_date',location='$con_location',con_desc='$con_description',
	payment_method='$con_payment' WHERE con_id='$contract_id'";
	$result = mysqli_query($conn,$sql);
    if ($result) {
        echo "contract updated successfully !";
		return 1;
       
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	}
    mysqli_close($conn);
    
    
}
function updateClientDB($c_id,$c_name,$c_address,$c_company,$c_mobile,$c_email){
	global $conn;
	$query = "update client SET c_name='$c_name',c_address='$c_address',c_company='$c_company',c_mobile='$c_mobile',c_email='$c_email' WHERE c_id = '$c_id'";
	$result = mysqli_query($conn, $query);
    if ($result) {
        echo "client updated successfully !";
		return 1;
       
	} else {
		echo "Error: " . $query . " " . mysqli_error($conn);
		return 0;
	}
    mysqli_close($conn);
}
function deleteContractDB($id){
	global $conn;
	//$query = "delete from contract where con_id = ".$id;
	// flagging the data
	$query = "update contract SET status = 'Inactive' where con_id = $id";
	$result = mysqli_query($conn, $query);
    if ($result) {
        return 1;
       
	} else {
		return 0;
	}
    mysqli_close($conn);
}


?>