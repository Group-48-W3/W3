<!-- This is dashboard page -->
<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('./../../controller/user/userController.php');
	require_once('./userHeader.php'); 
	
?>
<body class="fixed-nav sticky-footer" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid">
      <h1>My Notification</h1>
	  <hr>
	  <center>
		  <img src="./../../public/img/user_avatar.png" alt="icon" height="150px" width="150px">
	  </center>
      
	  <h3><small>You are login as :</small><?php echo getUserAccessRoleByID($_SESSION['r_id']); ?></h3>
	  <hr>
      <h4>
	  Notification List:
	  </h4>
      <div class="container">
      <div class="container"style="border-style: solid">
		  <h4>Meeting Date</h4>
		  <p>Prepare report for next week meeting</p>
		  <p><?php echo "Posted: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
	  </div>
	  <br>
	  <div class="container"style="border-style: solid">
		  <h4>Annual General Meeting Year 2020</h4>
		  <p>Please be noted that 25th of October due to have the company AGM virtually in Zoom.</p>
		  <p><?php echo "Posted: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
	  </div>
      </div>
	  

      <div style="height: 200px;"></div>
    </div>
<?php  	
require_once('footer.php'); 
?>