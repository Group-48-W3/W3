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
<div id="newRawMaterial" class="tabcontent col-6">
    <h2>Add new raw material</h2>
    <form method="post" action="./../../controller/user/inventoryController.php">
        <div class="form-group field">
            <div class="form-group field">
                <input class="form-field" id="name" name="materialName">
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="type" name="materialType">
                <label for="type" class="form-label">Type</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="price" name="materialPrice">
                <label for="price" class="form-label">Price</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="quantity" name="materialQuantity">
                <label for="quantity" class="form-label">Quantity</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="reorderValue" name="materialReorderValue">
                <label for="reorderValue" class="form-label">Re-Order Value</label>
            </div>
        </div>
        <br>
        <div class="container right">
            <button class="btn-secondary" type="" value="Cancel">Cancel</button>
            <button class="btn btn-primary" type="submit" value="Submit" name="addNewRawMaterial">Submit</button> 
        </div>
    </form>
</div>
<div id="newTool" class="tabcontent">
    <h2>Add new tool</h2>
    <form method="post" action="./../../controller/user/inventoryController.php">
        <div class="form-group field">
            <div class="form-group field">
                <input class="form-field" id="name" name="toolName">
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="price" name="toolPrice">
                <label for="price" class="form-label">Tool Price</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="manufacturer" name="toolManufacturer">
                <label for="manufacturer" class="form-label">Manufacturer</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="quantity" name="toolQuantity">
                <label for="quantity" class="form-label">Quantity</label>
            </div>
            <div class="form-group field">
                <input class="form-field" id="reorderValue" name="toolReorderValue">
                <label for="reorderValue" class="form-label">Re-Order Value</label>
            </div>
        </div>
        <br>
        <div class="container right">
            <button class="btn-secondary" type="" value="Cancel">Cancel</button> </a>
            <button class="btn-primary" type="submit" value="Submit" name="addNewTool">Submit</button> 
        </div>
    </form>
</div>


<?php
    require_once('leftSidebar.php'); 
    require_once('footer.php'); 
?>	