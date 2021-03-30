<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
{
  header('location:index.php?lmsg=true');
  exit;
}		
require_once('./../../controller/user/userController.php');
include_once('header.php');
?> 

<?php

$result = getAll();
?>

<div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="container"> 
  <h2>System Users</h2>
  <table class="data-table">
    <thead>
      <tr>
        <th>User ID</th>
        <th>User Role</th>  
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email </th>
        <th>Action </th>
      </tr>
    </thead>
    <!-- get details -->
    <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
    ?>
    <tbody>
      <tr>
          <td data-label="User ID"><?php echo $row["u_id"]; ?></td>
          <td data-label="User Role"><?php echo $row["r_id"]; ?></td>
          <td data-label="First Name"><?php echo $row["u_firstname"]; ?></td>
          <td data-label="Last Name"><?php echo $row["u_lastname"]; ?></td>
          <td data-label="Email"><?php echo $row["u_email"]; ?></td>
          <td data-label="Action">
            <a class="btn btn-warning" href="./userUpdate.php?updateid=<?php echo $row["u_id"]; ?>">&#x270E</a>
            <a class="btn btn-danger" href="./../../controller/user/userController.php?userid=<?php echo $row["u_id"]; ?>">&#x2716</a>  
          </td>
      </tr>
    <?php
      $i++;
      }
    ?>
    </tbody>
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
      <div class="col-sm"></div>
      <div class="col-sm"></div>
    </div>
  </div>
  <!-- add new user -->
  <h2>Create New User Account</h2>
  <h6><strong>Notice : </strong>Making a user account allow to use the system in order to add/update/delete/search in certain user role are providing</h6>
  <form method="post" action="./../../controller/user/userController.php">
    <div class="form-group field">
      <!-- <input type="text" class="form-field" id="user_role" name="user_role"> -->
      <label for="user_role" class="form-label">User Role ID</label>
      <select id="user_role" name="user_role" class="form-field">
        <option value="1">Admin</option>
        <option value="2">Owner</option>
        <option value="3">Accountant</option>
        <option value="4">Stockkeeper</option>
        <option value="5">Manager</option>
      </select>
    </div>

    <div class="form-group field">
      <input type="text" class="form-field" id="first_name" name="first_name">
      <label for="first_name" class="form-label">First name</label>
    </div>
    
    <div class="form-group field">
      <input type="text" class="form-field" id="last_name" name="last_name">
      <label for="last_name" class="form-label">Last name</label>
    </div>
    
    <div class="form-group field">
      <input type="text" class="form-field" id="email" name="email">
      <label for="email" class="form-label">Email</label>
    </div>
    
    <div class="form-group field">
      <input type="password" class="form-field" id="password" name="password">
      <label for="password" class="form-label">Password(Temporary)</label>
      <small class="form-text text-muted">Provide more than 8 characters(Only for creating account)</small>
    </div>
    
    <div class="form-group field">
      <input type="password" class="form-field" id="cpassword" name="cpassword">
      <label for="cpassword" class="form-label">Confirm Password(Temporary)</label>
    </div>
    
    <div class="right">
		  <input class="btn btn-primary" type="submit" name="userdetails" value="Submit">
    </div>
	</form>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	