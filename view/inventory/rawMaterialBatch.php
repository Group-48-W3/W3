<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
    require_once('header.php');
?>
<a href="inventoryHome.php">&#8592 Back to Home</a>
<h1> Batch Details of <i>Material Name</i></h1>
<div class="container">
  <h2>Suppliers List</h2>
  <table>
    <thead>
      <tr>
        <th>Batch ID</th>
        <th>Added Date</th>
        <th>Expiry Date</th>
        <th>Unit Price</th>
        <th>Available Quanitity</th>
        <th>Stored Location</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td><i>Data</i></td>
        <td><i>Data</i></td>
        <td><i>Data</i></td>
        <td><i>Data</i></td>
        <td><i>Data</i></td>
        <td><i>Data</i></td>
      </tr>
    </tbody>
  </table>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	