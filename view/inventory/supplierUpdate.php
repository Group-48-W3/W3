<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

if (isset($_GET['sup_id'])) {
  $supId = $_GET['sup_id'];
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/supplierController.php');
require_once('header.php');

$supplier = new Supplier();
$result = $supplier->getSupplier($supId);
$row = mysqli_fetch_array($result);
?>

<h1>Suppliers</h1>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Update supplier</h2>
    </div>
    <div class="right">
      <form action="./../../controller/inventory/supplierController.php" method="POST">
        <input type="hidden" value="<?php echo $row['sup-id'] ?>" name="supId">
        <input type="hidden" value="<?php echo $row['sup-status'] ?>" name="supStatus">
        <?php if ($row['sup-status'] == 1) { ?>
          <button type="submit" name="toggleActive" class="btn btn-danger">Set as Inactive</button>
        <?php }
        if ($row['sup-status'] == 0) { ?>
          <button type="submit" name="toggleActive" class="btn btn-success">Set as Active</button>
        <?php } ?>
      </form>
    </div>
  </div>
  <form method="post" action="./../../controller/inventory/supplierController.php">
    <div class="form-group field">
      <input type="text" id="supName" name="supName" class="form-field" value="<?php echo $row['sup-name'] ?> " required>
      <label for="supName" class="form-label">Name</label>
    </div>
    <div class="form-group field">
      <input type="email" id="supMail" name="supMail" class="form-field" value="<?php echo $row['sup-email'] ?> " required>
      <label for="supMail" class="form-label">Email</label>
    </div>
    <div class="form-group field">
      <input type="text" id="supMob" name="supMob" class="form-field" value="<?php echo $row['sup-mobile'] ?> " required>
      <label for="supMob" class="form-label">Mobile</label>
    </div>
    <div class="form-group field">
      <input type="text" id="supAddress" name="supAddress" class="form-field" value="<?php echo $row['sup-address'] ?> " required>
      <label for="supAddress" class="form-label">Address</label>
    </div>
    <div class="form-group field">
      <select class="form-field" id="supplierCat" name="supplierCat">
        <?php if ($row['category'] == 1) {
          echo "<option value='1' selected>Raw Materials</option>";
        } else {
          echo "<option value='1'>Raw Materials</option>";
        }
        if ($row['category'] == 2) {
          echo "<option value='2' selected>Tools</option>";
        } else {
          echo "<option value='2'>Tools</option>";
        }
        if ($row['category'] == 0) {
          echo "<option value='0' selected>Both</option>";
        } else {
          echo "<option value='0'>Both</option>";
        } ?>
      </select>
      <label for="supplierCat" class="form-label">Category</label>
    </div>
    <div class="right">
      <a href="./supplier.php" class="btn btn-secondary">Cancel</a>
      <input type="hidden" value="<?php echo $row['sup-id'] ?>" name="supplierId">
      <input type="submit" class="btn btn-primary" value="Update Supplier" name="updateSupplier">
    </div>
  </form>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>