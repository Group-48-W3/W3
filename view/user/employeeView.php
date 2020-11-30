<?php 
//controller calling
require_once('../../controller/user/userController.php');
require_once('./../../controller/user/employeeController.php');
//employee object
$employee = new Employee();
$result = $employee->getAllEmployee();
?>

<?php include_once('header.php'); ?>

<div class="container">
    <h1>Employee Information</h1>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>NIC</th>  
                <th>Name</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Emp Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
        ?>
        <tbody>
            <tr>
                <td data-label="Employee ID"><?php echo $row["emp_id"]; ?></td>
                <td data-label="NIC"><?php echo $row["nic"]; ?></td>
                <td data-label="Name"><?php echo $row["emp_name"]; ?></td>
                <td data-label="DOB"><?php echo $row["dob"]; ?></td>
                <td data-label="Address"><?php echo $row["emp_address"]; ?></td>
                <td data-label="Contact"><?php echo $row["contact_num"]; ?></td>
                <td data-label="Emp Type"><?php echo $row["emp_type"]; ?></td>
                <td data-label="Action">
                <!-- notation ? parameter = value  -->
                <a class="btn btn-warning" href="./employeeUpdate.php?updateid=<?php echo $row["emp_id"]; ?>">&#x270E</a>
                <a class="btn btn-danger" href="./../../controller/user/employeeController.php?deleteid=<?php echo $row["nic"]; ?>">&#x2716</a>
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

    </br>
    <h2>Add New Employee</h2>
    <div class="container">
    <div class="row">
    <div class="col-7">
    <form method="post" action="./../../controller/user/employeeController.php">
        <div class="form-group field">
            <input type="text" class="form-field" name="emp_nic" id="emp_nic">
            <label for="emp_nic" class="form-label">NIC</label>
        </div>
        <div class="form-group field">
            <input type="text" class="form-field" name="emp_name" id="emp_name">
            <label for="emp_name" class="form-label">Name</label>
        </div>
        <div class="form-group field">
            <input type="text" class="form-field" name="emp_dob" id="emp_dob">
            <label for="emp_dob" class="form-label">DOB</label>
        </div>

        <div class="form-group field">
            <input type="textarea" class="form-field" name="emp_address" id="emp_address">
            <label for="emp_address" class="form-label">Address</label>
        </div>

        <div class="form-group field">
            <input type="text" class="form-field" name="emp_contact" id="emp_contact">
            <label for="emp_contact" class="form-label">Contact</label>
            <small class="form-text text-muted">eg:- +94123456789</small>
        </div>

        <div class="form-group field">
            <!-- <input type="text" class="form-field" name="emp_type" id="emp_type" > -->
            <select id="emp_type" name="emp_type" class="form-field">
                <option value="permanent">permanent</option>
                <option value="temporary">temporary</option>
                <option value="contract">contract</option>
            </select>
            <label for="emp_type" class="form-label">Employee Type</label>
            <small class="form-text text-muted">permanent/temporary/contract</small>
        </div>
        <div class="right">
		    <input class="btn btn-primary" type="submit" name="empDetails" value="Submit">
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