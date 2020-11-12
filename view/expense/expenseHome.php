<?php
session_start();
require_once('./../../controller/user/userController.php');
include_once('header.php'); ?>

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
        <h2 class="card-title">LKR: 2,150</h1>
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
        <h2 class="card-title">LKR: 1,850</h1>
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
        <h2 class="card-title">LKR: 9,700</h1>
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
        <h2 id="value" class="card-title">LKR: 43,000</h1>
        <p class="card-text">Last 30 days expenses</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->
  <br>
  <h3>Summary income</h3>
  <div class="row">
    <!-- 1st card -->
    <div class="col-3">
    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h2 class="card-title">LKR: 225,350</h1>
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