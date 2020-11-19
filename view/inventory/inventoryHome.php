<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	require_once('../../controller/inventory/rawMaterialController.php');
	require_once('../../controller/inventory/toolController.php');
	require_once('header.php');
	$rawMaterial = new RawMaterial();
	$tool = new Tool();		
?>

<h1>Current Inventory</h1>
<div class="container">
	<h2>Quick Details</h2>
	<div class="row center">
		<div class="col-sm">
			<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">5000 sq.ft</h1>
				<p class="card-text">Wood Available</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">45</h1>
				<p class="card-text">Available Tools</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 class="card-title">0</h1>
				<p class="card-text">Need Re-order</p>
			</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
			<div class="card-body">
				<h1 id="value" class="card-title">2</h1>
				<p class="card-text">Under Maintenance</p>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="container ">
	<h2>Raw Materials</h2>

	<div class="tab">
		<?php
			$i=0;
			$category = $rawMaterial->getAllRawMaterialCategory();
			while($categories = mysqli_fetch_array($category)) {
				if($i==0) {
		?>
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, 'r<?php echo $categories['inv_code'];?>')">
			<?php echo $categories["mat_name"]; ?>
		</button>
		<?php
				} else {
		?>
		<button class="tablinks" onclick="openTab(event, 'r<?php echo $categories['inv_code'];?>')">
			<?php echo $categories["mat_name"]; ?>
		</button>
		<?php
				}
				$i++;
			}
			if($i==0){
				echo "No results ";
			}
		?>
	</div>
	<?php
		$i=0;
		$category = $rawMaterial->getAllRawMaterialCategory();
		while($categories = mysqli_fetch_array($category)) {
			$inventoryCode = $categories['inv_code'];
	?>
	<div id="r<?php echo $inventoryCode;?>" class="tabcontent">
		<div class="container center">
			<h5>Details of Available <?php echo $categories['mat_name'];?>s</h5>
			<div class="row">
				<div class="col">
				<p><b>Description: </b><?php echo $categories['inv_desc'];?></p>
				</div>
				<div class="col">
					<p><b>Minimum Quantity Required: </b><?php echo $categories['min_qty'];?></p>
				</div>
			</div>
		</div>
		<table class="data-table">
			<thead>
				<th>Material Type</th>
				<th>Unit Price</th>
				<th>Available Quantity</th>
			</thead>
			<tbody>
		<?php
			$j=0;
			$details = $rawMaterial->getRawMaterialDetails($inventoryCode);
			while($types = mysqli_fetch_array($details)) {
		?>
		<tr>
				<td data-label="Material Type"><?php echo $types["mat_type"]; ?></td>
				<td data-label="Unit Price">Rs. <?php echo $types["unit_price"]; ?></td>
				<td data-label="Available Quantity"><?php echo $types["mat_qty"]; ?></td>
		</tr>
		<?php
				$j++;
			}
			if($j==0){
		?>
				<td data-label="Material Type"><i>Details Unavailable</i></td>
				<td data-label="Unit Price"><i>Details Unavailable</i></td>
				<td data-label="Available Quantity"><i>Details Unavailable</i></td>
		<?php }
		?>
			</tbody>
		</table>
	</div>
	<?php
			$i++;
		}
		if($i==0){
			echo "No results ";
		}
	?>

	<h2>Tools</h2>

	<div class="tab">
		<?php
			$i=0;
			$toolCategory = $tool->getAllToolCategory();
			while($toolCategories = mysqli_fetch_array($toolCategory)) {
				if($i==0) {
		?>
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, <?php echo $toolCategories['inv_code'];?>)">
			<?php echo $toolCategories["tool_name"]; ?>
		</button>
		<?php
				} else {
		?>
		<button class="tablinks" onclick="openTab(event, <?php echo $toolCategories['inv_code'];?>)">
			<?php echo $toolCategories["tool_name"]; ?>
		</button>
		<?php
				}
				$i++;
			}
			if($i==0){
				echo "No results ";
			}
		?>
	</div>
	<?php
		$i=0;
		$toolCategory = $tool->getAllToolCategory();
		while($toolCategories = mysqli_fetch_array($toolCategory)) {
			$toolCategoryID = $toolCategories['inv_code'];
	?>
	<div id="<?php echo $toolCategoryID;?>" class="tabcontent">
		<div class="container center">
			<h5>Details of Available <?php echo $toolCategories['tool_name'];?>s</h5>
			<div class="row">
				<div class="col">
				<p><b>Description: </b><?php echo $toolCategories['inv_desc'];?></p>
				</div>
				<div class="col">
					<p><b>Minimum Quantity Required: </b><?php echo $toolCategories['min_qty'];?></p>
				</div>
			</div>
		</div>
		<table class="data-table">
			<thead>
				<th>Registered ID</th>
				<th>Manufacturer</th>
				<th>Price</th>
				<th>Available Quantity</th>
			</thead>
			<tbody>
		<?php
			$j=0;
			$tools = $tool->getToolDetails($toolCategoryID);
			while($toolDetails = mysqli_fetch_array($tools)) {
		?>
		<tr>
				<td data-label="Registered ID"><?php echo $toolDetails["tool_id"]; ?></td>
				<td data-label="Manufacturer"><?php echo $toolDetails["tool_manu"]; ?></td>
				<td data-label="Price">Rs. <?php echo $toolDetails["tool_value"]; ?></td>
				<td data-label="Available Quantity"><?php echo $toolDetails["tool_qty"]; ?></td>
		</tr>
		<?php
				$j++;
			}
			if($j==0){
		?>
				<td data-label="Registered ID"><i>Details Unavailable</i></td>
				<td data-label="Manufacturer"><i>Details Unavailable</i></td>
				<td data-label="Price"><i>Details Unavailable</i></td>
				<td data-label="Available Quantity"><i>Details Unavailable</i></td>
		<?php }
		?>
			</tbody>
		</table>
	</div>
	<?php
			$i++;
		}
		if($i==0){
			echo "No results ";
		}
	?>
</div>


<?php
	require_once('leftSidebar.php');
	require_once('footer.php');
?>