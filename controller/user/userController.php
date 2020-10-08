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

function addUser(){
	// echo "here we are";
	$user_role = $_POST['user_role'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con_password = $_POST['cpassword'];

	if(!empty($user_role) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($con_password) && !empty($password)){
		if(getEmailUser($email)){
			if($password == $con_password){
				addUserDB($user_role,$first_name,$last_name,$email,$password);
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
	exit;
	
	 
}
//get all users
function getAll(){
	//Do the query
	$res = getAllUsers();
	return $res;
	
}
//update a user
function updateUser(){

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
 
?>
