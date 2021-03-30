<?php
session_start();
require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}
if (isset($_GET['batch_id'])) {
  $batchId = $_GET['batch_id'];
}

require_once('header.php');

$mat = new RawMaterial();
$row = $mat->getSingleBatchDetails($batchId);
?>

<h1>Raw Material</h1>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Update batch details</h2>
    </div>
  </div>
  <form method="post" action="./../../controller/inventory/rawMaterialController.php">
    <div class="form-group field">
      <input type="text" id="tName" name="bLoc" class="form-field" value="<?php echo $row['stored-location'] ?> " required>
      <label for="tName" class="form-label">Store Location</label>
    </div>
    <div class="form-group field">
      <input type="text" id="tQty" name="bDate" class="form-field" value="<?php echo $row['end-date'] ?> " required>
      <label for="tQty" class="form-label">Expire Date</label>
    </div>
    <div class="form-group field">
      <input type="text" id="tLoc" name="bQty" class="form-field" value="<?php echo $row['batch-quantity'] ?> " required>
      <label for="tLoc" class="form-label">Available Quantity</label>
    </div>
    <div class="form-group field">
      <input type="text" id="tLoc" name="bPrice" class="form-field" value="<?php echo $row['unit-price'] ?> " required>
      <label for="tLoc" class="form-label">Unit Price</label>
    </div>
    <div class="right">
      <a href="./rawMaterialBatch.php?material=<?php echo  $row['inv-code']?>" class="btn btn-secondary">Cancel</a>
      <input type="hidden" value="<?php echo $row['batch-id'] ?>" name="batchId">
      <input type="hidden" value="<?php echo $row['inv-code'] ?>" name="invCode">
      <input type="submit" class="btn btn-primary" value="Update Batch Details" name="updateBatch">
    </div>
  </form>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>