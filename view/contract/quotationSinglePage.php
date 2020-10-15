<?php 
    require_once('./contractHeader.php');
    require_once('./../../controller/contract/quotationController.php');

    $result;
?>
<div class="container">
    <h2>Quotation Single Page</h2>
    <h6>Items that are viable for the quotation and other quotation details</h6>
</div>
<div class="container">
    <h3>Quotation Details</h3>
    <h3>Item Details</h3>
    <table class="table table-hover">
    
    <tr>
        <td>Item ID</td>
        <td>Name</td>  
        <td>Description</td>
        <td>Price</td>
        <td>Action</td>
    </tr>
    
    </table>

    </br>
    <h2>Add New Item</h2>
    <div class="container">
    <div class="row">
    <div class="col-7">
    <form method="post" action="./../../controller/user/employeeController.php">
        Name:<br>
		<input type="text" class="form-control" name="emp_nic" placeholder="Item Name">
		<br>
        Description:<br>
		<input type="text" class="form-control" name="emp_name" placeholder="Item Description">
		<br>
		Price:<br>
		<input type="text" class="form-control" name="emp_dob" placeholder="Item Price">
		<br>
		<input type="submit" name="empDetails" value="Add Item">
	</form>
    </div>
    </div>
    </div>
    
</div>
</body>
</html>