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
    <a class="btn btn-info" href="./../../controller/user/userController.php?viewid=<?php echo $row["u_id"]; ?>">View</a>
    <a class="btn btn-warning" href="./../../controller/user/userController.php?updateid=<?php echo $row["u_id"]; ?>">Update</a>
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
    <h2>Add User Account</h2>
    <form method="post" action="./../../controller/user/userController.php">
    User Role ID:<br>
		<input type="text" name="user_role">
		<br>
    First name:<br>
		<input type="text" name="first_name">
		<br>
		Last name:<br>
		<input type="text" name="last_name">
		<br>
		Email:<br>
		<input type="text" name="email">
		<br>
		Password:<br>
		<input type="password" name="password">
        <br>
		Confirm Password:<br>
		<input type="password" name="cpassword">
        <br>
		<input type="submit" name="userdetails" value="submit">
	  </form>
    </div>
    </body>
</html>