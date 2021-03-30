<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

if (isset($_GET['tool_id'])) {
  $toolId = $_GET['tool_id'];
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
require_once('header.php');

$tool = new Tool();
$row = $tool->getSingleTool($toolId);
?>

<h1>Tool</h1>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Update tool details</h2>
    </div>
  </div>
  <form method="post" action="./../../controller/inventory/toolController.php">
    <div class="form-group field">
      <input type="text" id="tName" name="tName" class="form-field" value="<?php echo $row['description'] ?> " required>
      <label for="tName" class="form-label">Name</label>
    </div>
    <div class="form-group field">
      <input type="text" id="tQty" name="tQty" class="form-field" value="<?php echo $row['tool-qty'] ?> " required>
      <label for="tQty" class="form-label">Total Quantity</label>
    </div>
    <div class="form-group field">
      <input type="text" id="tLoc" name="tLoc" class="form-field" value="<?php echo $row['tool-location'] ?> " required>
      <label for="tLoc" class="form-label">Stored Location</label>
    </div>
    <div class="right">
      <a href="./toolDetails.php?tool=<?php echo  $row['inv-code']?>" class="btn btn-secondary">Cancel</a>
      <input type="hidden" value="<?php echo $row['tool-id'] ?>" name="toolId">
      <input type="hidden" value="<?php echo $row['inv-code'] ?>" name="invCode">
      <input type="submit" class="btn btn-primary" value="Update Tool" name="updateTool">
    </div>
  </form>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>