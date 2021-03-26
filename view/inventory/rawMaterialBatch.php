<?php
session_start();
require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}
if (isset($_GET['material'])) {
  $rawMaterial = new RawMaterial();
  $batch = $rawMaterial->getAllBatchDetailsOf($_GET['material']);
}
require_once('header.php');
?>
<a href="inventoryHome.php">&#8592 Back to Home</a>
<h1> Batch Details of <i><?php echo $_GET['material'] ?></i></h1>
<div class="container">
  <h2>Available Batches</h2>
  <div class="row">
    <div class="col">
      <div class="left">
        <span>Show: </span>
        <select name="" id="" class="" width="15px">
          <option value="">10 records</option>
          <option value="">25 records</option>
          <option value="">50 records</option>
          <option value="">100 records</option>
        </select>
      </div>
    </div>
    <div class="col">
      <div class="right">
        <span>Sort By: </span>
        <select name="" id="">
          <option value="">Added Date</option>
          <option value="">Expiry Date</option>
          <option value="">Available Quantity</option>
          <option value="">Stored Location</option>
          <option value="">Supplier</option>
        </select>
        <select name="" id="">
          <option value="">ASC</option>
          <option value="">DESC</option>
        </select>
      </div>
    </div>
  </div>
  <br>
  <table>
    <thead>
      <tr>
        <th>Batch ID</th>
        <th>Added Date</th>
        <th>Expiry Date</th>
        <th>Unit Price</th>
        <th>Available Quanitity</th>
        <th>Stored Location</th>
        <th>Delivered By</th>
        <th>Supplier</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($batch)) {
      ?>
        <tr>
          <td><?php echo $row["batch-id"] ?></td>
          <td><?php echo $row["added-date"] ?></td>
          <td><?php $date = date("Y-m-d");
              if ($row["end-date"] >= $date) {
                echo $row["end-date"];
              } else {
                echo "<span style='color:red;'>".$row["end-date"]."<span>";
              } ?>
          </td>
          <td><?php echo $row["unit-price"] ?></td>
          <td><?php echo $row["batch-quantity"] ?></td>
          <td><?php echo $row["stored-location"] ?></td>
          <td><?php echo $row["delivered-by"] ?></td>
          <td><?php echo $row["sup-name"] ?></td>
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