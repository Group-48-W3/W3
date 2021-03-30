<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

if (isset($_GET['machine_id'])) {
  $toolId = $_GET['machine_id'];
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
require_once('header.php');

$tool = new Tool();
$row = $tool->getSingleMachine($toolId);
?>

<h1>Machine</h1>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Update machine details</h2>
    </div>
  </div>
  <form method="post" action="./../../controller/inventory/toolController.php">
    <div class="form-group field">
      <input type="text" id="tName" name="mName" class="form-field" value="<?php echo $row['reg-id'] ?> " required>
      <label for="mName" class="form-label">Registered ID</label>
    </div>
    <div class="form-group field">
      <input type="text" id="mDesc" name="mDesc" class="form-field" value="<?php echo $row['machine-desc'] ?> " required>
      <label for="mDesc" class="form-label">Description</label>
    </div>
    <div class="form-group field">
      <input type="text" id="mLoc" name="mLoc" class="form-field" value="<?php echo $row['machine-location'] ?> " required>
      <label for="mLoc" class="form-label">Stored Location</label>
    </div>
    <div class="form-group field">
      <input type="text" id="mPrice" name="mPrice" class="form-field" value="<?php echo $row['price'] ?> " required>
      <label for="mPrice" class="form-label">Price</label>
    </div>
    <div class="right">
      <a href="./toolDetails.php?tool=<?php echo  $row['inv-code']?>" class="btn btn-secondary">Cancel</a>
      <input type="hidden" value="<?php echo $row['machine-id'] ?>" name="machineId">
      <input type="hidden" value="<?php echo $row['inv-code'] ?>" name="invCode">
      <input type="submit" class="btn btn-primary" value="Update Machine" name="updateMachine">
    </div>
  </form>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>