
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Employee Payments</h2>
        <br>
        <div class="form-group field">
          <input type="text" id="employee-name" onkeyup="f2()" class="form-field">
          <label for="employee-name" class="form-label">Search by employee name</label>
        </div>
        <br>
      <!-- Show Employee payments-->
      <table id="employee-filter">
          <thead>
                <th>Employee Name</th>
                <th>Contract's Name</th>
                <th>Amount(LKR)</th>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Payment Description</th>
                <th>Action</th>
          </thead>
          <?php
            $i=0;
            while($row = mysqli_fetch_array($result2)) {
          ?>
          <tbody>
              <tr>
                <td data-label="emp_name"><?php echo $row["emp_name"]; ?></td>
                <td data-label="con_name"><?php echo $row["con_name"]; ?></td>
                <td data-label="p_amount"><?php echo $row["p_amount"]; ?></td>
                <td data-label="p_date"><?php echo $row["p_date"]; ?></td>
                <td data-label="p_type"><?php echo $row["p_type"]; ?></td>
                <td data-label="p_desc"><?php echo $row["p_desc"]; ?></td>
                <td>
                      <a class="btn btn-warning" href="./updateEmpPayment.php?updateid=<?php echo $row["p_id"]; ?>">Update</a>
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
<script>
function f2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("employee-name");
  filter = input.value.toUpperCase();
  table = document.getElementById("employee-filter");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
