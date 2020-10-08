<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-6">
    
      <h4>Add Daily Expense</h4>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/expensetController.php">
      <div class="form-group">
        <label for="Contract's Name">Contract's Name : </label>
        <select id="" name="Select contract name :">
            <option value="default">...Select contract name....</option>
            <option value="cid1">Sanken Lanka pvt Ltd</option>
            <option value="cid2">Hotel Shrangrilla</option>
            <option value="cid3">Hotel Romi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="Select expense category">Select expense category : </label>
        <select id="" name="Select expense category :">
            <option value="default">...Select expense category....</option>
            <option value="catid1">Food</option>
            <option value="catid2">Transport</option>
            <option value="catid3">Wood stock</option>
        </select>
      </div>
        <div class="form-group">
          <label for="amount">Amount(LKR) : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="amount">
        </div>
        <div class="form-group">
          <label for="date">Date : </label>
          <input type="Date" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
          <label for="amount">Payment type : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="optional">
        </div>
        <label for="status">Status : </label>
        <div class="custom-control custom-radio">
         <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
         <label class="custom-control-label" for="customRadio1">Paid</label>
        </div>
        <div class="custom-control custom-radio">
         <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
         <label class="custom-control-label" for="customRadio2">Pending</label>
        </div>
        <div class="form-group">
          <label for="expense description">Expense description : </label>
          <input type="text" class="form-control" id="" placeholder="description" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
      <br> 
    </div>
  </div>
  <div class="row">
    <div class="col-6">
    
      <h4>Employee Payment</h4>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/expensetController.php">
        <div class="form-group">
          <label for="amount">Amount(LKR) : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="amount">
        </div>
        <div class="form-group">
          <label for="date">Date : </label>
          <input type="Date" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
          <label for="expense description">Expense description : </label>
          <input type="text" class="form-control" id="" placeholder="description" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
      <br>
      <div class="row">
        <div class="col-6"> 
            <button type="submit" class="btn btn-success">View expenses</button>
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-warning">Schedule an expense</button>
        </div>
       <br> 
    </div> 
  </div>
</div>

<!-- Content Ends -->
</body>
</html>