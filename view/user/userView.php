<?php require_once('./../../controller/user/userController.php');?> 
<?php require_once('./userHeader.php');?> 
<?php
$result = getAll();
?>

<div class="container">
<h1>Admin Panel</h1>
<!-- Start the card View  -->
<div class="row">
    <!-- 1st card -->
    <div class="col-sm">
    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">7</h1>
        <p class="card-text">Users</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
    <!-- 2nd card -->
    <div class="col-sm">
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">6</h1>
        <p class="card-text">Contracts</p>
      </div>
    </div>
    </div>
    <!-- end card 2 -->
    <!--3rd card  -->
    <div class="col-sm">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">24</h1>
        <p class="card-text">Notification</p>
      </div>
    </div>
    </div>
    <!-- end card 3 -->
    <!-- 4th card  -->
    <div class="col-sm">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 id="value" class="card-title">8</h1>
        <p class="card-text">Permission</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->
</div> 
<!-- end of container  -->
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="container"> 
  <h3>Users</h3>
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
    <button type="button" class="btn btn-info">View</button>
    <button type="button" class="btn btn-warning">Update</button>
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
    </div>
 </body>
</html>