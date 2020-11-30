<?php 
    session_start();
    require_once('./../../controller/user/userController.php'); 
    require_once('./header.php');
    require_once('./../../controller/contract/quotationController.php');
    
    if (isset($_GET['q_id'])) {
        $quo = new Quotation();
        $quo_details = $quo->getAllQuotation();
      }
    
      if(isset($_POST['delete_con'])){
        $con = new Contract();
        $con->deleteContract($_SESSION['contract_id']);
    }
?>

<div class="container">
    <h2>Quotation Single Page</h2>
    <h6 style="margin:0px">Items that are viable for this particular quotation and other quotation details</h6>
</div>
<div class="container">
    <h2>Quotation Details</h2>
    <h2>Item Details</h2>
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
            <td data-label="Item ID"><i>1</i></td>
            <td data-label="Name"><i>Wood Floor</i></td>
            <td data-label="Description"><i>Floor Mahogani</i></td>
            <td data-label="Price"><i>65,000</i></td>
            <td data-label="Action">
            <a class="btn btn-warning" href="#">&#x270E</a>
            <a class="btn btn-danger" href="#">&#x2716</a>
            </td>
          </tr>
          <tr>
            <td data-label="Item ID"><i>2</i></td>
            <td data-label="Name"><i>Hand Driller</i></td>
            <td data-label="Description"><i>Metal Model #10 Hand</i></td>
            <td data-label="Price"><i>45,000</i></td>
            <td data-label="Action">
            <a class="btn btn-warning" href="#">&#x270E</a>
            <a class="btn btn-danger" href="#">&#x2716</a>
            </td>
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