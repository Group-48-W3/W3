<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="assets/css/styles/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
	<div class="box">
		<div class="column left">
			<img src="assets/img/logo.png">
			<p>© W3 Contracts, Willorawatta. 1993-2020</p>
		</div>
		<div class="column right">
			<img src="assets/img/wave.svg" width="68px" height="68px">
			<h2>Welcome Back</h2>
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
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required>
					</div>
					<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
