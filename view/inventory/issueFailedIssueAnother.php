<!----Issue Failed---->
<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2 class="center">Issue Failed!</h2>
<div class="container">
  <div class="row center">
    <span><i>Reason for failure</i></span>
  </div>
  <br>
  <div class="row center">
    <span>Remaining Quantity: <span><i>amount</i></span> </span>  
  </div>
</div>
<br>
<div class="container center">
    <a class="btn-secondary">Issue another</a>
    <a class="btn-primary">OK</a>  
</div>
<?php
require_once('leftSidebar.php'); 
require_once('footer.php'); ?>	