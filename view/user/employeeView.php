<?php 

require_once('./../../controller/user/employeeController.php');
require_once('./userHeader.php');

$employee = new Employee();
$result = $employee->getAllEmployee();

?>
<div class="container">
    <h1>Employee Information</h1>
    <table class="table table-hover">
    
    <tr>
        <td>Employee ID</td>
        <td>NIC</td>  
        <td>Name</td>
        <td>DOB</td>
        <td>Address</td>
        <td>Contact</td>
        <td>Emp Type</td>
        <td>Action</td>
    </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row["emp_id"]; ?></td>
        <td><?php echo $row["nic"]; ?></td>
        <td><?php echo $row["emp_name"]; ?></td>
        <td><?php echo $row["dob"]; ?></td>
        <td><?php echo $row["emp_address"]; ?></td>
        <td><?php echo $row["contact_num"]; ?></td>
        <td><?php echo $row["emp_type"]; ?></td>
        <td>
        <a class="btn btn-info" href="./../../controller/user/employeeController.php?viewid=<?php echo $row["emp_id"]; ?>">View</a>
        <a class="btn btn-warning" href="./employeeUpdate.php?updateid=<?php echo $row["emp_id"]; ?>">Update</a>
        <a class="btn btn-danger" href="./../../controller/user/employeeController.php?deleteid=<?php echo $row["nic"]; ?>">Delete</a>
        </td>
    </tr>
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
        NIC:<br>
		<input type="text" class="form-control" name="emp_nic">
		<br>
        Name:<br>
		<input type="text" class="form-control" name="emp_name">
		<br>
		DOB:<br>
		<input type="text" class="form-control" name="emp_dob">
		<br>
		Address:<br>
		<input type="textarea" class="form-control" name="emp_address">
		<br>
		Contact:<br>
		<input type="text" class="form-control" name="emp_contact" placeholder="+94123456789">
        <br>
		Employee Type :<br>
		<input type="text" class="form-control" name="emp_type" placeholder="permanent/temporary/contract">
        <br>
		<input type="submit" name="empDetails" value="submit">
	</form>
    </div>
    </div>
    </div>
    
</div>
</body>
</html>