<?php

$url = rawurldecode($_SERVER['REQUEST_URI']);

//match the request url with above urls. 
if(preg_match('/dashboard/', $url)){ 
	require_once("./../model/userModel.php");
}else{
	require_once("./../../model/userModel.php");
}


if(isset($_POST['userdetails'])){
	addUser();
}



//create a user
function createUser(){
	if(isset($_POST['submit']))
	{
		$firstName 	= htmlentities(trim($_POST['first_name']),ENT_QUOTES);
		$lastName 	= htmlentities(trim($_POST['last_name']),ENT_QUOTES);
		$email 		= htmlentities(trim($_POST['email']),ENT_QUOTES);
		// $phone 		= htmlentities(trim($_POST['phone']),ENT_QUOTES);
		$password 	= htmlentities(trim($_POST['password']),ENT_QUOTES);
		
		
		if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($password))
		{
				
				$sql = "select * from users where email = '".$email."'";
				
				$result = mysqli_query($conn, $sql);
				$numRows = mysqli_num_rows($result);
				
				if($numRows == 0)
				{
					$options = array("cost"=>4);
					$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
					
					$sqlInsert = "insert into tbl_users (first_name, last_name, email, phone, password) values('".$firstName."', '".$lastName."' , '".$email."', '".$hashPassword."')";
					$rs = mysqli_query($conn, $sqlInsert);
					
					if($rs)
					{
						$successMsg = "Form has been saved successfully";
					}
					else
					{
						$errorMsg = "Unable to save user. Please try again";
					}
					
	 
				}
				else
				{
					$errorMsg = "User already exist";
				}
				
		}
		else
		{
			$errorMsg = 'All fields are required';
		}
		
		
	}
}
function addUser(){
	
	$user_role = $_POST['user_role'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con_password = $_POST['cpassword'];

	if($password == $con_password){
		addUserDB($user_role,$first_name,$last_name,$email,$password);
	}else{
		echo("Password Mismatched");
	}
	
	 
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
function deleteUser(){

}

//get the user access details
function getUserAccessRoleByID($id){
	$result = getUserRoleID($id);
	
	return $result;
} 
 
?>
