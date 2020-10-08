<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2>Check Quantity</h2>
<div>
    <form>
        <div class="form-group field">
        <select class="form-field" id="item" name="items">
            <option value="nails">Select from list</option>
            <option value="nails">nails</option>
            <option value="woodtype1">t1wood</option>
            <option value="woodtype2">t2wood</option>
            <option value="woodtype3">t3wood</option>      
        </select>
    </div>
    <div class="container center">
        <button class="btn-primary" type="submit">Check available quantity</button>
    </div>
    </form>
</div>
    <?php
    require_once('left_sidebar.php'); 
    require_once('footer.php'); ?>	