<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
require_once('../../controller/user/userController.php');
include_once('header.php'); ?>
<!-- Content Starts -->
<div class="container">
    <h1>Schedule</h1>
    <div class="row">
        <div class="col-12">
        
            <h2>Schedule an Expense</h2>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group field">
                    <select class="form-field" id="conName" name="Select contract name :">
                        <option value="default">Select contract name</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                    <label class="form-label" for="conName">Contract's Name : </label>
                </div>
                <div class="form-group field">
                    <select class="form-field" id="expCat" name="Select expense category :">
                        <option value="default">Select expense category</option>
                        <option value="catid1">Food</option>
                        <option value="catid2">Transport</option>
                        <option value="catid3">Wood stock</option>
                    </select>
                    <label class="form-label" for="expCat">Select expense category : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="expAmount">
                    <label class="form-label" for="expAmount">Amount(LKR) : </label>
                </div>
                <div class="form-group field">
                    <input type="Date" class="form-field" id="expDate">
                    <label class="form-label" for="expDate"> Due Date : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="expDesc">
                    <label class="form-label" for="expDesc">Schedule note : </label>
                </div>
                <div class="right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- Form Ends -->
        </div>
    </div>

</div>
<!-- Content Ends -->
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	