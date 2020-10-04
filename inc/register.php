<?php
require_once("config.php");
 
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
 
 
?>
<?php require_once('view/login/register_view.php'); ?>	
