<!-- This is User Model Class -->
<!-- Core Features
	1. Get User 2. Register User 3. Delete User 4. Update User 5. Get User Role ID
-->
<?php
// import database settings
if(preg_match('/dashboard/', $url)){ 
	require_once("./../inc/config.php");
}else{
	require_once("./../../inc/config.php");
}

function addUserDB($user_role,$first_name,$last_name,$email,$password){
	// echo("This add user function");
	global $conn;
	$hash = password_hash($password, PASSWORD_DEFAULT);
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
function getUserRoleID($id){
	global $conn;
    
    $query = "select r_name from role where  r_id = ".$id;

    $rs = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($rs);
	
	return $row['r_name'];
}

?>