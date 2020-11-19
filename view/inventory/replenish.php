<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
  require_once('../../controller/user/userController.php');
  require_once('../../controller/inventory/rawMaterialController.php');
  require_once('../../controller/inventory/toolController.php');
  $rawMaterial = new RawMaterial();
  $tool = new Tool();
  require_once('header.php');
?>

<h2>Replenish Stock(Add New Stock)</h2>
<div class="container">
  <div class="row">
    <div class="col">
    <h3>Replenish Row Materials</h3>
      <form method="post" action="./../../controller/inventory/rawMaterialController.php">
        <div class="form-group field">
          <select class="form-field" id="matInventoryCode" name="inventoryCode">
            <option value="">Select from list</option>
            <?php
                $i=0;
                $result = $rawMaterial->getAllRawMaterialCategory();
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
          <label for="matInventoryCode" class="form-label">Raw Material Category</label>
        </div>
        <div class="form-group field">
          <select class="form-field" id="matType" name="replenishMaterialId">  
            <option value="">Select from list</option> 
            <?php
                $i=0;
                $result = $rawMaterial->getAllRawMaterial();
                while($row = mysqli_fetch_array($result)) {
            ?>
            <option value="<?php echo $row["mat_id"];?>" data-tag="<?php echo $row["inv_code"];?>">
              <?php echo $row["mat_type"]; ?>
            </option>
            <?php
                  if($i==0) { $i++; }
                }
                if($i==0){
                    echo "No results ";
                }
            ?>   
          </select>
          <label for="matType" class="form-label">Material type</label>
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
      <form method="post" action="./../../controller/inventory/toolController.php">
        <div class="form-group field">
          <select class="form-field" id="toolCategory" name="toolCategory">
            <option value="">Select from list</option>
            <?php
                $i=0;
                $tools = $tool->getAllToolCategory();
                while($toolRow = mysqli_fetch_array($tools)) {
            ?>
            <option value="<?php echo $toolRow["inv_code"]; ?>"><?php echo $toolRow["tool_name"]; ?></option>
            <?php
                  if($i==0) { $i++; }
                }
                if($i==0){
                    echo "No results ";
                }
            ?>
          </select>
          <label for="name" class="form-label">Tool Category</label>
        </div>
        <div class="form-group field">
          <select class="form-field" id="repToolID" name="replenishToolId" placeholder="Select">  
            <option value="">Select from list</option>
            <?php
                $i=0;
                $tools = $tool->getTools();
                while($toolRow = mysqli_fetch_array($tools)) {
            ?>  
            <option value="<?php echo $toolRow["tool_id"];?>" data-tag="<?php echo $toolRow["inv_code"];?>">
              <?php echo $toolRow["tool_id"]; ?>
            </option> 
            <?php
                  if($i==0) { $i++; }
                }
                if($i==0){
                    echo "No results ";
                }
            ?>   
          </select>
          <label for="item" class="form-label">Tool Registered ID</label>
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
          <select class="form-field" id="name" name="inventoryCode">
            <option value="">Select from list</option>
            <?php
                $i=0;
                $result = $rawMaterial->getAllRawMaterialCategory();
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
    <button class="tablinks" onclick="openTab(event, 'newToolCategory')">New Category</button>
    <button class="tablinks" onclick="openTab(event, 'newSubTool')">New Tool</button>
</div>
<!-- Adding Raw materials -->
<div id="newToolCategory" class="tabcontent">
    <h2>Add new tool category</h2>
    <div class="container">
      <form method="post" action="../../controller/inventory/toolController.php">
          <div class="form-group field">
              <div class="form-group field">
                  <input class="form-field" id="name" name="toolName">
                  <label for="name" class="form-label">Category Name</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="type" name="toolDesc">
                  <label for="type" class="form-label">Category Description</label>
              </div>
              <div class="form-group field">
                  <input class="form-field" id="reorderValue" name="toolReorderValue">
                  <label for="reorderValue" class="form-label">Re-Order Value (Minimum stock level)</label>
              </div>
          </div>
          <br>
          <div class="container right">
              <!-- <button class="btn btn-secondary" type="" value="Cancel">Cancel</button> -->
              <button class="btn btn-primary" type="submit" name="addNewToolCategory">Submit</button>
          </div>
      </form>
    </div>
</div>
<div id="newSubTool" class="tabcontent">
    <h2>Add new tool</h2>
    <div class="container">
      <form method="post" action="../../controller/inventory/toolController.php">
        <div class="form-group field">
          <select class="form-field" id="name" name="toolCategory">
            <option value="">Select from list</option>
            <?php
                $i=0;
                $tools = $tool->getAllToolCategory();
                while($toolRow = mysqli_fetch_array($tools)) {
            ?>
            <option value="<?php echo $toolRow["inv_code"]; ?>"><?php echo $toolRow["tool_name"]; ?></option>
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
            <input class="form-field" id="name" name="toolRegID">
            <label for="name" class="form-label">Regisrtered ID</label>
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
        <br>
        <div class="container right">
            <button class="btn btn-secondary" type="" value="Cancel">Cancel</button> </a>
            <button class="btn btn-primary" type="submit" value="Submit" name="addNewTool">Submit</button> 
        </div>
      </form>
    </div>
</div>
 
<script>
	$('#matInventoryCode').on('change', function() {
		var selected = $(this).val();
		$("#matType option").each(function(item){ 
			var element =  $(this) ; 
			if (element.data("tag") != selected){
				element.hide() ; 
			}else{
				element.show();
			}
		}) ; 
		
		$("#matType").val($("#matType option:visible:first").val());
		
});

$('#toolCategory').on('change', function() {
		var selected = $(this).val();
		$("#repToolID option").each(function(item){  
			var element =  $(this) ; 
			if (element.data("tag") != selected){
				element.hide() ; 
			}else{
				element.show();
			}
		}) ; 
		
		$("#repToolID").val($("#repToolID option:visible:first").val());
		
});
</script>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	