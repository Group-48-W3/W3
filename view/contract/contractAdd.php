<?php require_once('./contractHeader.php');?>
<!-- Content Starts -->
<div class="container">
<h2>Create New Contracts</h2>
  <div class="row">
    <div class="col-8">
    
      <h4>step 01 : Add Contract Details</h4>
      <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Contract Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Contract" name="c_id">
          <small id="" class="form-text text-muted">Give a suitable name for your project</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">StartDate : </label>
          <input type="text" class="form-control" id="" placeholder="StartDate" name="start_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">End Date : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="End Date" name="end_date">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Location : </label>
          <input type="text" class="form-control" id="" placeholder="Location eg:- Colombo 7" name="location">
          <small id="" class="form-text text-muted">Provide the location by nearest main town</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Description" name="description">
          
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Status : </label>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
            <label class="custom-control-label" for="customRadio1">Active</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">Inactive</label>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Payment Method : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Contract" name="">
          
        </div>
      
      <h4>Step 02 : Add Client Details</h4>
      
        <div class="form-group">
          <label for="exampleInputEmail1">Client Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Client Name" name="">
          <small id="" class="form-text text-muted">Give a suitable name for your client</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Client Address : </label>
          <input type="text" class="form-control" id="" placeholder="eg:- Reid Avenue, Colombo 7">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Client Company : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Company" name="">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Client Mobile: </label>
          <input type="text" class="form-control" id="" placeholder="+94123456789">
          <small id="" class="form-text text-muted">provide a number +94 notation</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Client Email : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Email" name="">
          
        </div>

        <h4>Step 03 : Initial Step Record(Quotation Selection)</h4>
        <!-- Form Step 03 -->
        <div class="form-group">
          <label for="exampleSelect2">Select Quotation</label>
          <select multiple="" class="form-control" id="exampleSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <!-- Form Step 03 ends -->
        <input type="submit" name="userdetails" value="submit">
      </form>
    </div>
    <div class="col-4">
      <div class="alert alert-dismissible alert-info">
        
        <strong>Please Be Noticed!</strong> This is about adding contract
        <h5>Step 01 :- Add Contract Settings</h5>
        <h5>Step 02 :- Add Client Details</h5>
        <h5>Step 03 :- Initial Step Record (Quotation Selection)</h5>
      </div>
      <div class="alert alert-dismissible alert-warning">
        
        <strong>Please Add the correct status!</strong>
        <h5>Green :- Ongoing</h5>
        <h5>Yellow :- Fresh</h5>
        <h5>Red :- Already Finished</h5>
      </div>
    </div>
  </div>



</div>

<!-- Content Ends -->
</body>
</html>