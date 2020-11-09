<?php 
include_once('header.php'); 
require_once('./../../controller/user/userController.php');
?>

<div class="container">
  <h1>Reports & Statistics</h1>
  <div class="row">
    <div class="col-sm">
      <h3>Basic Reports</h3>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h1 class="card-title">Master Report</h1>
          <p class="card-text">About Contracts,Quotation Activity</p>
        </div>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h1 class="card-title">Storage Report</h1>
          <p class="card-text">About Inventory Details</p>
        </div>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h1 class="card-title">Account Report</h1>
          <p class="card-text">Money Inflow/Outflow (Expense/Income)</p>
        </div>
      </div>
      <br>
    </div> 
    <div class="col-sm">
      <h3>Non Basic Reports</h3>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h1 class="card-title">Progress Report</h1>
          <p class="card-text">Select a Specific Contract to Continue</p>
        </div>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
          <h1 class="card-title">Employee Report</h1>
          <p class="card-text">Employee Information and Staff</p>
        </div>
      </div>
      <br>
    </div>  
  </div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	