<?php 
session_start(); 
require_once('./../../controller/user/usercontroller.php');

$x = 1;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Password Change</title>
<link href="./../../public/css/styles/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

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
			//header('location:./change_password.php');//redirection
			//setEmail();
			$GLOBALS['x'] = 2;
		}
	}
	if(isset( $_POST['change_pass'])){
        if($_POST['new_password'] == $_POST['confirm_password']){
            changepassword($_POST['new_password']);
		}
		header('location:./../../');//redirection
    }
?>
<body>
	<div class="box">
		<div class="column left">
			<img src="./../../public/img/logo.png">
			<p>© W3 Contracts, Willorawatta. 1993-2020</p>
		</div>
		<?php if($GLOBALS['x'] == 1): ?>
		<div class="column right">
			<img src="./../../public/img/wave.svg" width="68px" height="68px">
			<h2>Change your password</h2>
            <h6>Input the code below which you get into your email</h6>
			<div class="form-container">
				<?php 
					if(isset($errorMsg)){
						echo '<div class="alert alert-danger">'.$errorMsg.'</div>';
						unset($errorMsg);
					}
				?>  
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input class="form-control" name="sender_email" type="email" placeholder="Enter Email" required>
					</div>
                    <button type="submit" name="code_send">Send Code</button>
					
				</form>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
				<div class="form-group">
						<label for="exampleInputPassword1">Verification Code</label>
						<input class="form-control" name="code_verify" type="text" placeholder="Verification code" required>
					</div>
					<button type="submit" name="auth_user">Change Password</button>
				
				</form>
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
						<input class="form-control" type="password" name="new_password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" required>
					</div>
					<button class="btn btn-primary btn-block" type="submit" name="change_pass">Change</button>
                    <a href="./../../" style="text-decoration:none;">Login with new Password</a>
				</form>
			</div>
		</div>
		<?php endif; ?>
	</div>
</body>
</html>