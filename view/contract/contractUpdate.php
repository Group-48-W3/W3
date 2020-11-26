<?php
 session_start();
 require_once('./../../controller/user/userController.php'); 
 require_once('./header.php');
 ?>

<div class="container">
    <h1>Update Contract</h1>
    <!-- Contract details start -->
    <!-- Step 01 -->
    <h4>Step 01 : Update Contract Details</h4>
      <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group field">
          <input type="text" class="form-field" name="con_name" id="con_name" required>
          <label for="con_name" class="form-label">Contract Name</label>
        </div>
        <div class="form-group field">
          <input type="date" class="form-field" name="con_start_date" id="con_start_date" required>
          <label for="con_start_date" class="form-label">Start Date</label>
        </div>
        <div class="form-group field">
          <input type="date" class="form-field" name="con_end_date" id="con_end_date" required>
          <label for="con_end_date" class="form-label">End Date</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="con_location" id="con_location" required>
          <label for="con_location" class="form-label">Location</label>
          <small id="" class="form-text text-muted">Provide the location by nearest main town (Location eg:- Colombo 7)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="con_description" id="con_description" required>
          <label for="con_description" class="form-label">Description</label>
        </div>
        
        <div class="form-group field">
          <input type="text" class="form-field" name="con_payment" id="con_payment" required>
          <label for="con_payment" class="form-label">Payment Method</label>
        </div>
        
          <!-- Step 02 -->
        <h4>Step 02 : Update Client Details</h4>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_name" id="c_name">
          <label for="c_name" class="form-label">Client Name</label>
          <small id="" class="form-text text-muted">Give a fullname name for your client in lower case (eg:- nipun fernando)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_address" id="c_address">
          <label for="c_address" class="form-label">Client Address</label>
          <small id="" class="form-text text-muted">eg:- Reid Avenue, Colombo 7</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_company" id="c_company">
          <label for="c_company" class="form-label">Client Company</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_mobile" id="c_mobile">
          <label for="c_mobile" class="form-label">Client Mobile</label>
          <small class="form-text text-muted">provide mobile number +94 notation (eg:- +94123456789)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_email" id="c_email">
          <label for="c_email" class="form-label">Client Email</label>
        </div> 
        <input type="submit" class="btn btn-warning" name="contractUpdate" value="Update Contract">
      </form>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	