<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
  require_once('../../controller/user/userController.php');
  require_once('../../controller/inventory/rawMaterialController.php');
  $rawMaterial = new RawMaterial();
  $result = $rawMaterial->getAllRawMaterialCategory();
  require_once('header.php');
?>

<h2>Replenish Stock(Add New Stock)</h2>
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
            <button class="btn btn-primary" type="submit" value="Submit" name="replenishRawMaterial">Submit</button>
            <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>  
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
            <button class="btn btn-primary" type="submit" value="Submit" name="replenishTool">Submit</button> 
            <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br>

<h2> Add New Raw Material</h2>
<div class="tab">
    <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'rawMaterialCategory')">Raw Material Category</button>
    <button class="tablinks" onclick="openTab(event, 'newRawMaterial')">New Raw Material</button>
</div>
<!-- Adding Raw materials -->
<div id="rawMaterialCategory" class="tabcontent">
    <h2>Add new raw material category</h2>
    <div class="container">
      <form method="post" action="../../controller/inventory/rawMaterialController.php">
          <div class="form-group field">
              <div class="form-group field">
                  <input class="form-field" id="name" name="materialName">
                  <label for="name" class="form-label">Name</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="type" name="materialDescription">
                  <label for="type" class="form-label">Description</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="reorderValue" name="materialReorderValue">
                  <label for="reorderValue" class="form-label">Re-Order Value (Minimum stock level)</label>
              </div>
          </div>
          <br>
          <div class="container right">
              <!-- <button class="btn btn-secondary" type="" value="Cancel">Cancel</button> -->
              <button class="btn btn-primary" type="submit" name="addNewRawMaterialCategory">Submit</button>
          </div>
      </form>
    </div>
</div>
<div id="newRawMaterial" class="tabcontent">
    <h2>Add new raw material</h2>
    <div class="container">
      <form method="post" action="./../../controller/inventory/rawMaterialController.php">
          <div class="form-group field">
              <div class="form-group field">
                  <select class="form-field" id="name" name="inventoryCode">
                    <option value="">Select from list</option>
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row["inv_code"]; ?>"><?php echo $row["mat_name"]; ?></option>
                    <?php
                          if($i==0) { $i++; }
                        }
                        if($i==0){
                            echo "No results ";
                        }
                    ?>
                  </select>
                  <label for="name" class="form-label">Raw Material Category</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="price" name="materialType">
                  <label for="price" class="form-label" required>Material Type</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="manufacturer" name="materialPrice">
                  <label for="manufacturer" class="form-label" required>Unit Price</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="quantity" name="materialQuantity">
                  <label for="quantity" class="form-label">Quantity</label>
                  <small class="form-text text-muted">Leave blank for zero</small>
              </div>
          </div>
          <br>
          <div class="container right">
              <a class="btn btn-secondary" href="#">Cancel</a>
              <button class="btn btn-primary" type="submit" value="Submit" name="addNewRawMaterial">Submit</button> 
          </div>
      </form>
    </div>
</div>

<br>

<h2> Add New Tool</h2>
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'newTool')">Tool Category</button>
    <button class="tablinks" onclick="openTab(event, 'newSubTool')">New Tool</button>
</div>
<!-- Adding Raw materials -->
<div id="newTool" class="tabcontent">
    <h2>Add new raw material</h2>
    <div class="container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
          <div class="form-group field">
              <div class="form-group field">
                  <input class="form-field" id="name" name="toolName">
                  <label for="name" class="form-label">Name</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="type" name="toolType">
                  <label for="type" class="form-label">Type</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="price" name="toolPrice">
                  <label for="price" class="form-label">Price</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="quantity" name="toolQuantity">
                  <label for="quantity" class="form-label">Quantity</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="reorderValue" name="toolReorderValue">
                  <label for="reorderValue" class="form-label">Re-Order Value(minimum stock level)</label>
              </div>
          </div>
          <br>
          <div class="container right">
              <!-- <button class="btn btn-secondary" type="" value="Cancel">Cancel</button> -->
              <button class="btn btn-primary" type="submit" name="addNewRawtool">Submit</button>
          </div>
      </form>
    </div>
</div>
<div id="newSubTool" class="tabcontent">
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