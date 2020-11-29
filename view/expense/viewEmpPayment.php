<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
require_once('../../controller/user/userController.php');
include_once('header.php'); ?>
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Employee Payments</h3>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by employee name..">
        <br>
      <!-- Show Employee payments-->
      <table class="table table-hover" id="myTable">
          <thead>
              <tr>
              <th scope="col">Employee Name</th>
              <th scope="col">Contract's Name</th>
              <th scope="col">Amount(LKR)</th>
              <th scope="col">Date</th>
              <th scope="col">Payment Type</th>
              <th scope="col">Payment Description</th>
              <th scope="col">Action</th>

              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <td>John Doe</td>
              <td>Sanken Lanka (pvt) LTD</td>
              <td>3,500</td>
              <td>31.10.2020</td>
              <td>Cash</td>
              <td>Full day working</td>
              <td>
                    <a class="btn btn-warning" href="#">Update</a>
                    <a class="btn btn-danger" href="#">Delete</a>
              </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>

</div>
<script>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
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

<!-- Content Ends -->
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	