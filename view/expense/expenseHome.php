<?php
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
require_once('./../../controller/user/userController.php');
include_once('header.php'); 
require_once('./../../controller/expense/incomeController.php');
  //income object
  $income = new Income();
  $result = $income->totalIncome();
  $row = mysqli_fetch_array($result);

  require_once('./../../controller/expense/expenseController.php');
  require_once('./../../controller/contract/invoiceController.php');
  //expense object
  $payment = new Payment();
  $result1 = $payment->tExpense();
  $row1 = mysqli_fetch_array($result1);
  $result2 = $payment->yExpense();
  $row2 = mysqli_fetch_array($result2);
  $result3 = $payment->wExpense();
  $row3 = mysqli_fetch_array($result3);
  $result4 = $payment->mExpense();
  $row4 = mysqli_fetch_array($result4);
  $result5 = $payment->maintenanceCost();
  $row5 = mysqli_fetch_array($result5);

  //get invoice data
  $invo = new Invoice();
  $result6 = $invo->getAllInvoiceIncomewithinMonth();
  $res6 = mysqli_fetch_array($result6);
  
  $final_income = (int)$row["inc_amount"] + (int)$res6['total'];
?>

<div class="container">
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert"></button>
        View <a href="./viewSchedule.php" class="alert-link" style="text-decoration: none">scheduled expenses</a>.
    </div>
    <h3>Summary expenses</h3>
  <!-- Start the card View  -->
  <div class="row">
    <!-- 1st card -->
    <div class="col-sm">
    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 class="card-title">LKR: <?php echo $row1["p_texpense"]; ?></h1>
        <p class="card-text">Today's expenses</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
    <!-- 2nd card -->
    <div class="col-sm">
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 class="card-title">LKR: <?php echo $row2["p_yexpense"]; ?></h1>
        <p class="card-text">Yesterday's expenses</p>
      </div>
    </div>
    </div>
    <!-- end card 2 -->
    <!--3rd card  -->
    <div class="col-sm">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 class="card-title">LKR: <?php echo $row3["p_wexpense"]; ?></h1>
        <p class="card-text">Last 7 days expenses</p>
      </div>
    </div>
    </div>
    <!-- end card 3 -->
    <!-- 4th card  -->
    <div class="col-sm">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 id="value" class="card-title">LKR:  <?php echo $row4["p_mexpense"]; ?></h1>
        <p class="card-text">Last 30 days expenses</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->
  <br>
  <h3>Summary maintenance expense</h3>
  <div class="row">
    <!-- 1st card -->
    <div class="col-3">
      <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h2 class="card-title">LKR: <?php echo $row5["cost"]; ?></h1>
          <p class="card-text">Maintenance cost</p>
        </div>
      </div>
    </div>
  </div> 
   <br> 
  <h3>Summary income</h3>
  <div class="row">
    <!-- 1st card -->
    <div class="col-3">
    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 class="card-title">LKR: <?php echo $final_income; ?></h1>
        <p class="card-text">Last month all incomes</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
  </div>


</div>  

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	