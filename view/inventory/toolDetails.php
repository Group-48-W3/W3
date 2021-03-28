<?php
session_start();
require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}
if (isset($_GET['tool'])) {
  $tool = new Tool();
  $toolDetails = $tool->getTools($_GET['tool']);
  $machineDetails = $tool->getMachines($_GET['tool']);
}
require_once('header.php');
?>
<a href="inventoryHome.php">&#8592 Back to Home</a>
<h1> Batch Details of <i><?php echo $_GET['tool'] ?></i></h1>
<div class="container">
  <h2>Available Tools</h2>
  
  <table class="data-table paginated">
    <thead>
      <tr>
        <th>Description</th>
        <th>Minimum Stock Level</th>
        <th>Total Quantity</th>
        <th>In Use</th>
        <th>Available Quantity</th>
        <th>Store Location</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($toolRow = mysqli_fetch_array($toolDetails)) {
        $available = $tool->getAvailableQuantity($toolRow["tool-id"]);
        $minLevel = $tool->getSingleToolCategory($toolRow["inv-code"]);
      ?>
        <tr>
          <td><?php echo $toolRow["description"] ?></td>
          <td><?php echo $minLevel['min-qty'] ?></td>
          <td><?php echo $toolRow["tool-qty"] ?></td>
          <td><?php echo $toolRow["tool-qty"] - $available ?></td>
          <td><?php echo $available ?></td>
          <td><?php echo $toolRow["tool-location"] ?></td>
        </tr>
      <?php
        if ($i == 0) {
          $i++;
        }
      }
      if ($i == 0) {
        echo "No results ";
      }
      ?>
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Available Machines</h2>
  
  <table class="data-table paginated">
    <thead>
      <tr>
        <th>Registered ID</th>
        <th>Description</th>
        <th>Store Location</th>
        <th>Price</th>
        <th>Supplier</th>
        <th>Delivered By</th>
        <th>Added Date</th>
        <th>Current Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($machineRow = mysqli_fetch_array($machineDetails)) {
      ?>
        <tr>
          <td><?php echo $machineRow["reg-id"] ?></td>
          <td><?php echo $machineRow["machine-desc"] ?></td>
          <td><?php echo $machineRow["machine-location"] ?></td>
          <td>Rs. <?php echo $machineRow["price"] ?></td>
          <td><?php echo $machineRow["sup-name"] ?></td>
          <td><?php echo $machineRow["delivered-by"] ?></td>
          <td><?php echo $machineRow["added-date"] ?></td>
          <td><?php if ($machineRow["status"] == 1) {
                echo "<a href='issue.php#issueTool'>Available</a>";
              } else if ($machineRow["status"] == 0) {
                echo "<a href='issue.php#recentIssues'>In Use</a>";
              } else if ($machineRow["status"] == 2) {
                echo "<a href='maintenance.php'>In Maintenance</a>";
              } ?></td>
        </tr>
      <?php
        if ($i == 0) {
          $i++;
        }
      }
      if ($i == 0) {
        echo "No results ";
      }
      ?>
    </tbody>
  </table>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>