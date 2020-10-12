<?php 
require_once('./contractHeader.php');
require_once('./../../controller/contract/contractController.php');

?>
<!-- Content Starts -->
<div class="container">
<h2>Create New Contracts</h2>
  <div class="row">
    <div class="col-7">
    <!-- Step 01 -->
      <h4>step 01 : Add Contract Details</h4>
      <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label>StartDate : </label>
          <input type="text" class="form-control" placeholder="Contract Name" name="con_name" required>
        </div>
        <div class="form-group">
          <label>StartDate : </label>
          <input type="text" class="form-control" placeholder="StartDate" name="con_start_date" required>
        </div>
        <div class="form-group">
          <label>End Date : </label>
          <input type="text" class="form-control" placeholder="End Date" name="con_end_date" required>
          
        </div>
        <div class="form-group">
          <label>Location : </label>
          <input type="text" class="form-control" placeholder="Location eg:- Colombo 7" name="con_location" required>
          <small id="" class="form-text text-muted">Provide the location by nearest main town</small>
        </div>
        <div class="form-group">
          <label>Description : </label>
          <input type="text" class="form-control" placeholder="Description" name="con_description" required>
          
        </div>
        <div class="form-group">
        <label>Status : </label><br>
        <input type="radio" name="con_status" value="Active"> Active<br>
        <input type="radio" name="con_status" value="Inactive"> Inactive<br>
        </div>
        <div class="form-group">
          <label>Payment Method : </label>
          <input type="text" class="form-control" placeholder="Payment Method" name="con_payment" required>
          
        </div>
        <input type="submit" name="contractadd" value="Create Contract">
      </form>
      <form method="post" action="./../../controller/contract/contractController.php">
      <!-- Step 02 -->
      <h4>Step 02 : Add Client Details</h4>
      
        <div class="form-group">
          <label >Client Name : </label>
          <input type="text" class="form-control" placeholder="Client Name" name="c_name">
          <small id="" class="form-text text-muted">Give a suitable name for your client</small>
        </div>
        <div class="form-group">
          <label >Client Address : </label>
          <input type="text" class="form-control"  placeholder="eg:- Reid Avenue, Colombo 7" namr="c_address">
        </div>
        <div class="form-group">
          <label >Client Company : </label>
          <input type="text" class="form-control" placeholder="Company" name="c_company">
          
        </div>
        <div class="form-group">
          <label >Client Mobile: </label>
          <input type="text" class="form-control"  placeholder="+94123456789" name="c_mobile">
          <small id="" class="form-text text-muted">provide a number +94 notation</small>
        </div>
        <div class="form-group">
          <label >Client Email : </label>
          <input type="text" class="form-control"  placeholder="Email" name="c_email">
          
        </div>

        <input type="submit" name="clientadd" value="Create Client">
      </form>
    </div>
    <div class="col-4">
      <div class="alert alert-dismissible alert-info">
        
        <strong>Please Be Noticed!</strong>
        <h5>Step 01 :- Add Contract Settings</h5>
        <h5>Step 02 :- Add Client Details</h5>
        <h5>Step 03 :- Initial Step Record (Quotation Selection)</h5>
        <h5>Step 04 :- Employee Selection</h5>
      </div>
      <div class="alert alert-dismissible alert-warning">
        
        <strong>Please Add the correct status!</strong>
        <h5>Page 01 :- Step 01 & Step 02</h5>
        <h5>Page 02 :- Step 03 & Step 04</h5>
        <h5>Already Finished</h5>
      </div>
    </div>
  </div>



</div>

<!-- Content Ends -->
</body>
</html>