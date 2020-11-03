<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Income</h3>
      <h4>Add Income</h4>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/expensetController.php">
      <div class="form-group">
        <label for="Contract's Name">Contract's Name : </label>
        <select id="" name="Select contract name :">
            <option value="default">Select contract name</option>
            <option value="cid1">Sanken Lanka pvt Ltd</option>
            <option value="cid2">Hotel Shrangrilla</option>
            <option value="cid2">Hotel Romi</option>
        </select>
      </div>
        <div class="form-group">
          <label for="income description">Income description : </label>
          <input type="text" class="form-control" id="" placeholder="description" >
        </div>
        <div class="form-group">
          <label for="amount">Amount(LKR) : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="amount">
          
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
    </div>
  </div>
</div>

<!-- Content Ends -->
</body>
</html>