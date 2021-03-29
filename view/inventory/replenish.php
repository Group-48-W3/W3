<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
require_once('../../controller/inventory/toolController.php');
require_once('../../controller/inventory/supplierController.php');
$rawMaterial = new RawMaterial();
$tool = new Tool();
$supplier = new Supplier();
require_once('header.php');
?>

<h2>Replenish Stock (Add New Stock)</h2>
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Replenish Row Materials</h3>
      <form method="post" action="./../../controller/inventory/rawMaterialController.php">
        <div class="form-group field">
          <select class="form-field" id="matInventoryCode" name="inventoryCode">
            <option value="">Select from list</option>
            <?php
            $i = 0;
            $result = $rawMaterial->getAllRawMaterialCategory();
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["mat-name"]; ?></option>
            <?php
              if ($i == 0) {
                $i++;
              }
            }
            if ($i == 0) {
              echo "No results ";
            }
            ?>
          </select>
          <label for="matInventoryCode" class="form-label">Raw Material Category</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="amount" name="replenishUnitPrice">
          <label for="amount" class="form-label">Unit Price</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="amount" name="replenishMaterialAmount">
          <label for="amount" class="form-label">Quantity</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="location" name="replenishLocation">
          <label for="location" class="form-label">Store Location</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="period" name="replenishPeriod" type="date">
          <label for="period" class="form-label">Expire Date (Printed/Predicted)</label>
        </div>
        <div class="form-group field">
          <select class="form-field" id="repSupplier" name="replenishSupplier">
            <option value="">Select from list</option>
            <?php
            $i = 0;
            $result = $supplier->getActiveSuppliers();
            while ($row = mysqli_fetch_array($result)) {
              if($row['category']==0 || $row['category']==1){
            ?>
              <option value="<?php echo $row["sup-id"]; ?>"><?php echo $row["sup-name"]; ?></option>
            <?php
              }if ($i == 0) {
                $i++;
              }
            }
            if ($i == 0) {
              echo "No results ";
            }
            ?>
          </select>
          <label for="repSupplier" class="form-label">Supplier</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="deliver" name="replenishDelivery">
          <label for="deliver" class="form-label">Delivered By</label>
        </div>
        <div class="row">
          <div class="container right">
            <input class="btn btn-primary" type="submit" value="Replenish" name="replenishRawMaterial">
            <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br>

<h2> Add New Raw Material</h2>

<div id="rawMaterialCategory">
  <div class="container">
    <h3>Add new raw material category</h3>
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
          <label for="reorderValue" class="form-label">Minimum stock level (Re-Order Value)</label>
        </div>
        <div class="form-group field">
          <select id="abcRawMat" name="materialAbcCategory" class="form-field">
            <option value="">Select from List</option>
            <option value="A">A - High Value & Low Stock</option>
            <option value="B">B - Moderate Value & Moderate Stock</option>
            <option value="C">C - Low Value & High Stock</option>
          </select>
          <label for="abcRawMat" class="form-label">ABC Analysis</label>
        </div>
      </div>
      <br>
      <div class="container right">
        <input class="btn btn-primary" type="submit" name="addNewRawMaterialCategory" value="Add Category">
      </div>
    </form>
  </div>
</div>
<br>

<h2> Add New Tool</h2>
<a name="newtool"></a>
<div class="tab" name="toolCategorySection">
  <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'newToolCategory')">New Category</button>
  <button class="tablinks" onclick="openTab(event, 'newSubTool')">New Tool</button>
  <button class="tablinks" onclick="openTab(event, 'newSubMachine')">New Machine</button>
</div>

<a name="addTool"></a>
<!-- Adding Tools -->
<div id="newToolCategory" class="tabcontent">
  <h2>Add new tool category</h2>
  <div class="container">
    <form method="post" action="../../controller/inventory/toolController.php">
      <div class="form-group field">
        <div class="form-group field">
          <input class="form-field" id="name" name="toolCatName">
          <label for="name" class="form-label">Category Name</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="type" name="toolCatDesc">
          <label for="type" class="form-label">Category Description</label>
        </div>
        <div class="form-group field">
          <input class="form-field" id="reorderValue" name="toolCatReorderValue">
          <label for="reorderValue" class="form-label">Minimum stock level</label>
        </div>
        <div class="form-group field">
          <select name="abcTool" id="abcTool" class="form-field">
            <option value="A">A - High Value & Low Stock</option>
            <option value="B">B - Moderate Value & Moderate Stock</option>
            <option value="C">C - Low Value & High Stock</option>
          </select>
          <label for="abcTool" class="form-label">ABC Analysis</label>
        </div>
      </div>
      <br>
      <div class="container right">
        <button class="btn btn-primary" type="submit" name="addNewToolCategory">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Add new tool -->
