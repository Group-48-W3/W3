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
        $pay_details1 = $pay->getPayId1($_GET['updateid']);

        $row = mysqli_fetch_array($pay_details1);
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
                        <select id="emp_name" class="form-field" name="emp_name">
                            <option value="default">Select employee name again (<?php echo $row["emp_name"]; ?>)</option>
                        <?php
                            $list = mysqli_query($conn,"SELECT emp_name FROM employee ORDER BY emp_name");
                            while ($row_ah = mysqli_fetch_assoc($list)) {
                        ?>
                        <option value="<?php echo $row_ah['emp_name']; ?>"><?php echo $row_ah['emp_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label class="form-label" for="emp_name">Employee Name : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_amount" name="p_amount" value="<?php echo $row["p_amount"]; ?>" >
                        <label class="form-label" for="p_amount">Amount(LKR) : </label>
                    </div>
                    <div class="form-group field">
                        <input type="Date" class="form-field" id="p_date" name="p_date" value="<?php echo $row["p_date"]; ?>">
                        <label class="form-label" for="p_date">Date : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_type" name="p_type" value="<?php echo $row["p_type"]; ?>">
                        <label class="form-label" for="p_type">Payment type (Cash/Check) : </label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" id="p_desc" name="p_desc" value="<?php echo $row["p_desc"]; ?>">
                        <label class="form-label" for="p_desc">Expense description : </label>
                    </div>
                    <div class="right">
                            <input class="btn btn-primary" type="submit" name="payUpdateDetails1" id="payUpdateDetails1" value="Update salary">
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