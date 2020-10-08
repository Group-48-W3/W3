<?php 

require_once('./../../controller/user/employeeController.php');
require_once('./userHeader.php');
if (isset($_GET['updateid'])) {
    $emp = new Employee();
    $emp_details = $emp->getSingleEmployee($_GET['updateid']);

    $row = mysqli_fetch_array($emp_details);
}
?>

<div class="container">
    <div class="row">
    <div class="col-7">
    <h3>Employeee Information to Update</h3>
    <form method="post" action="./../../controller/user/employeeController.php">
        NIC:<br>
		<input type="text" class="form-control" name="emp_nic" value="<?php echo $row["nic"]; ?>">
		<br>
        Name:<br>
		<input type="text" class="form-control" name="emp_name" value="<?php echo $row["emp_name"]; ?>">
		<br>
		DOB:<br>
		<input type="text" class="form-control" name="emp_dob" value="<?php echo $row["dob"]; ?>">
		<br>
		Address:<br>
		<input type="textarea" class="form-control" name="emp_address" value="<?php echo $row["emp_address"]; ?>">
		<br>
		Contact:<br>
		<input type="text" class="form-control" name="emp_contact" placeholder="+94123456789" value="<?php echo $row["contact_num"]; ?>">
        <br>
		Employee Type :<br>
		<input type="text" class="form-control" name="emp_type" placeholder="permanent/temporary/contract" value="<?php echo $row["emp_type"]; ?>">
        <br>
		<input type="submit" name="empUpdateDetails" value="Update Info">
	</form>
    </div>
    </div>
    </div>
</body>
</html>