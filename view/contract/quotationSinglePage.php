<?php 
    session_start();
    require_once('./../../controller/user/userController.php'); 
    require_once('./header.php');
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
    <table>  
        <thead>
            <th>Item ID</th>
            <th>Name</th>  
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            <td data-label="Item ID"><i>Item ID</i></td>
            <td data-label="Name"><i>Name</i></td>
            <td data-label="Description"><i>Description</i></td>
            <td data-label="Price"><i>Price</i></td>
            <td data-label="Action"><i>Action</i></td>
          </tr>
        </tbody>
    </table>

    </br>
    <h2>Add New Item</h2>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <form method="post" action="./../../controller/user/employeeController.php">
                    <div class="form-group field">
                        <input type="text" class="form-field" name="emp_nic" id="itemName">
                        <label for="itemName" class="form-label">Item Name</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="emp_name" id="itemDesc">
                        <label for="itemDesc" class="form-label">Item Description</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="emp_dob" id="itemPrice">
                        <label for="itemPrice" class="form-label">Item Price</label>
                    </div>
                    <br>
                    <div class="right">
                        <input type="submit" name="empDetails" value="Add Item" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	