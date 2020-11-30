<?php 
	require_once('./../../controller/user/employeeController.php');
	if (isset($_GET['updateid'])) {
		$emp = new Employee();
		$emp_details = $emp->getSingleEmployee($_GET['updateid']);

		$row = mysqli_fetch_array($emp_details);
	}
	require_once('../../controller/user/userController.php');
	include_once('header.php');
?>
<!--Body starts  -->
<div class="container">
    <div class="row">
		<div class="col-7">
			<h3>Employeee Information to Update</h3>
			<form method="post" action="./../../controller/user/employeeController.php">
				<div class="form-group field">
					<input type="text" class="form-field" id="emp_nic" name="emp_nic" value="<?php echo $row["nic"]; ?>">
					<label for="emp_nic" class="form-label">NIC</label>
				</div>
				<div class="form-group field">
					<input type="text" class="form-field" name="emp_name" id="emp_name" value="<?php echo $row["emp_name"]; ?>">
					<label for="emp_name" class="form-label">Name</label>
				</div>
				<div class="form-group field">
					<input type="text" class="form-field" name="emp_dob" id="emp_dob" value="<?php echo $row["dob"]; ?>">
					<label for="emp_dob" class="form-label">DOB</label>
				</div>
				<div class="form-group field">
					<input type="textarea" class="form-field" name="emp_address" id="emp_address" value="<?php echo $row["emp_address"]; ?>">
					<label for="emp_address" class="form-label">Address</label>
				</div>
				<div class="form-group field">
					<input type="text" class="form-field" name="emp_contact" id="emp_contact" placeholder="+94123456789" value="<?php echo $row["contact_num"]; ?>">
					<label for="emp_contact" class="form-label">Contact</label>
				</div>
				<div class="form-group field">
					<input type="text" class="form-field" name="emp_type" id="emp_type" placeholder="permanent/temporary/contract" value="<?php echo $row["emp_type"]; ?>">
					<label for="emp_type" class="form-label">Employee Type</label>
				</div>
				<input type="submit" name="empUpdateDetails" value="Update Info" class="btn btn-primary">
			</form>
		</div>
    </div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	