<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
    <div class="row">
        <div class="col-5">
        
            <h4>Add Daily Expense</h4>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group">
                    <label for="Contract's Name">Contract's Name : </label>
                    <select id="" name="Select contract name :">
                        <option value="default">Select contract name....</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Select expense category">Select expense category : </label>
                    <select id="" name="Select expense category :">
                        <option value="default">Select expense category....</option>
                        <option value="catid1">Food</option>
                        <option value="catid2">Transport</option>
                        <option value="catid3">Wood stock</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="amount">Amount(LKR) : </label>
                <input type="text" class="form-control"  placeholder="amount">
                </div>
                <div class="form-group">
                <label for="date">Date : </label>
                <input type="Date" class="form-control"  placeholder="">
                </div>
                <div class="form-group">
                <label for="amount">Payment type : </label>
                <input type="text" class="form-control" placeholder="cash">
                </div>
                <label for="status">Status : </label>
                <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                <label class="custom-control-label" >Paid</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"  onclick="getConfirmation() ">
                <label class="custom-control-label">Pending</label>
                </div>
                <div class="form-group">
                <label for="expense description">Expense description : </label>
                <input type="text" class="form-control" id="" placeholder="description" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- Form Ends -->
        </div>
    
        <div class="col-5">
            <h4>Exployee Payment</h4>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group">
                    <label for="Contract's Name">Contract's Name : </label>
                    <select id="" name="Select contract name :">
                        <option value="default">Select contract name...</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Employee Name">Exployee Name : </label>
                    <select id="" name="Select Employee name :">
                        <option value="default">Select employee name...</option>
                        <option value="eid1">Sunil Perera</option>
                        <option value="eid1">Kamal Goonarathna</option>
                        <option value="eid1">Shammi Fernando</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="amount">Amount(LKR) : </label>
                <input type="text" class="form-control"  placeholder="amount">
                </div>
                <div class="form-group">
                <label for="date">Date : </label>
                <input type="Date" class="form-control"  placeholder="">
                </div>
                <div class="form-group">
                <label for="amount">Payment type : </label>
                <input type="text" class="form-control" placeholder="cash">
                </div>
                <div class="form-group">
                <label for="payment description">Expense description : </label>
                <input type="text" class="form-control" id="" placeholder="description" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             <!-- Form Ends -->

             <div class="row">
                <div class="col-3">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <a href="#" class="alert-link">view daily expenses </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <a href="#" class="alert-link">view employee payments</a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <a href="#" class="alert-link">view scheduled expenses</a>
                    </div>
                </div>      
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
</body>
</html>