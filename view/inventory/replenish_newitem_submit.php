<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>

<h2> Add new item</h2>
<form>
    <div class="form-group field">
        <div class="form-group field">
            <input class="form-field" id="name">
            <label for="name" class="form-label">Name</label>
        </div>
        <div class="form-group field">
            <input class="form-field" id="measurement">
            <label for="measurement" class="form-label">Measurement</label>
        </div>
        <div class="form-group field">
            <input class="form-field" id="quantity">
            <label for="quantity" class="form-label">Quantity</label>
        </div>
        <div class="form-group field">
            <input class="form-field" id="reorderValue">
            <label for="reorderValue" class="form-label">Re-Order Value</label>
        </div>
    </div>
    <br>
    <div class="container right">
        <button class="btn-secondary" type="" value="Cancel">Cancel</button> </a>
        <button class="btn-primary" type="submit" value="Submit">Submit</button> 
    </div>
</form>

<?php
    require_once('left_sidebar.php'); 
    require_once('footer.php'); 
?>	