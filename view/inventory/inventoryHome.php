<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>

<h2>Current Inventory</h2>
<div class="container">
	<h3>Quick Details</h3>
	<div class="row center">
		<div class="col-sm">
			<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">5</h1>
				<p class="card-text">Contracts</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">45</h1>
				<p class="card-text">Activities</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">29</h1>
				<p class="card-text">Quotations</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 id="value" class="card-title">0</h1>
				<p class="card-text">Invoices</p>
			</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="container center">
	<h3>Raw Materials</h3>
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
	<h3>Tools</h3>
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
<h2>Recent Issues</h2>
<div class="container center">
	<div class="tab">
		<button class="tablinks" onclick="openTab(event, 'recentTools')">Tools</button>
		<button class="tablinks" onclick="openTab(event, 'recentRawMaterials')">Raw Materials</button>
	</div>
	<div id="recentTools" class="tabcontent">
		<h2>Tools</h2>
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
	<div id="recentRawMaterials" class="tabcontent">
		<h2>Raw Materials</h2>
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
</div>

<?php
	require_once('leftSidebar.php');
	require_once('footer.php');
?>