<!-- This is User Model Class -->
<!-- Core Features
	1. Get User 2. Register User 3. Delete User 4. Update User 5. Get User Role ID
-->
<?php
// import database settings
if(preg_match('/dashboard/', $url)){ 
	require_once("./../config/config.php");
}else{
	require_once("./../../config/config.php");
}

function addUserDB($user_role,$first_name,$last_name,$email,$password){
	// echo("This add user function");
	global $conn;
	$hash = md5($password);
	$sql = "insert into user VALUES ('','$user_role','$first_name','$last_name','$email','$hash')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);

}
function getAllUsers(){
	global $conn;
	$query = "select * from user";
	$result = mysqli_query($conn,$query);

	return $result;
}
function getEmailUser($email){
	global $conn;
	$sql = "select * from user where u_email = '".$email."'";
				
	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);

	if($numRows == 0){
		return 1;
	}else{
		return 0;
	}
}
function getSingleUserDB($id){
	global $conn;
	$sql  = "select * from user WHERE u_id='".$id."'";
	$result = mysqli_query($conn,$sql);

	return $result;
}
function deleterUserById($id){
	global $conn;
	$sql = "delete from user WHERE u_id='" . $id . "'";
	if (mysqli_query($conn, $sql)) {
		return 1;
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
}
function getUserRoleID($id){
	global $conn;
    
    $query = "select r_name from role where  r_id = ".$id;

    $rs = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($rs);
	
	return $row['r_name'];
}

?>