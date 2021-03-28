<?php
    session_start();
    if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
    }
    //controller calling
    require_once('./../../controller/expense/expenseController.php');
    //payment object
    $payment = new Payment();
    $result1 = $payment->viewPayment();
    $result2 = $payment->viewSalary();
    $result3 = $payment->viewSchedule();	
    require_once('./../../controller/user/userController.php');
    include_once('header.php'); 
?>

<!-- Content Starts -->
<div class="container">
    <h1>Expenses</h1>
    <div class="row">
        <div class="col">
            <h2>Add Daily Expense</h2>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expenseController.php">
                <div class="form-group field">
                    <select id="con_name" class="form-field" name="con_name">
                        <option value="default">Select contract name</option>
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
                        <option value="default">Select expense category</option>
                        <?php
                        $list = mysqli_query($conn,"SELECT cat_name FROM category WHERE cat_id != 1 ORDER BY cat_name ");
                        while ($row_ah = mysqli_fetch_assoc($list)) {
                        ?>
                        <option value="<?php echo $row_ah['cat_name']; ?>"><?php echo $row_ah['cat_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label class="form-label" for="cat_name">Select expense category : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="p_amount" name="p_amount">
                    <label class="form-label" for="p_amount">Amount(LKR) : </label>
                </div>
                <div class="form-group field">
                    <input type="Date" class="form-field" id="p_date" name="p_date">
                    <label class="form-label" for="p_date">Date : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="p_type" name="p_type">
                    <label class="form-label" for="p_type">Payment type (Cash/Check) : </label>
                </div>
                <div class="form-group field field">
                    <label class="form-label">Schedule Status:</label><br>
                    <input type="radio" name="p_status" value="Paid">Paid
                    <input type="radio" name="p_status" value="Pending">Pending<br>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="p_desc" name="p_desc">
                    <label class="form-label" for="p_desc">Expense description : </label>
                </div>
                <div class="right">
                <input class="btn btn-primary" type="submit" name="payDetails" id="payDetails" value="Add Payment">
                </div>
            </form>
            <!-- Form Ends -->
        </div>
    
        <div class="col">
            <h2>Employee Payment</h2>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expenseController.php">
            <div class="form-group field">
                    <select id="con_name" class="form-field" name="con_name">
                        <option value="default">Select contract name</option>
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
                        <option value="default">Select employee Name</option>
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
                    <input type="text" class="form-field" id="p_amount" name="p_amount">
                    <label class="form-label" for="p_amount">Amount(LKR) : </label>
                </div>
                <div class="form-group field">
                    <input type="Date" class="form-field" id="p_date" name="p_date">
                    <label class="form-label" for="p_date">Date : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="p_type" name="p_type">
                    <label class="form-label" for="p_type">Payment type (Cash/Check) : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="p_desc" name="p_desc">
                    <label class="form-label" for="p_desc">Payment description : </label>
                </div>
                <div class="right">
                <input class="btn btn-primary" type="submit" name="salDetails" id="salDetails" value="Pay Salary">
                </div>
            </form>
             <!-- Form Ends -->
        </div>
    </div>
    <br>
</div>
<br>
<div class="tab">
    <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'viewExpense')">Daily Expenses</button>
    <button class="tablinks" onclick="openTab(event, 'employeePayments')">Employee Payments</button>
    <button class="tablinks" onclick="openTab(event, 'sheduledExpenses')">Scheduled Expenses</button>
</div>
<div id="viewExpense" class="tabcontent">
    <?php
        require_once('viewExpense.php');  
    ?>
</div>
<div id="employeePayments" class="tabcontent">
    <?php
        require_once('viewEmpPayment.php');  
    ?>
    
</div>
<div id="sheduledExpenses" class="tabcontent">
    <?php
        require_once('Schedule.php');
    ?> 

</div>
<!-- Content Ends -->

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	