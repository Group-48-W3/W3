<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
    require_once('./../../controller/expense/incomeController.php');
    if (isset($_GET['updateid'])) {
        $inc = new Income();
        $inc_details = $inc->getIncId($_GET['updateid']);

        $row = mysqli_fetch_array($inc_details);
    }
    require_once('../../controller/user/userController.php');
?>

<?php include_once('header.php'); ?>
      
    <!-- Content Starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Income</h1>
                <h2>Update income</h2>
                <!-- Form Starts -->
                <form method="post" action="./../../controller/expense/incomeController.php">
                    <input id="inc_id" type="text" name="inc_id" value="<?php echo $row["inc_id"]; ?>" style="display:none">
                    <div class="form-group field">
                        <select id="con_name" class="form-field" name="con_name">
                            <option value="default">Select contract name again  (<?php echo $row["con_name"]; ?>)</option>
                            <?php
                            $list = mysqli_query($conn,"SELECT con_name FROM contract");
                            while ($row_ah = mysqli_fetch_assoc($list)) {
                            ?>
                            <option value="<?php echo $row_ah['con_name']; ?>"><?php echo $row_ah['con_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="con_name">Contract's Name : </label>
                    </div>
                    <div class="form-group field">
                        <input type="date" class="form-field" name="inc_date" id="inc_date"  value="<?php echo $row["inc_date"]; ?>">
                        <label class="form-label" for="inc_date">Date : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="inc_desc" id="inc_desc"  value="<?php echo $row["inc_desc"]; ?>" >
                        <label class="form-label" for="inc_desc">Income description : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="inc_amount" id="inc_amount"   value="<?php echo $row["inc_amount"]; ?>">
                        <label class="form-label" for="cat_type">Category Type : </label>
                    </div>
                    <div class="right">
                            <input class="btn btn-primary" type="submit" name="incUpdateDetails" id="incUpdateDetails" value="Update income">
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