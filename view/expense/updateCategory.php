<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
    require_once('./../../controller/expense/categoryController.php');
    if (isset($_GET['updateid'])) {

        if($_GET['updateid'] != 1) {
            $cat = new Category();
            $cat_details = $cat->getCatId($_GET['updateid']);
            $row = mysqli_fetch_array($cat_details);
        } else {
            header('HTTP/1.1 403 Forbidden');
        }

    }
    require_once('../../controller/user/userController.php');
?>

<?php if($_GET['updateid'] != 1): ?>
<?php include_once('header.php'); ?>
      
    <!-- Content Starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Category</h1>
                <h2>Update expense category</h2>
                <!-- Form Starts -->
                <form method="post" action="./../../controller/expense/categoryController.php">
                    <input id="cat_id" type="text" name="cat_id" value="<?php echo $row["cat_id"]; ?>" style="display:none">
                    <div class="form-group field">
                        <input type="text" class="form-field" name="cat_name" id="cat_name"  value="<?php echo $row["cat_name"]; ?>">
                        <label class="form-label" for="cat_name">Category name : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="cat_desc" id="cat_desc"  value="<?php echo $row["cat_desc"]; ?>" >
                        <label class="form-label" for="cat_desc">Category description : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="cat_type" id="cat_type"   value="<?php echo $row["cat_type"]; ?>">
                        <label class="form-label" for="cat_type">Category Type : </label>
                    </div>
                    <div class="right">
                            <input class="btn btn-primary" type="submit" name="catUpdateDetails" id="catUpdateDetails" value="Update category">
                    </div>
                </form>
                <!-- Form Ends -->
            </div>
        </div>
    </div>            

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>
}
<?php endif ?>