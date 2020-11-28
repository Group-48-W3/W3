<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
    require_once('header.php');
?>

<div class="container center">
    <h2>Replenish Successful</h2>
    <div class="row">
        <p>New quantity of nails : <i>amount</i></p>
    </div>
    <br>
    <div class="row">
        <a class="btn-secondary" href="replenish.php">+ Replenish another item</a> 
        <a class="btn-primary" href="inventoryHome.php">OK</a>
    </div>
</div>

<?php
    require_once('leftSidebar.php'); 
    require_once('footer.php');
?>	
