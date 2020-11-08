<!-- This is dashboard page -->
<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('./../../controller/user/userController.php');
	
?>

<?php include_once('header.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <h1>User Profile</h1>
	  <hr>
	  <center>
		  <img src="./../../public/img/user_avatar.png" alt="icon" height="150px" width="150px">
	  </center>
      
	  <h3><small>You are login as :</small><?php echo getUserAccessRoleByID($_SESSION['r_id']); ?></h3>
	  <hr>
      <h4>
	  User Settings:
	  </h4>
      <div class="container">
      
      </div>
	  

      <div style="height: 200px;"></div>
    </div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	