<!----Issue submit---->
<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
require_once('header.php');
$tool = new Tool();
$toolCategory = $_SESSION['toolCategory'];
$toolType = $_SESSION['toolType'];
$toolDetails = $tool->getSingleTool($toolType);
$amount = $_SESSION['toolAmount'];
$employee = $_SESSION['toolEmployee'];
$available = $_SESSION['toolAvailable'];
$minStockLevel = $_SESSION['minStockLevel'];
?>

<h1 class="center">Warning!</h1>
<h2 class="center">Falls behind minimum stock level</h2>
<br>
<div class="container">
  <div class="row center">
    <div class="col">
      <h3>Item</h3>
      <i><?php echo $toolDetails['description'] ?></i>
    </div>
    <div class="col">
      <h3>Available Quantity</h3>
      <i><?php echo $available ?></i>
    </div>
    <div class="col">
      <h3>Re-Order Value</h3>
      <i><?php echo $minStockLevel ?></i>
    </div>
  </div>
  <br><br>
  <form method="post" action="./../../controller/inventory/toolController.php">
    <div class="row center">
      <div class="form-group field" style="width:50%;margin:auto;">
        <input type="hidden" name="toolType" value=<?php echo $toolType ?>>
        <input type="hidden" name="employee" value=<?php echo $employee ?>>
        <input type="number" class="form-field" id="amount" name="amount" value=<?php echo $amount ?> min="1" max=<?php echo $available ?>>
        <label for="amount" class="form-label">Change amount</label>
      </div>
    </div>
    <br>
    <div class="container center">
      <a href="issue.php#issueTool" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary" name="toolIssueConfirmed">Confirm</a>
    </div>
  </form>
  <?php
  require_once('leftSidebar.php');
  require_once('footer.php'); ?>