<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Password Change</title>
<link href="./../../public/css/styles/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
	<div class="box">
		<div class="column left">
			<img src="./../../public/img/logo.png">
			<p>© W3 Contracts, Willorawatta. 1993-2020</p>
		</div>
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
						<input class="form-control" id="exampleInputEmail1" name="email" type="email" placeholder="Enter Email" required>
					</div>
                    <button type="submit" name="login">Send Code</button>
					<div class="form-group">
						<label for="exampleInputPassword1">Verify Code</label>
						<input class="form-control" id="exampleInputCode1" name="password" type="text" placeholder="Code" required>
					</div>
					<button type="submit" name="login">Change Password</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>