<div id="newSubTool" class="tabcontent">
  <h2>Add new tool</h2>
  <div class="container">
    <form method="post" action="../../controller/inventory/toolController.php"> 
      <div class="form-group field">
        <select class="form-field" id="name" name="toolCategory">
          <option value="" disabled selected>Select from list</option>
          <?php
            $i = 0;
            $tools = $tool->getAllToolCategory();
            while ($toolRow = mysqli_fetch_array($tools)) {
            ?>
              <option value="<?php echo $toolRow["inv-code"]; ?>"><?php echo $toolRow["tool-name"]; ?></option>
            <?php
              if ($i == 0) {
                $i++;
              }
            }
            if ($i == 0) {
              echo "No results ";
            }
          ?>
        </select>
        <label for="name" class="form-label">Category</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="desc" name="toolDesc">
        <label for="desc" class="form-label">Description</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="quantity" name="toolQuantity">
        <label for="quantity" class="form-label">Quantity</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="loc" name="toolLoc">
        <label for="loc" class="form-label">Store Location (Rack No)</label>
      </div>
      <div class="form-group field">
        <select class="form-field" id="toolSupplier" name="toolSupplier">
          <option value="">Select from list</option>
          <?php
            $i = 0;
            $result = $supplier->getActiveSuppliers();
            while ($row = mysqli_fetch_array($result)) {
              if($row['category']==0 || $row['category']==2){
            ?>
              <option value="<?php echo $row["sup-id"]; ?>"><?php echo $row["sup-name"]; ?></option>
            <?php
              }if ($i == 0) {
                $i++;
              }
            }
            if ($i == 0) {
              echo "No results ";
            }
          ?>
        </select>
        <label for="toolSupplier" class="form-label">Supplier</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="toolDeliver" name="toolDeliver">
        <label for="toolDeliver" class="form-label">Delivered by</label>
      </div>
      <br>
      <div class="container right">
        <button class="btn btn-primary" type="submit" value="Submit" name="addNewTool">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Add new machine -->
<div id="newSubMachine" class="tabcontent">
  <h2>Add new machine</h2>
  <div class="container">
    <form method="post" action="../../controller/inventory/toolController.php">
      <div class="form-group field">
        <select class="form-field" id="name" name="machineCategory">
          <option value="" disabled selected>Select from list</option>
          <?php
          $i = 0;
          $machines = $tool->getAllToolCategory();
          while ($machineRow = mysqli_fetch_array($machines)) {
          ?>
            <option value="<?php echo $machineRow["inv-code"]; ?>"><?php echo $machineRow["tool-name"]; ?></option>
          <?php
            if ($i == 0) {
              $i++;
            }
          }
          if ($i == 0) {
            echo "No results ";
          }
          ?>
        </select>
        <label for="name" class="form-label">Category</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="machineDesc" name="machineDesc">
        <label for="machineDesc" class="form-label">Description</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="registeredID" name="registeredID">
        <label for="registeredID" class="form-label">Registered ID</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="machinePrice" name="machinePrice">
        <label for="machinePrice" class="form-label">Machine Price</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="machineLoc" name="machineLoc">
        <label for="machineLoc" class="form-label">Store Location (Rack No)</label>
      </div>
      <div class="form-group field">
        <select class="form-field" id="machineSupplier" name="machineSupplier">
          <option value="">Select from list</option>
          <?php
          $i = 0;
          $suppliers = $supplier->getActiveSuppliers();
          while ($supplierRow = mysqli_fetch_array($suppliers)) {
            if($supplierRow['category']==0 || $supplierRow['category']==2){
          ?>
            <option value="<?php echo $supplierRow["sup-id"]; ?>"><?php echo $supplierRow["sup-name"]; ?></option>
          <?php
            }if ($i == 0) {
              $i++;
            }
          }
          if ($i == 0) {
            echo "No results ";
          }
          ?>
        </select>
        <label for="machineSupplier" class="form-label">Supplier</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="machineDeliver" name="machineDeliver">
        <label for="machineDeliver" class="form-label">Delivered by</label>
      </div>
      <br>
      <div class="container right">
        <button class="btn btn-primary" type="submit" value="Submit" name="addNewMachine">Submit</button>
      </div>
    </form>
  </div>
</div>

<script>
  $('#matInventoryCode').on('change', function() {
    var selected = $(this).val();
    $("#matType option").each(function(item) {
      var element = $(this);
      if (element.data("tag") != selected) {
        element.hide();
      } else {
        element.show();
      }
    });

    $("#matType").val($("#matType option:visible:first").val());

  });

  $('#toolCategory').on('change', function() {
    var selected = $(this).val();
    $("#repToolID option").each(function(item) {
      var element = $(this);
      if (element.data("tag") != selected) {
        element.hide();
      } else {
        element.show();
      }
    });

    $("#repToolID").val($("#repToolID option:visible:first").val());

  });
</script>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>