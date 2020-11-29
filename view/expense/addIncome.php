<?php
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
  require_once('../../controller/user/userController.php');
  include_once('header.php'); 
?>

<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Income</h1>
      <h2>Add Income</h2>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/expensetController.php">
      <div class="form-group field">
        <select id="conName" class="form-field" name="Select contract name :">
            <option value="default">Select contract name</option>
            <option value="cid1">Sanken Lanka pvt Ltd</option>
            <option value="cid2">Hotel Shrangrilla</option>
            <option value="cid2">Hotel Romi</option>
        </select>
        <label class="form-label" for="conName">Contract's Name : </label>
      </div>
        <div class="form-group field">
          <input type="text" class="form-field" id="incomeDescription">
          <label class="form-label" for="incomeDescription">Income description : </label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" id="incomeAmount" aria-describedby="emailHelp">
          <label class="form-label" for="incomeAmount">Amount(LKR) : </label>
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