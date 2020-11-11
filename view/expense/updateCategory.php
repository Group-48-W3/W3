<?php 
require_once('./../../controller/expense/categoryController.php');
if (isset($_GET['updateid'])) {
    $cat = new Category();
    $cat_details = $cat->getCatId($_GET['updateid']);

    $row = mysqli_fetch_array($cat_details);
}
?>

<?php require_once('./expenseHeader.php');?>   
      
    <!-- Content Starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
      
                <h3>Category</h3>
                <h4>Update expense category</h4>

                <!-- Form Starts -->
                    <form method="post" action="./../../controller/expense/categoryController.php">
                    <input id="cat_id" type="text" name="cat_id" value="<?php echo $row["cat_id"]; ?>" style="display:none">
                    <div class="form-group feild">
                        <label for="name">Category name : </label>
                        <input type="text" class="form-control" name="cat_name" id="cat_name"  value="<?php echo $row["cat_name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category description">Category description : </label>
                        <input type="text" class="form-control" name="cat_desc" id="cat_desc"  value="<?php echo $row["cat_desc"]; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="category type">Category Type : </label>
                        <input type="text" class="form-control" name="cat_type" id="cat_type"   value="<?php echo $row["cat_type"]; ?>">
                        
                    </div>
                    <div class="right">
                            <input class="btn btn-primary" type="submit" name="catUpdateDetails" id="catUpdateDetails" value="Update category">
                    </div>
                    </form>
                <!-- Form Ends -->
            </div>
        </div>
    </div>            