<?php 
	session_start(); 
	require_once('./../../controller/user/usercontroller.php');
	require_once('./../../controller/login/loginController.php');
	$x = 1;
	$_SESSION['u_message'] = 'change';
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Password Change</title>
		<link href="./../../public/css/styles/login.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	</head>
	<style>
		/* The message box is shown when the user clicks on the password field */
		#message {
		display:none;
		background: #f1f1f1;
		color: #000;
		position: relative;
		padding: 15px;
		margin-top: 10px;
		}

		#message p {
		padding: 10px 25px;
		font-size: 12px;
		}

		/* Add a green text color and a checkmark when the requirements are right */
		.valid {
		color: green;
		}

		.valid:before {
		position: relative;
		left: -35px;
		content: "✔";
		}

		/* Add a red text color and an "x" icon when the requirements are wrong */
		.invalid {
		color: red;
		}

		.invalid:before {
		position: relative;
		left: -35px;
		content: "✘";
		}
	</style>
	<?php
		$code = rand(1000000,9999999);
		$temp = $code;
		if(isset( $_POST['code_send'])){
			$to_email = $_POST['sender_email'];
			$subject = "Request to change the password";
			$body =  "you have requested to change the password. Your verification code is "." ".$code;
			$headers = "From: w3contracts@gmail.com";
			
			$_SESSION['randNum'] = $code;
			$_SESSION['sender_mail'] = $to_email;


			$sendMail = mail($to_email, $subject, $body, $headers);
		}
		if(isset( $_POST['auth_user'])){
			
			$verify_code = $_POST['code_verify'];
			echo $verify_code;
			echo $_SESSION['sender_mail'];
			if($verify_code == $_SESSION['randNum']){
				$GLOBALS['x'] = 2;
			}
		}
		if(isset( $_POST['change_pass'])){
			if($_POST['new_password'] == $_POST['confirm_password']){
				changepassword($_POST['new_password']);
			}
			$_SESSION['u_message'] = 'change';
			header('location:./../../');//redirection
		}
	?>
	<!-- Body starts -->
	<body>
		<div class="box">
			<div class="column left">
				<img src="./../../public/img/logo.png">
				<p>© W3 Contracts, Willorawatta. 1993-2020</p>
			</div>
			<?php if($GLOBALS['x'] == 1): ?>
			<div class="column right">
				<img src="./../../public/img/wave.svg" width="68px" height="68px">
				<h2>Forgot password</h2>
				<h6>Input the code below which you get into your email</h6>
				<div class="form-container content-center">
					<?php 
						if(isset($errorMsg)){
							echo '<div class="alert alert-danger">'.$errorMsg.'</div>';
							unset($errorMsg);
						}
					?>  
					<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
						<div class="container">
							<div class="row">
							<label for="exampleInputEmail1">Email address</label>
								<div class="col-9">
									<input class="form-control" name="sender_email" type="email" placeholder="Enter Email" required>
								</div>
								<div class="col-3">
									<button class="btn-small" type="submit" name="code_send">Send</button>
								</div>
							</div>
						</div>
						
					</form>
					<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<div class="container">
						<div class="row">
							<label for="exampleInputPassword1">Verification Code</label>
							<div class="col-9">
								<input class="form-control" name="code_verify" type="text" placeholder="Verification code" required>
							</div>
							<div class="col-3">
								<button class="btn-small" type="submit" name="auth_user">Verify</button>
							</div>
						</div>
					</div>
					</form>
					<a class="btn btn-primary btn-block" href="./../../" style="text-decoration: none">Back to Login</a>
				</div>
			</div>
			<?php endif; ?>
			<?php if($GLOBALS['x'] == 2): ?>
				<div class="column right">
				<img src="./../../public/img/wave.svg" width="68px" height="68px">
				<h2>New Password</h2>
				<div class="form-container">
					<?php 
						if(isset($errorMsg)){
							echo '<div class="alert alert-danger">'.$errorMsg.'</div>';
							unset($errorMsg);
						}
					?>  
					<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
						<div class="form-group">
							<label>New Password</label>
							<!-- <input class="form-control" type="password" name="new_password" placeholder="Password" required> -->
							<input type="password" class="form-control" name="new_password" placeholder="Password"
							id="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" required>
						</div>
						<button class="btn btn-primary btn-block" type="submit" name="change_pass">Change</button>
					</form>
					<div id="message">
						<h4>Password must contain the following(Password Tips):</h4>
						<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
						<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
						<p id="number" class="invalid">A <b>number</b></p>
						<p id="length" class="invalid">Minimum <b>8 characters</b></p>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</body>
	<!-- Body ends -->
	<script>
		var myInput = document.getElementById("new_password");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");

		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
		document.getElementById("message").style.display = "block";
		}

		// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
		document.getElementById("message").style.display = "none";
		}

		// When the user starts to type something inside the password field
		myInput.onkeyup = function() {
		// Validate lowercase letters
		var lowerCaseLetters = /[a-z]/g;
		if(myInput.value.match(lowerCaseLetters)) {  
			letter.classList.remove("invalid");
			letter.classList.add("valid");
		} else {
			letter.classList.remove("valid");
			letter.classList.add("invalid");
		}
		
		// Validate capital letters
		var upperCaseLetters = /[A-Z]/g;
		if(myInput.value.match(upperCaseLetters)) {  
			capital.classList.remove("invalid");
			capital.classList.add("valid");
		} else {
			capital.classList.remove("valid");
			capital.classList.add("invalid");
		}

		// Validate numbers
		var numbers = /[0-9]/g;
		if(myInput.value.match(numbers)) {  
			number.classList.remove("invalid");
			number.classList.add("valid");
		} else {
			number.classList.remove("valid");
			number.classList.add("invalid");
		}
		
		// Validate length
		if(myInput.value.length >= 8) {
			length.classList.remove("invalid");
			length.classList.add("valid");
		} else {
			length.classList.remove("valid");
			length.classList.add("invalid");
		}
		}
	</script>
	<script src="./../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</html>