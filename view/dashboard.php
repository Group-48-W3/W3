<!-- This is dashboard page -->
<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('./../controller/user/userController.php');
	require_once('header.php'); 
	
?>
<body class="fixed-nav sticky-footer" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid">
	  <?php if(($_SESSION['u_password']) == sha1('12345')): ?>
		<div class="alert alert-warning">
			<a href="./user/userProfile.php" style="text-decoration: none"><b>Hello New User, you are currently using a temporary password. Please change it from the profile page into a new one.</b></a>
		</div>
	  <?php endif; ?>
      <h1>Welcome to W3 Contract Management System</h1>
	  <hr>
	  <center>
		  <img src="./../public/img/logo.png" alt="icon" height="150px" width="150px">
	  </center>
      
	  <hr>
      <h2>
	  Special Notices:
	  </h2>
	  <div class="container"style="border-style: solid">
		  <h4>Salary Payments of Month October/November 2020</h4>
		  <p>Members of staff and employees in contract #6 and #13 and receive their paysheets in this week</p>
		  <p><?php echo "Posted: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
	  </div>
	  <br>
	  <div class="container"style="border-style: solid">
		  <h4>Annual General Meeting Year 2020</h4>
		  <p>Please be noted that 25th of October due to have the company AGM virtually in Zoom.</p>
		  <p><?php echo "Posted: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
	  </div>
	  

      <div style="height: 200px;"></div>
    </div>
<?php 
require_once('left_sidebar.php'); 	
require_once('footer.php'); ?>	