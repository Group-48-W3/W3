<?php 
//controller calling
require_once('./../../controller/expense/categoryController.php');
//employee object
$category = new Category();
$result = $category->viewCategory();
?>

<?php require_once('./expenseHeader.php');?>

<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Category</h3>
      <h4>Add expense category</h4>

      <!-- Form Starts -->
        <form method="post" action="./../../controller/expense/categoryController.php">
          <div class="form-group feild">
            <label for="name">Category name : </label>
            <input type="text" class="form-control" name="cat_name" id="cat_name"  placeholder="ex:- *Food">
          </div>
          <div class="form-group">
            <label for="category description">Category description : </label>
            <input type="text" class="form-control" name="cat_desc" id="cat_desc" placeholder="*description" >
          </div>
          <div class="form-group">
            <label for="category type">Category Type : </label>
            <input type="text" class="form-control" name="cat_type" id="cat_type"  placeholder="optional">
            
          </div>
          <div class="right">
		        <input class="btn btn-primary" type="submit" name="catDetails" id="catDetails" value="Add category">
          </div>
        </form>
      <!-- Form Ends -->

      <h3>Expense Categories</h3>
      <!-- Show Expense Categories -->
      <table class="table table-hover">
          <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
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
                    <a class="btn btn-warning" href="#">Update</a>
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