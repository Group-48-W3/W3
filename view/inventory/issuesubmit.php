<!----Issue submit---->
<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
require_once('header.php');
$rawMaterial = new RawMaterial();
$material = $_SESSION['material'];
$matName = $rawMaterial->getMaterialName($material);
$quantity = $_SESSION['quantity'];
$contract = $_SESSION['contract'];
$employee = $_SESSION['employee'];
$availableQuantity = $_SESSION['availableQuantity'];
$reorderValue = $_SESSION['reorderValue'];
?>

<h1 class="center">Warning!</h1>
<h2 class="center">Item falls behind reorder value</h2>
<br>
<div class="container">
  <div class="row center">
    <div class="col">
      <h3>Item</h3>
      <i><?php echo $matName ?></i>
    </div>
    <div class="col">
      <h3>Remaining Quantity</h3>
      <i><?php echo $availableQuantity ?></i>
    </div>
    <div class="col">
      <h3>Re-Order Value</h3>
      <i><?php echo $reorderValue ?></i>
    </div>
  </div>
  <br><br>
  <form method="post" action="./../../controller/inventory/rawMaterialController.php">
  <div class="row center">
    <div class="form-group field" style="width:50%;margin:auto;">
    <input type="hidden" name="matCategory" value=<?php echo $material?>>
    <input type="hidden" name="contractID" value=<?php echo $contract?>>
    <input type="hidden" name="matEmployeeID" value=<?php echo $employee?>>
      <input type="number" class="form-field" id="amount" name="issueAmount" value=<?php echo $quantity ?> min="1" max=<?php echo $availableQuantity ?>>
      <label for="amount" class="form-label">Change amount</label>
    </div>
  </div>
  <br>
  <div class="container center">
    <a class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary" name="issueConfirmed">Confirm</a>
  </div>
  </form>
  <?php
  require_once('leftSidebar.php');
  require_once('footer.php'); ?>