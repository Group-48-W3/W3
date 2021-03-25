<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<div class="container">
	<h3 class="heading">User Registration w3</h3>
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
		<button>
		<a href="./../dashboard.php">Back to Admin Panel</a>
		</button>
		<form name="myForm" id="registrationForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			<label for="firstName">First Name</label>
			<input type="text" name="first_name" placeholder="Type your First Name" autocomplete="off" id="firstName"/> 
			
			<label for="lastName">Last Name</label>
			<input type="text" name="last_name" placeholder="Type your Last Name" autocomplete="off" id="lastName"/> 
			
			<label for="emailAddress" >Email</label>
			<input type="text" name="email" placeholder="Type your Email" autocomplete="off" id="emailAddress"/> 
			
			<label for="phone" >Phone</label>
			<input type="text" name="phone" placeholder="Type your Email" autocomplete="off" id="phone"/> 
			
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Type your Password" id="password"/>
			<input type="submit" id="submitForm" value="Submit" name="submit"/>
		</form>
	</div>
</div>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="./../public/js/reg-script.js"></script>
</body>
</html>
