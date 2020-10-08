<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>

<h2>Recent Issues</h2>
<div class="container center">
	<table class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Item</th>
				<th>Quantity</th>
				<th>Date</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
			<tr>
				<td data-label="ID">01</td>
				<td data-label="Item">Nails</td>
				<td data-label="Quantity">20</td>
				<td data-label="Date">2019.06.07</td>
				<td data-label="Description">Issued to Sarath</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
	require_once('left_sidebar.php');
	require_once('footer.php');
?>