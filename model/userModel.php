<!-- This is User Model Class -->
<!-- Core Features
	1. Get User 2. Register User 3. Delete User 4. Update User 5. Get User Role ID
-->
<?php
// import database settings
if (preg_match('/dashboard/', $url)) {
	require_once("./../config/config.php");
} else {
	require_once("./../../config/config.php");
}

function addUserDB($user_role, $first_name, $last_name, $email, $password)
{
	// echo("This add user function");
	global $conn;
	$sql = "insert into user VALUES ('','$user_role','$first_name','$last_name','$email','$password')";
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
function getAllUsers()
{
	global $conn;
	$query = "select * from user";
	$result = mysqli_query($conn, $query);

	return $result;
}
function getEmailUser($email)
{
	global $conn;
	$sql = "select * from user where u_email = '" . $email . "'";

	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);

	if ($numRows == 0) {
		return 1;
	} else {
		return 0;
	}
}
function getSingleUserDB($id)
{
	global $conn;
	$sql  = "select * from user WHERE u_id='" . $id . "'";
	$result = mysqli_query($conn, $sql);

	return $result;
}
function deleterUserById($id)
{
	global $conn;
	$sql = "delete from user WHERE u_id='" . $id . "'";
	if (mysqli_query($conn, $sql)) {
		return 1;
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
}
function getUserRoleID($id)
{
	global $conn;

	$query = "select r_name from role where r_id = " . $id;

	$rs = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($rs);

	return $row['r_name'];
}
function changePasswordDB($pass, $email)
{
	global $conn;

	$sql = "update user set u_password ='" . $pass . "' where u_email ='" . $email . "'";
	if (mysqli_query($conn, $sql)) {
		echo "password changes successfully !";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
function updateAccountDB($email, $pass, $id)
{
	global $conn;

	$sql = "update user set u_password ='" . $pass . "',u_email ='" . $email . "' where u_id ='" . $id . "'";
	if (mysqli_query($conn, $sql)) {
		echo "account changes successfully !";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
function updateUserDB($user_id,$user_role){
	global $conn;

	$sql = "update user set r_id = '$user_role' where u_id = '$user_id'";
	if (mysqli_query($conn, $sql)) {
		echo "user update changes successfully !";
		echo $sql;
		return 1;
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	}
	mysqli_close($conn);
}
function updateUserStatusDB($uid,$time){
	global $conn;
	$sql = "update user set last_login ='" . $time . "' where u_id ='" . $uid . "'";
	if (mysqli_query($conn, $sql)) {
		echo "user status changes successfully !";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
function getAllUserRolesDB(){
	global $conn;
	$sql = "select * FROM role";
	$res = mysqli_query($conn, $sql); 
	if ($res) {
		//echo "user status changes successfully !";
		return $res;
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

?>