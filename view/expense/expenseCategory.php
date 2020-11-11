<?php 
session_start();
//controller calling
require_once('./../../controller/expense/categoryController.php');
//employee object
$category = new Category();
$result = $category->viewCategory();
require_once('../../controller/user/userController.php');
?>

<?php include_once('header.php'); ?>

<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Category</h1>
      <h2>Add expense category</h2>

      <!-- Form Starts -->
        <form method="post" action="./../../controller/expense/categoryController.php">
          <div class="form-group field">
            <input type="text" class="form-field" name="cat_name" id="cat_name">
            <label class="form-label" for="cat_name">Category name : </label>
            <small class="form-text text-muted">ex:- *Food</small>
          </div>
          <div class="form-group field">
            <input type="text" class="form-field" name="cat_desc" id="cat_desc">
            <label class="form-label" for="cat_desc">Category description : </label>
          </div>
          <div class="form-group field">
            <input type="text" class="form-field" name="cat_type" id="cat_type">
            <label class="form-label" for="cat_type">Category Type : </label>
            
          </div>
          <div class="right">
		        <input class="btn btn-primary" type="submit" name="catDetails" id="catDetails" value="Add category">
          </div>
        </form>
      <!-- Form Ends -->

      <h2>Expense Categories</h2>
      <!-- Show Expense Categories -->
      <table>
          <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Action</th>
          </thead>
          <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
          ?>
          <tbody>
              <tr>
                <td data-label="ID"><?php echo $row["cat_id"]; ?></td>
                <td data-label="Name"><?php echo $row["cat_name"]; ?></td>
                <td data-label="Desc"><?php echo $row["cat_desc"]; ?></td>
                <td data-label="Type"><?php echo $row["cat_type"]; ?></td>
                <td>
                    <a class="btn btn-warning" href="./updateCategory.php?updateid=<?php echo $row["cat_id"]; ?>">Update</a>
                    <a class="btn btn-danger" href="./../../controller/expense/categoryController.php?deleteid=<?php echo $row["cat_id"]; ?>">Delete</a>
                </td>
              </tr>
          </tbody>
          <?php
            $i++;
            }
            if($i==0){
                echo "No results ";
            }
        ?>
      </table>
    </div>
  </div>



</div>
<!-- Content Ends -->


<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	