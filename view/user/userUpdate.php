<?php 

require_once('./../../controller/user/userController.php');
if (isset($_GET['updateid'])) {

	$user_detail = getSingleUser($_GET['updateid']);
	$row = mysqli_fetch_array($user_detail);
}
?>

<?php include_once('header.php'); ?>

<div class="container">
    <div class="row">
    <div class="col-7">
    <h3>User Information to Update</h3>
    <h6>Use Update User to Change Passwords and Update only for immediate actions</h6>
    <form method="post" action="./../../controller/user/userController.php">
		<div class="form-group field">
			<input type="text" class="form-field" id="u_nic" name="u_nic" value="<?php echo $row["u_id"]; ?>">
			<label for="u_nic" class="form-label">User ID</label>
		</div>
		<div class="form-group field">
			<input type="text" class="form-field" id="r_id" name="r_id" value="<?php echo $row["r_id"]; ?>">
			<label for="r_id" class="form-label">Role ID</label>
		</div>
		<div class="form-group field">
			<input type="text" class="form-field" id="u_firstname" name="u_firstname" value="<?php echo $row["u_firstname"]; ?>" disabled>
			<label for="u_firstname" class="form-label">First Name</label>
		</div>
		<div class="form-group field">
			<input type="textarea" class="form-field" id="u_lastname" name="u_lastname" value="<?php echo $row["u_lastname"]; ?>" disabled>
			<label for="u_lastname" class="form-label">Last Name</label>
		</div>
		<br>
		<h4>User Account Details</h4>
		<div class="form-group field">
			<input type="text" class="form-field" id="u_email" name="u_email" value="<?php echo $row["u_email"]; ?>" disabled>
			<label for="u_email" class="form-label">Email</label>
        </div>
		<div class="form-group field">
			<input type="password" class="form-field" id="pPwd" name="emp_type" placeholder="permanent/temporary/contract" value="<?php echo $row["u_password"]; ?>" disabled>
			<label for="pPwd" class="form-label">Previous Password(to Show User has a password)</label>
		</div>
		<!-- <div class="form-group field">
			<input type="password" class="form-field" id="u_new_pass" name="u_new_pass" value="">
			<label for="u_new_pass" class="form-label">New Password(if changing)</label>
		</div>
		<div class="form-group field">
			<input type="password" class="form-field" id="u_new_pass_con" name="u_new_pass_con" value="">
			<label for="u_new_pass_con" class="form-label">Confirm New Password</label>
		</div> -->
		<div class="right">
			<input type="submit" class="btn btn-primary" name="userUpdateDetails" value="Update User Info">
		</div>
	</form>
    </div>
    </div>
    </div>

	<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	