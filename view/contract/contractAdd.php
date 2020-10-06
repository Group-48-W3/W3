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
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Contract" name="">
          <small id="" class="form-text text-muted">Give a suitable name for your project</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">StartDate : </label>
          <input type="text" class="form-control" id="" placeholder="StartDate">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">End Date : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="End Date" name="">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Location : </label>
          <input type="text" class="form-control" id="" placeholder="Location eg:- Colombo 7">
          <small id="" class="form-text text-muted">Provide the location by nearest main town</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Description" name="">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Status : </label>
          <input type="text" class="form-control" id="" placeholder="Status">
          <small id="" class="form-text text-muted">Status would be either ongoing or finished</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Payment Method : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Contract" name="">
          
        </div>
        
        <input type="submit" name="userdetails" value="submit">
      </form>
      <h4>Step 02 : Add Client Details</h4>
      <form method="post" action="./../../controller/contract/contractController.php">
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
        <input type="submit" name="userdetails" value="submit">
      </form>
    </div>
    <div class="col-4">
    <div class="alert alert-dismissible alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Please Be Noticed!</strong> This is about adding contract
      <h5>Step 01 :- Add Contract Settings</h5>
      <h5>Step 02 :- Add Client Details</h5>
      <h5>Step 03 :- Initial Step Record</h5>
    </div>
    </div>
  </div>



</div>

<!-- Content Ends -->
</body>
</html>