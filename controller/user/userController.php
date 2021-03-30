<?php

$url = rawurldecode($_SERVER['REQUEST_URI']);

//match the request url with above urls. 
if(preg_match('/dashboard/', $url)){ 
	require_once("./../model/userModel.php");
}else{
	require_once("./../../model/userModel.php");
}

// isset attributes
if(isset($_POST['userdetails'])){
	addUser();
}
if (isset($_GET['userid'])) {
    deleteUser($_GET['userid']);
}
if (isset($_POST['userUpdateDetails'])) {
    updateUser($_POST['userid']);
}
//////////// class functions//////////////
function addUser(){
	$user_role = $_POST['user_role'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con_password = $_POST['cpassword'];

	if(!empty($user_role) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($con_password) && !empty($password)){
		// check if emails are duplicate
		if(getEmailUser($email)){
			if($password == $con_password){
				// hashing done here
				$hash_pass = sha1($password);
				// call the model class
				addUserDB($user_role,$first_name,$last_name,$email,$hash_pass);
			}else{
				echo("Password Mismatched");
			}
		}else{
			echo "User already exist";
		}	
	}else{
		echo 'All fields are required';
	}
	header('location:./../../view/user/userView.php');
	//exit;	 
}
//get all users
function getAll(){
	//Do the query
	$res = getAllUsers();
	return $res;
	
}
function getSingleUser($id){
	//get a single entry of a particular user
	$res = getSingleUserDB($id);
	return $res;
}
//update a user
function updateUser($id){
	// update a particular user
	$user_id = $_POST['user_id'];
	echo $user_id;
	$user_role = $_POST['r_id'];
	
	if(!empty($user_id) && !empty($user_role)){
		if(updateUserDB($user_id,$user_role)){
			echo "update success";
		}	
	}else{
		echo 'All fields are required';
	}
	//echo "<script>alert('user updated successfully');</script>";
	header('location:./../../view/user/userUpdate.php?updateid='.$user_id);
	
	exit;
}
function updateAccount($email,$password,$id){
	//echo "metana";
	updateAccountDB($email,sha1($password),$id);
}
//delete a user
function deleteUser($id){
	//echo "here we are";
	if(deleterUserById($id)){
		header('location:./../../view/user/userView.php');
		exit;
	}
	
}

//get the user access details
function getUserAccessRoleByID($id){
	$result = getUserRoleID($id);
	
	return $result;
}
// change password
function changepassword($password){
	$hash_pass = sha1($password);//sha1
	$user_email = $_SESSION['sender_mail'];
	
	changePasswordDB($hash_pass,$user_email);// call the model method
}
function checkEmail($email){
	// check for valid email from model
	if(!getEmailUser($email)){
		return 1;
	}else{
		return 0;
	}
}
function updateUserStatus($uid,$time){
	if($uid<=5){
		updateUserStatusDB($uid,$time);
	}else{
		echo "error on update the user status";
	}
}
function getUserStatus(){
	$res = getAllUsers();
	return $res;
}
function getAllUserRoles(){
	$res = getAllUserRolesDB();
	return $res;
}

?>
