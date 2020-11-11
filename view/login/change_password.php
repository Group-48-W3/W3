<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="./../../public/css/styles/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<?php 
    if(isset( $_POST['change_pass'])){
        if($_POST['new_password'] == $_POST['confirm_password']){
            
        }
    }
?>

<body>
	<div class="box">
		<div class="column left">
			<img src="./../../public/img/logo.png">
			<p>© W3 Contracts, Willorawatta. 1993-2020</p>
		</div>
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
	</div>
</body>
</html>
