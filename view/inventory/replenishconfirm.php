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
    <div class="row">
        <h2>Confirm Details</h2>
        <p>
            Item: <i>itemName</i><br>
            Amount: <i>amount</i>
        </p>
    </div>
    <div class="row">
        <button class="btn-secondary">Cancel</button> 
        <button class="btn-secondary">Edit</button> 
        <button class="btn-primary" type="submit" value="confirm">Confirm</button>
    </div>
</div>

<?php
    require_once('leftSidebar.php'); 
    require_once('footer.php');
?>	
