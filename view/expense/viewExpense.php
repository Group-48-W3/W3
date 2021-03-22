
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Expenses</h2>
      <br>
      <div id="myBtnContainer">
        <button class="btn active btn-primary" onclick="filterSelection('all')"> Show all</button>
        <button class="btn btn-primary" onclick="filterSelection('cars')"> Today</button>
        <button class="btn btn-primary" onclick="filterSelection('animals')"> Yesterday</button>
        <button class="btn btn-primary" onclick="filterSelection('fruits')"> Last 30 days</button>
        </div>
        <br>
        <div class="form-group field">
          <input type="text" id="con_name" class="form-field">
          <label for="con_name" class="form-label">Search by contract name</label>
        </div>
        <br>
      <!-- Show Expenses-->
      <table>
          <thead>
              <tr>
                <th>Contract's Name</th>
                <th>Expense Category</th>
                <th>Amount(LKR)</th>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
          </thead>
          <?php
            $i=0;
            while($row = mysqli_fetch_array($result1)) {
          ?>
          <tbody>
              <tr>
                <td data-label="con_name"><?php echo $row["con_name"]; ?></td>
                <td data-label="cat_name"><?php echo $row["cat_name"]; ?></td>
                <td data-label="p_amount"><?php echo $row["p_amount"]; ?></td>
                <td data-label="p_date"><?php echo $row["p_date"]; ?></td>
                <td data-label="p_type"><?php echo $row["p_type"]; ?></td>
                <td data-label="p_desc"><?php echo $row["p_desc"]; ?></td>
                <td>
                      <a class="btn btn-warning" href="./updateExpense.php?updateid=<?php echo $row["p_id"]; ?>">Update</a>
                      <a class="btn btn-danger" href="./../../controller/expense/expenseController.php?deleteid=<?php echo $row["p_id"]; ?>">Delete</a>
                </td>
              </tr>
          </tbody>
          <?php
            $i++;
            }
            if($i==0){
                echo "No results ";
            }
          ?>
      </table>
    </div>
  </div>

</div>

<!-- Content Ends -->
