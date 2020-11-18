<?php
require_once('../../controller/user/userController.php');
include_once('header.php'); 
 ?>

<div class="container">
<h1>Admin Panel</h1>
<!-- Start the card View  -->
<div class="row">
    <!-- 1st card -->
    <div class="col-sm">
    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">7</h1>
        <p class="card-text">Users</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
    <!-- 2nd card -->
    <div class="col-sm">
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">25</h1>
        <p class="card-text">Employees</p>
      </div>
    </div>
    </div>
    <!-- end card 2 -->
    <!--3rd card  -->
    <div class="col-sm">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">24</h1>
        <p class="card-text">Notification/Message</p>
      </div>
    </div>
    </div>
    <!-- end card 3 -->
    <!-- 4th card  -->
    <div class="col-sm">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 id="value" class="card-title">8</h1>
        <p class="card-text">Permissions</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->
  <br>
  <h5>Welcome to the Admin Panel, These are some details you need to consider</h5>
</div> 
<!-- end of container  -->
</div>


<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	