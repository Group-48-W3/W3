<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Scheduled Expenses</h2>
      <br>
      <!-- Show Expenses-->
      <table id="myTable">
          <thead>
              <th>Contract's Name</th>
                        <th>Expense Category</th>
                        <th>Amount(LKR)</th>
                        <th>Due Date</th>
                        <th>Shedule Type</th>
                        <th>Shedule Description</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result3)) {
                    ?>
                    <tbody>
                        <tr>
                            <td data-label="con_name"><?php echo $row["con_name"]; ?></td>
                            <td data-label="cat_name"><?php echo $row["cat_name"]; ?></td>
                            <td data-label="p_amount"><?php echo $row["p_amount"]; ?></td>
                            <td data-label="p_date"><?php echo $row["p_date"]; ?></td>
                            <td data-label="p_type"><?php echo $row["p_type"]; ?></td>
                            <td data-label="p_desc"><?php echo $row["p_desc"]; ?></td>
                            <td data-label="Action">
                                    <a class="btn btn-success" href="./../../controller/expense/expenseController.php?paidid=<?php echo $row["p_id"]; ?>">Paid</a>
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
