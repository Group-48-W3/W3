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
            <button class="btn btn-primary" type="cancel" value="cancel">Submit</button> 
            <button class="btn btn-secondary" type="submit" value="Submit" name="replenishRawMaterial">Cancel</button>
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
            <button class="btn btn-primary" type="cancel" value="cancel">Submit</button> 
            <button class="btn btn-secondary" type="submit" value="Submit" name="replenishTool">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br>

<h2> Add new item</h2>
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'newRawMaterial')">Raw Material</button>
    <button class="tablinks" onclick="openTab(event, 'newTool')">Tool</button>
</div>
<div id="newRawMaterial" class="tabcontent">
    <h2>Add new raw material</h2>
    <div class="container">
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
              <button class="btn btn-secondary" type="" value="Cancel">Cancel</button>
              <button class="btn btn-primary" type="submit" value="Submit" name="addNewRawMaterial">Submit</button> 
          </div>
      </form>
    </div>
</div>
<div id="newTool" class="tabcontent">
    <h2>Add new tool</h2>
    <div class="container">
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
              <button class="btn btn-secondary" type="" value="Cancel">Cancel</button> </a>
              <button class="btn btn-primary" type="submit" value="Submit" name="addNewTool">Submit</button> 
          </div>
      </form>
    </div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	