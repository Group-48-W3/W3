<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2>Replenish Stock</h2>
<div class="container">
  <div class="row">
    <div class="col">
    <h3>Replenish Row Materials</h3>
      <form method="post" action="./../../controller/user/inventoryController.php">
        <div class="form-group field">
          <select class="form-field" id="item" name="replenishMaterialId" placeholder="Select">  
            <option value="">Select from list</option>  
            <option value="nails">nails</option>
            <option value="woodtype1">t1wood</option>
            <option value="woodtype2">t2wood</option>
            <option value="woodtype3">t3wood</option>      
          </select>
          <label for="item" class="form-label">Select raw material from the list</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="amount" name="replenishMaterialAmount">
          <label for="amount" class="form-label">Enter amount</label>
        </div>
        <div class="row">
          <div class="container right">
            <button class="btn-primary" type="cancel" value="cancel">Submit</button> 
            <button class="btn-secondary" type="submit" value="Submit" name="replenishRawMaterial">Cancel</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col">
      <h3>Replenish Tools</h3>
      <form method="post" action="./../../controller/user/inventoryController.php">
        <div class="form-group field">
          <select class="form-field" id="item" name="replenishToolId" placeholder="Select">  
            <option value="">Select from list</option>  
            <option value="nails">nails</option>
            <option value="woodtype1">t1wood</option>
            <option value="woodtype2">t2wood</option>
            <option value="woodtype3">t3wood</option>      
          </select>
          <label for="item" class="form-label">Select tool from the list</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="amount" name="replenishToolAmount">
          <label for="amount" class="form-label">Enter amount</label>
        </div>
        <div class="row">
          <div class="container right">
            <button class="btn-primary" type="cancel" value="cancel">Submit</button> 
            <button class="btn-secondary" type="submit" value="Submit" name="replenishTool">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br>
<div class="container center">
  <div class="row">
    <div class="col-12">
      <a class="btn btn-primary" href="replenishNewItemSubmit.php">+ Add Item</a> 
    </div>
  </div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	