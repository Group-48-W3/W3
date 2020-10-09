<?php 

require_once('./../../controller/user/userController.php');
require_once('./userHeader.php');
if (isset($_GET['updateid'])) {

	$user_detail = getSingleUser($_GET['updateid']);
	$row = mysqli_fetch_array($user_detail);
}
?>

<div class="container">
    <div class="row">
    <div class="col-7">
    <h3>User Information to Update</h3>
    <h6>Use Update User to Change Passwords and Update only for immediate actions</h6>
    <form method="post" action="./../../controller/user/userController.php">
        User ID:<br>
		<input type="text" class="form-control" name="u_nic" value="<?php echo $row["u_id"]; ?>">
		<br>
        Role ID:<br>
		<input type="text" class="form-control" name="r_id" value="<?php echo $row["r_id"]; ?>">
		<br>
		DOB:<br>
		<input type="text" class="form-control" name="u_firstname" value="<?php echo $row["u_firstname"]; ?>">
		<br>
		Address:<br>
		<input type="textarea" class="form-control" name="u_lastname" value="<?php echo $row["u_lastname"]; ?>">
		<br>
		<br>
		<h4>User Account Details</h4>
		<br>
		Email:<br>
		<input type="text" class="form-control" name="u_email" placeholder="+94123456789" value="<?php echo $row["u_email"]; ?>">
        <br>
		Previous Password :<br>
		<input type="password" class="form-control" name="emp_type" placeholder="permanent/temporary/contract" value="<?php echo $row["u_password"]; ?>">
		<br>
		New Password(if changing):<br>
		<input type="text" class="form-control" name="u_new_pass" value="">
		<br>
        Confirm New Password:<br>
		<input type="text" class="form-control" name="u_new_pass_con" value="">
		<br>
		<input type="submit" name="userUpdateDetails" value="Update User Info">
	</form>
    </div>
    </div>
    </div>
</body>
</html>