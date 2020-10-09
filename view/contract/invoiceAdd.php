<?php require_once('./contractHeader.php');?>

<div class="container">
<h1>Invoice</h1>
<div class="container">
<div class="row">
<div class="col-8">
<!-- Form Starts -->
<form method="post" action="./../../controller/contract/contractController.php">
        <h3>Step 01 : Contract Details</h3>
        <div class="form-group">
          <label for="exampleInputEmail1">Contract Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Contract" name="c_id">
          <small id="" class="form-text text-muted">Select the Contract Name</small>
        </div>
        <h3>Step 02 : Client Details</h3>
        <div class="form-group">
          <label for="exampleInputEmail1">Client Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Client Name" name="">
          <small id="" class="form-text text-muted">Select the client</small>
        </div>
        <h3>Step 03 : Invoice Details</h3>
        <div class="form-group">
          <label for="exampleInputEmail1">Date : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Date of Issue" name="c_id">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Payment Type :</label>
          <input type="text" class="form-control" id="" placeholder="Payment Type" name="start_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Purpose : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Purpose" name="end_date">  
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Amount : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Amount" name="end_date">  
        </div>
        
        <button type="submit" class="btn btn-primary"><a href="./invoicePrint.php">Create Invoice</a></button>
</form>
<!-- Form Ends -->
</div>
</div>
</div>

</div>  
</body>
</html>