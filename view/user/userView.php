<?php require_once('./../../controller/user/userController.php');?> 
<?php
$result = getAll();
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Retrive Users</title>
 </head>
<body>
<h1>Users</h1>    
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
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
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["user_role_id"]; ?></td>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td>Actions</td>
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
    <h2>Add User</h2>
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
 </body>
</html>