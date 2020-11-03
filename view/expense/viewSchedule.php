<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Scheduled Expenses</h3>
      <br>
      <div id="myBtnContainer">
        <button class="btn active btn-primary" onclick="filterSelection('all')"> Show all</button>
        <button class="btn btn-primary" onclick="filterSelection('today')"> Today</button>
        <button class="btn btn-primary" onclick="filterSelection('yesterday')"> Tomorrow</button>
        <button class="btn btn-primary" onclick="filterSelection('30 days')"> Next Week</button>
        <button class="btn btn-primary" onclick="filterSelection('status')"> Next Month</button>
        </div>
      <!-- Show Expenses-->
      <table class="table table-hover" id="myTable">
          <thead>
              <tr>
              <th scope="col">Contract's Name</th>
              <th scope="col">Expense Category</th>
              <th scope="col">Amount(LKR)</th>
              <th scope="col">Due Date</th>
              <th scope="col">Shedule note</th>
              <th scope="col">Action</th>

              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <td>Sanken Lanka (pvt) LTD</td>
              <td>Transport</td>
              <td>12,150</td>
              <td>31.03.2021</td>
              <td>Furniture providing cost</td>
              <td>
                    <a class="btn btn-success" href="#">Paid</a>
                    <a class="btn btn-warning" href="#">Update</a>
                    <a class="btn btn-danger" href="#">Delete</a>
              </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>

</div>
<!-- Content Ends -->
</body>
</html>