<?php
require_once("./../../inc/config.php");

function addContractDB($con_name,$con_start_date,$con_end_date,$con_location,$con_description,$con_status,$con_payment){
    global $conn;
    $sql = "insert into contract VALUES ('','$con_name','$con_start_date','$con_end_date','$con_location','$con_description','$con_status','$con_payment','1','1')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
function addClientDB($c_name,$c_address,$c_company,$c_mobile,$c_email){
    global $conn;
    $sql = "insert into client VALUES (' ','$c_name','$c_address','$c_company','$c_mobile','$c_email')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
function getContractIdDB($name){
    global $conn;
    $sql = "select con_id from contract WHERE con_name='$name'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "New record created successfully !";
       
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
    mysqli_close($conn);
    return $result;
}
?>