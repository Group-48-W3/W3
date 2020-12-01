<?php
// load the model
$_SESSION['u_message'] = '';
if(isset($_POST['login'])){
    loginUser();
}
if(isset($_GET['logout']) && $_GET['logout'] == true){
    userLogout();
}
if(isset($_GET['lmsg']) && $_GET['lmsg'] == true){
    userAccess();
}
// user login
function loginUser(){
        global $conn;
        //echo("This is loginUser");
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$email 		= trim($_POST['email']);
			$password 	= trim($_POST['password']);
			
			$hash = sha1($password);//sha1 hashing
			
			$sql = "select * from user where u_email = '".$email."' and u_password = '".$hash."'";
			$rs = mysqli_query($conn,$sql);
			$getNumRows = mysqli_num_rows($rs);
			
			if($getNumRows == 1)
			{
				$getUserRow = mysqli_fetch_assoc($rs);
				unset($getUserRow['password']);
				
                $_SESSION = $getUserRow;//get user id
                //echo($_SESSION);
							
				header('location:view/dashboard.php');
				exit;
			}
			else
			{
				$_SESSION['u_message'] = 'error';
			}
        }
}
// user logout
function userLogout(){
        session_destroy();
        header("location:index.php");
        exit;
    
}
// access error
function userAccess(){
    $errorMsg = "Login required to access dashboard";
    
}

?>
