<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
    require_once('header.php');
?>

<h1>Suppliers</h1>
<div class="container">
    <h2>Add new supplier</h2>
    <div class="form-group field">
        <input type="text" id="supName" class="form-field">
        <label for="supName" class="form-label">Name</label>
    </div>
    <div class="form-group field">
        <input type="text" id="supMail" class="form-field">
        <label for="supMail" class="form-label">Email</label>
    </div>
    <div class="form-group field">
        <input type="text" id="supMob" class="form-field">
        <label for="supMob" class="form-label">Mobile</label>
    </div>
    <div class="form-group field">
        <input type="text" id="supAddress" class="form-field">
        <label for="supAddress" class="form-label">Address</label>
    </div>
    <div class="right">
        <button class="btn btn-primary">Submit</button>
    </div>
</div>
<br>
<div class="container">
  <h2>Suppliers List</h2>
  <table>
    <thead>
      <tr>
        <th width="25%">Name</th>
        <th width="20%">Email</th>
        <th width="20%">Telephone</th>
        <th width="20%">Address</th>
        <th width="15%">Status</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td data-label="Item Code"><i>Name</i></td>
        <td data-label="Maintaner"><i>Email</i></td>
        <td data-label="Cost Code"><i>Telephone</i></td>
        <td data-label="Date of Pickup"><i>Address</i></td>
        <td data-label="Option"><button class="btn btn-secondary">&#10004</button></td>
      </tr>
      <tr>
        <td data-label="Item Code"><i>Name</i></td>
        <td data-label="Maintaner"><i>Email</i></td>
        <td data-label="Cost Code"><i>Telephone</i></td>
        <td data-label="Date of Pickup"><i>Address</i></td>
        <td data-label="Option"><button class="btn btn-secondary">&#9888</button></td>
      </tr>
    </tbody>
  </table>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	