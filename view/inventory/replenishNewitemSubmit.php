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
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'newRawMaterial')">Raw Material</button>
    <button class="tablinks" onclick="openTab(event, 'newTool')">Tool</button>
</div>
<div id="newRawMaterial" class="tabcontent">
    <h2>Add new raw material</h2>
    <form>
        <div class="form-group field">
            <div class="form-group field">
                <input class="form-field" id="name">
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="type">
                <label for="type" class="form-label">Type</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="price">
                <label for="price" class="form-label">Price</label>
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
</div>
<div id="newTool" class="tabcontent">
    <h2>Add new tool</h2>
    <form>
        <div class="form-group field">
            <div class="form-group field">
                <input class="form-field" id="name">
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="price">
                <label for="price" class="form-label">Tool Price</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="manufacturer">
                <label for="manufacturer" class="form-label">Manufacturer</label>
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
</div>


<?php
    require_once('leftSidebar.php'); 
    require_once('footer.php'); 
?>	