<?php 
session_start();

if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
  }
require_once('./../../controller/user/userController.php');
require_once('./header.php');

$result = getAllUserRoles();


?>
<!--start of role view-->
<div class="container">
<h2>Roles Management</h2>
<h5>Role management inside the system environment</h5>
</div>

<div class="container"> 
<table class="data-table">
    <thead>
      <tr>
        <th>Role ID</th>  
        <th>Role Name</th>
        <th>Role Description</th>
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
          <td data-label="User ID"><?php echo $row["r_id"]; ?></td>
          <td data-label="First Name"><?php echo $row["r_name"]; ?></td>
          <td data-label="Last Name"><?php echo $row["r_desc"]; ?></td>
          <td data-label="Action">
            <a class="btn btn-warning" href="./userUpdate.php?updateid=<?php echo $row["r_id"]; ?>">&#x270E</a>
            <a class="btn btn-danger" href="./../../controller/user/userController.php?userid=<?php echo $row["r_id"]; ?>">&#x2716</a>  
          </td>
      </tr>
    <?php
      $i++;
      }
    ?>
    </tbody>
</table>
<!-- end of  -->
<div class="container col-8">
<h3>Create New User Role</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div class="form-group field">
      <input type="text" class="form-field" id="first_name" name="role_name">
      <label for="first_name" class="form-label">Role Name</label>
    </div>
    
    <div class="form-group field">
      <input type="text" class="form-field" id="last_name" name="role_description">
      <label for="last_name" class="form-label">Role Description</label>
    </div>
    <div class="right">
		  <input class="btn btn-primary" type="submit" name="roledetails" value="Submit">
    </div>
</form>
</div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	