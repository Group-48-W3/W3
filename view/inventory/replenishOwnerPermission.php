<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>

<div class="container center">
    <h2>Waiting for Owner Permission...</h2>
    <div class="row">
        <span>This item will be available when owner grants permissions<br>You can work on meanwhile!<span>
    </div>
    <br>
    <div class="row">
        <a class="btn-secondary" href="#">Send notification again</a> 
        <a class="btn-primary" href="inventoryHome.php">OK</a> 
    </div>
</div>

        
<?php
    require_once('leftSidebar.php'); 
    require_once('footer.php'); 
?>	