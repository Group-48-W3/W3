<?php
    session_start();
    require_once('../../controller/user/userController.php');
    include_once('header.php'); 
?>

<!-- Content Starts -->
<div class="container">
    <h1>Expenses</h1>
    <div class="row">
        <div class="col">
            <h2>Add Daily Expense</h2>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group field">
                    <select class="form-field" id="cName" name="Select contract name :">
                        <option value="default">Select contract name</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                    <label for="cName" class="form-label">Contract's Name : </label>
                </div>
                <div class="form-group field">
                    <select class="form-field" id="expenseCategory" name="Select expense category :">
                        <option value="default">Select expense category</option>
                        <option value="catid1">Food</option>
                        <option value="catid2">Transport</option>
                        <option value="catid3">Wood stock</option>
                    </select>
                    <label class="form-label" for="expenseCategory">Select expense category : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="expenseAmount">
                    <label class="form-label" for="expenseAmount">Amount(LKR) : </label>
                </div>
                <div class="form-group field">
                    <input type="Date" class="form-field" id="expenseDate">
                    <label class="form-label" for="expenseDate">Date : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="paymentType">
                    <label class="form-label" for="paymentType">Payment type (Cash/Check) : </label>
                </div>
                <div class="form-group field field">
                    <label class="form-label">Schedule Status:</label><br>
                    <input type="radio" name="pay_status" value="Active">Paid
                    <input type="radio" name="pay_status" value="Inactive">Pending<br>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="expenseDescription">
                    <label class="form-label" for="expenseDescription">Expense description : </label>
                </div>
                <div class="right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- Form Ends -->
        </div>
    
        <div class="col">
            <h2>Employee Payment</h2>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group field">
                    <select class="form-field" id="cName2" name="Select contract name :">
                        <option value="default">Select contract name</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                    <label class="form-label" for="cName2">Contract's Name : </label>
                </div>
                <div class="form-group field">
                    <select class="form-field" id="empName" name="Select Employee name :">
                        <option value="default">Select employee name</option>
                        <option value="eid1">Sunil Perera</option>
                        <option value="eid1">Kamal Goonarathna</option>
                        <option value="eid1">Shammi Fernando</option>
                    </select>
                    <label class="form-label" for="empName">Exployee Name : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="payAmount">
                    <label class="form-label" for="payAmount">Amount(LKR) : </label>
                </div>
                <div class="form-group field">
                    <input type="Date" class="form-field" id="payDate">
                    <label class="form-label" for="payDate">Date : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="payType">
                    <label class="form-label" for="payType">Payment type (Cash/Check) : </label>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" id="payDesc">
                    <label class="form-label" for="payDesc">Payment description : </label>
                </div>
                <div class="right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
             <!-- Form Ends -->
        </div>
    </div>
    <br>
</div>
<br>
<div class="tab">
    <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'viewExpense')">Daily Expenses</button>
    <button class="tablinks" onclick="openTab(event, 'employeePayments')">Employee Payments</button>
    <button class="tablinks" onclick="openTab(event, 'sheduledExpenses')">Scheduled Expenses</button>
</div>
<div id="viewExpense" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Daily Expenses</h2>
                <br>
                <div id="container">
                    <div class="form-group field">
                        <input type="text" id="conName" onkeyup="myFunction()" class="form-field">
                        <label class="form-label" for="conName">Search by contract name</label>
                    </div>
                    <br><br>
                    <button class="btn active btn-primary" onclick="filterSelection('all')"> Show all</button>
                    <button class="btn btn-primary" onclick="filterSelection('cars')"> Today</button>
                    <button class="btn btn-primary" onclick="filterSelection('animals')"> Yesterday</button>
                    <button class="btn btn-primary" onclick="filterSelection('fruits')"> Last 30 days</button>
                    <button class="btn btn-primary" onclick="filterSelection('colors')"> Pending</button>
                    </div>
                <!-- Show Expenses-->
                    <table id="myTable">
                        <thead>
                            <th>Contract's Name</th>
                            <th>Expense Category</th>
                            <th>Amount(LKR)</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Contract's Name">Sanken Lanka (pvt) LTD</td>
                                <td data-label="Expense Category">Transport</td>
                                <td data-label="Amount(LKR)">12,150</td>
                                <td data-label="Date">31.10.2020</td>
                                <td data-label="Payment Type">Cash</td>
                                <td data-label="Status">Paid</td>
                                <td data-label="Description">Furniture cost</td>
                                <td data-label="Action">
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
    </div>
</div>
<div id="employeePayments" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Employee Payments</h2>
                <br>
                <div class="form-group field">
                    <input type="text" id="empName" onkeyup="myFunction()" class="form-field">
                    <label for="empName" class="form-label">Search by employee name</label>
                </div>
                <br>
                <!-- Show Employee payments-->
                <table id="myTable">
                    <thead>
                        <th>Employee Name</th>
                        <th>Contract's Name</th>
                        <th>Amount(LKR)</th>
                        <th>Date</th>
                        <th>Payment Type</th>
                        <th>Payment Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Employee Name">John Doe</td>
                            <td data-label="Contract's Name">Sanken Lanka (pvt) LTD</td>
                            <td data-label="Amount(LKR)">3,500</td>
                            <td data-label="Date">31.10.2020</td>
                            <td data-label="Payment Type">Cash</td>
                            <td data-label="Payment Description">Full day working</td>
                            <td data-label="Action">
                                    <a class="btn btn-warning" href="#">Update</a>
                                    <a class="btn btn-danger" href="#">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    </div>
</div>
<div id="sheduledExpenses" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Scheduled Expenses</h2>
                <br>
                <div id="container">
                    <button class="btn active btn-primary" onclick="filterSelection('all')"> Show all</button>
                    <button class="btn btn-primary" onclick="filterSelection('today')"> Today</button>
                    <button class="btn btn-primary" onclick="filterSelection('yesterday')"> Tomorrow</button>
                    <button class="btn btn-primary" onclick="filterSelection('30 days')"> Next Week</button>
                    <button class="btn btn-primary" onclick="filterSelection('status')"> Next Month</button>
                </div>
                <!-- Show Expenses-->
                <table id="myTable">
                    <thead>
                        <th>Contract's Name</th>
                        <th>Expense Category</th>
                        <th>Amount(LKR)</th>
                        <th>Due Date</th>
                        <th>Shedule note</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Contract's Name">Sanken Lanka (pvt) LTD</td>
                            <td data-label="Expense Category">Transport</td>
                            <td data-label="Amount(LKR)">12,150</td>
                            <td data-label="Due Date">31.03.2021</td>
                            <td data-label="Shedule note">Furniture providing cost</td>
                            <td data-label="Action">
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
</div>
<!-- Content Ends -->

<!-- Schedule alert script, on click radio button -->
<script type = "text/javascript">       
    function getConfirmation() {
        var retVal = confirm("Do you want to schedule an expense ?");
        if( retVal == true ) {
            window.location.href = "#"
            return true;
        }
    }
</script>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	