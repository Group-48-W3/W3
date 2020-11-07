<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
    <h3>Schedule</h3>
    <div class="row">
        <div class="col-12">
        
            <h4>Schedule an Expense</h4>
            <!-- Form Starts -->
            <form method="post" action="./../../controller/expense/expensetController.php">
                <div class="form-group">
                    <label for="Contract's Name">Contract's Name : </label>
                    <select id="" name="Select contract name :">
                        <option value="default">Select contract name</option>
                        <option value="cid1">Sanken Lanka pvt Ltd</option>
                        <option value="cid2">Hotel Shrangrilla</option>
                        <option value="cid3">Hotel Romi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Select expense category">Select expense category : </label>
                    <select id="" name="Select expense category :">
                        <option value="default">Select expense category</option>
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
                <label for="date"> Due Date : </label>
                <input type="Date" class="form-control"  placeholder="">
                </div>
                <div class="form-group">
                <label for="expense description">Schedule note : </label>
                <input type="text" class="form-control" id="" placeholder="optional" >
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