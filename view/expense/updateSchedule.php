<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
    require_once('./../../controller/expense/expenseController.php');
    if (isset($_GET['updateid'])) {
        $pay = new Payment();
        $pay_details = $pay->getPayId($_GET['updateid']);

        $row = mysqli_fetch_array($pay_details);
    }
    require_once('../../controller/user/userController.php');
?>

<?php include_once('header.php'); ?>
      
    <!-- Content Starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Expense</h1>
                <h2>Update expense</h2>
                <!-- Form Starts -->
                <form method="post" action="./../../controller/expense/expenseController.php">
                    <input id="p_id" type="text" name="p_id" value="<?php echo $row["p_id"]; ?>" style="display:none">
                    <div class="form-group field">
                        <select id="con_name" class="form-field" name="con_name">
                            <option value="default">Select contract name again  (<?php echo $row["con_name"]; ?>)</option>
                            <?php
                            $list = mysqli_query($conn,"SELECT con_name FROM contract ORDER BY con_name");
                            while ($row_ah = mysqli_fetch_assoc($list)) {
                            ?>
                            <option value="<?php echo $row_ah['con_name']; ?>"><?php echo $row_ah['con_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="con_name">Contract's Name : </label>
                    </div>
                    <div class="form-group field">
                        <select id="cat_name" class="form-field" name="cat_name">
                            <option value="default">Select contract name again  (<?php echo $row["cat_name"]; ?>)</option>
                            <?php
                            $list = mysqli_query($conn,"SELECT cat_name FROM category where cat_id != 1 ORDER BY cat_name");
                            while ($row_ah = mysqli_fetch_assoc($list)) {
                            ?>
                            <option value="<?php echo $row_ah['cat_name']; ?>"><?php echo $row_ah['cat_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="cat_name">Category Name : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_amount" name="p_amount" value="<?php echo $row["p_amount"]; ?>" >
                        <label class="form-label" for="p_amount">Amount(LKR) : </label>
                    </div>
                    <div class="form-group field">
                        <input type="Date" class="form-field" id="p_date" name="p_date" value="<?php echo $row["p_date"]; ?>">
                        <label class="form-label" for="p_date">Due Date : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_type" name="p_type" value="<?php echo $row["p_type"]; ?>">
                        <label class="form-label" for="p_type">Schedule type (Cash/Check) : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_desc" name="p_desc" value="<?php echo $row["p_desc"]; ?>">
                        <label class="form-label" for="p_desc">Schedule description : </label>
                    </div>
                    <div class="right">
                            <input class="btn btn-primary" type="submit" name="payUpdateDetails" id="payUpdateDetails" value="Update expense">
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