<!----Issue submit---->
<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2 class="center">Warning!</h2>
<div class="container">
  <div class="row center">
    <span><i>Warning details</i></span>
  </div>
  <br>
  <div class="row center">
    <span>Remaining Quantity: <span><i>amount</i></span> </span>  
  </div>
</div>
<br>
<div class="container center">
    <a class="btn-secondary">Cancel</a>
    <a class="btn-secondary">Edit</a>
    <a class="btn-primary">Confirm</a>
</div>
<?php
require_once('leftSidebar.php'); 
require_once('footer.php'); ?>	
