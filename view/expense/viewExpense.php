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
      <h3>Expenses</h3>
      <br>
      <div id="myBtnContainer">
        <button class="btn active btn-primary" onclick="filterSelection('all')"> Show all</button>
        <button class="btn btn-primary" onclick="filterSelection('cars')"> Today</button>
        <button class="btn btn-primary" onclick="filterSelection('animals')"> Yesterday</button>
        <button class="btn btn-primary" onclick="filterSelection('fruits')"> Last 30 days</button>
        <button class="btn btn-primary" onclick="filterSelection('colors')"> Pending</button>
        </div>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by contract name..">
        <br>
      <!-- Show Expenses-->
      <table class="table table-hover" id="myTable">
          <thead>
              <tr>
              <th scope="col">Contract's Name</th>
              <th scope="col">Expense Category</th>
              <th scope="col">Amount(LKR)</th>
              <th scope="col">Date</th>
              <th scope="col">Payment Type</th>
              <th scope="col">Status</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>

              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <td>Sanken Lanka (pvt) LTD</td>
              <td>Transport</td>
              <td>12,150</td>
              <td>31.10.2020</td>
              <td>Cash</td>
              <td>Paid</td>
              <td>Furniture providing cost</td>
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