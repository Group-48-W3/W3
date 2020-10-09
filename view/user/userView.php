<?php require_once('./../../controller/user/userController.php');?> 
<?php require_once('./userHeader.php');?> 
<?php
$result = getAll();
?>

<div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="container"> 
  <h3>System Users</h3>
  <table class="table table-hover">
  
  <tr>
    <td>User ID</td>
    <td>User Role</td>  
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email </td>
    <td>Action </td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["u_id"]; ?></td>
    <td><?php echo $row["r_id"]; ?></td>
    <td><?php echo $row["u_firstname"]; ?></td>
    <td><?php echo $row["u_lastname"]; ?></td>
    <td><?php echo $row["u_email"]; ?></td>
    <td>
    
    <a class="btn btn-warning" href="./userUpdate.php?updateid=<?php echo $row["u_id"]; ?>">Update</a>
    <a class="btn btn-danger" href="./../../controller/user/userController.php?userid=<?php echo $row["u_id"]; ?>">Delete</a>  
    
    </td>
</tr>
<?php
$i++;
}
?>
</table>

 <?php
}
else{
    echo "No result found";
}
?>
</br>
<div class="container">
<div class="row">
<div class="col-sm">

</div>
<div class="col-sm">

</div>
</div>
</div>
    <h2>Create New User Account</h2>
    <h6><strong>Notice : </strong>Making a user account allow to use the system in order to add/update/delete/search in certain user role are providing</h6>
    <form method="post" action="./../../controller/user/userController.php">
    User Role ID:<br>
		<input type="text" class="form-control" name="user_role">
		<br>
    First name:<br>
		<input type="text" class="form-control" name="first_name">
		<br>
		Last name:<br>
		<input type="text" class="form-control" name="last_name">
		<br>
		Email:<br>
		<input type="text" class="form-control" name="email">
		<br>
		Password:<br>
		<input type="password" class="form-control" name="password">
    <br>
    <small>Provide more than 8 characters</small>
    <br>
		Confirm Password:<br>
		<input type="password" class="form-control" name="cpassword">
    <br>
		<input type="submit" name="userdetails" value="submit">
	  </form>
    </div>
    </body>
</html>