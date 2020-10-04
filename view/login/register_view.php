<?php
// require_once('view/header.php'); 
// require_once('view/left_sidebar.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
	<h3 class="heading">Registration Form</h3>
	<?php 
		if(isset($errorMsg))
		{
			echo '<div class="error_msg">';
			echo $errorMsg;
			echo '</div>';
			unset($errorMsg);
		}
		
		if(isset($successMsg))
		{
			echo '<div class="success_msg">';
			echo $successMsg;
			echo '</div>';
			unset($successMsg);
		}
		
	?>
	<div class="form-cont">
		<form name="myForm" id="registrationForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			<label for="firstName">First Name</label>
			<input type="text" name="first_name" placeholder="Type your First Name" id="firstName"/> 
			
			<label for="lastName">Last Name</label>
			<input type="text" name="last_name" placeholder="Type your Last Name" id="lastName"/> 
			
			<label for="emailAddress" >Email</label>
			<input type="text" name="email" placeholder="Type your Email" id="emailAddress"/> 
			
			<label for="phone" >Phone</label>
			<input type="text" name="phone" placeholder="Type your Email" id="phone"/> 
			
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Type your Password" id="password"/>
			<input type="submit" id="submitForm" value="Submit" name="submit"/>
		</form>
	</div>
</div>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../assets/js/reg-script.js"></script>
</body>
</html>
<!-- <?php require_once('view/footer.php'); ?>	 -->