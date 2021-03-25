<!-- This is profile page -->
<?php 
	session_start();
	require_once('./../../controller/user/userController.php');
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
	$details = mysqli_fetch_array(getSingleUser($_SESSION['u_id']));
	$user_detail = getSingleUser($_SESSION['u_id']);
	$row = mysqli_fetch_array($user_detail);
	//check the user details in frontend before send to backend
	if(isset($_POST['userUpdateAccount'])){
		
		if(sha1($_POST['prev_pass']) == $_SESSION['u_password'] && $_POST['u_new_pass'] == $_POST['u_new_pass_con']){
			updateAccount($_POST['u_email'],$_POST['u_new_pass'],$_SESSION['u_id']);
			header('location:./../../');
		}
	}


?>

<!-- start -->
	<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>My Profile</title>
	<link href="./../../public/css/styles/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>
	<script type="text/javascript" src="./../../public/js/scripts/main.js"></script>
	</head>
	<style>
	/* Style all input fields */

	/* The message box is shown when the user clicks on the password field */
	#message {
	display:none;
	
	position: relative;
	padding: 20px;
	margin-top: 10px;
	}

	#message p {
	padding: 10px 35px;
	font-size: 18px;
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

	/* Add a red text color and an "x" when the requirements are wrong */
	.invalid {
	color: red;
	}

	.invalid:before {
	position: relative;
	left: -35px;
	content: "✖";
	}
	</style>
	<body>
	<!--Top Bar--> 
	<nav class="topbar">
	<ul class="topbar-nav">
		<li class="top-item">
		<a href="./../../index.php?logout=true" class="top-link">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
			<span class="top-link-text">Logout</span>
		</a>
		</li>
		<li class="top-item">
		<a href="./userNotificationPage.php" class="top-link">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
			<path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
			</svg>
		</a>
		</li>
		<li class="top-item">
		<a href="./userProfile.php" class="top-link">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" class="svg-inline--fa fa-user-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>
			<span class="top-link-text"><small>You are login as : <i><?php echo getUserAccessRoleByID($_SESSION['r_id']); ?></i></small><span>
		</a>
		</li>
	</ul>
	</nav>
	<!--End of Top Bar-->

	<div class="content-wrapper">
		<div class="container">
		<h1>User Profile</h1>
		<hr>
		<center>
			<img src="./../../public/img/user_avatar.png" alt="icon" height="150px" width="150px">
		</center>
		
		<h3><small>You are login as :</small><?php echo getUserAccessRoleByID($_SESSION['r_id']); ?></h3>
		<hr>
		
		<h4>Change Profile</h4>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
			<div class="form-group field">
				<input type="text" class="form-field" id="u_firstname" name="u_firstname" value="<?php echo $row["u_firstname"]; ?>">
				<label for="u_firstname" class="form-label">First Name</label>
			</div>
			<div class="form-group field">
				<input type="textarea" class="form-field" id="u_lastname" name="u_lastname" value="<?php echo $row["u_lastname"]; ?>">
				<label for="u_lastname" class="form-label">Last Name</label>
			</div>
			<br>
			<h4>User Account Details</h4>
			<div class="form-group field">
				<input type="text" class="form-field" id="u_email" name="u_email" value="<?php echo $row["u_email"]; ?>">
				<label for="u_email" class="form-label">Email</label>
			</div>
			<h4>Change Password</h4>
			<div class="form-group field">
				<input type="password" class="form-field" " name="prev_pass" value="" required>
				<label for="u_new_pass" class="form-label">Current Password</label>
			</div>
			<div class="form-group field">
				<input type="password" class="form-field" name="u_new_pass" value=""
				 id="u_new_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
				 title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
				 required
				>
				<label for="u_new_pass" class="form-label">New Password(if changing)</label>
			</div>
			<div class="form-group field">
				<input type="password" class="form-field" name="u_new_pass_con" value="" required>
				<label for="u_new_pass_con" class="form-label">Confirm New Password</label>
			</div>
			<div class="right">
				<input type="submit" class="btn btn-primary" name="userUpdateAccount" value="Update User Account">
			</div>
		</form>
		<div id="message">
			<h3>Password must contain the following(Password Tips):</h3>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>
	</div>
	<script>
		var myInput = document.getElementById("u_new_pass");
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
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	