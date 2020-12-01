<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	require_once('../../controller/inventory/rawMaterialController.php');
	require_once('../../controller/inventory/toolController.php');
	require_once('../../controller/inventory/supplierController.php');
	require_once('header.php');
	$rawMaterial = new RawMaterial();
	$tool = new Tool();
	$supplier = new Supplier();
	$user_role = $_SESSION['r_id'];	
?>

<h1>Current Inventory</h1>
<div class="container">
	<h2>Quick Details</h2>
	<div class="row">
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
				<p class="card-text">Active Suppliers</p>
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
	<div class="row">
		<div class="col">
			<div class="left">
				<span>Show: </span>
				<select name="" id="rmViewRows" class="" width="15px">
					<option value="5">5 records</option>
					<option value="10">10 records</option>
					<option value="25">25 records</option>
					<option value="50">50 records</option>
				</select>
			</div>
		</div>
		<div class="col">
			<div class="right">
				<span>Sort By: </span>
				<select name="" id="">
					<option value="">Category</option>
					<option value="">Price</option>
					<option value="">Available Quantity</option>
				</select>
				<select name="" id="">
					<option value="">ASC</option>
					<option value="">DESC</option>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<table class="data-table paginated">
				<thead>
					<th width="15%">Name</th>
					<th width="40%">Description</th>
					<th>Available Batches</th>
					<th>Total Quantity</th>
					<th>Reorder Value</th>
					<th width="11%">Average Price</th>
					<?php if($user_role==2){ ?>
					<th>Edit</th>
					<?php } ?>
				</thead>
				<tbody>
					<?php
						$i=0;
						$result = $rawMaterial->getAllRawMaterialCategory();
						while($row = mysqli_fetch_array($result)) {
							$batch = $rawMaterial->getBatchDetails($row["inv-code"]);
							$batchRow = mysqli_fetch_array($batch);
					?>
						<tr>
							<td data-label="Name"><?php echo $row["mat-name"]; ?></td>
							<td data-label="Description"><?php echo $row["inv-desc"]; ?></td>
							<td data-label="Available Batches"><a href="rawMaterialBatch.php?material=<?php echo $row["inv-code"]; ?>"><?php echo $batchRow["batch-count"]?></a></td>
							<td data-label="Total Quantity"><?php echo $batchRow["total-amount"]?></td>
							<td data-label="Reorder Value"><?php echo $row["min-qty"]; ?></td>
							<td data-label="Average Price">Rs. <?php echo $batchRow["avg-price"]?></td>
							<?php if($user_role==2){ ?>
							<td data-label="Edit"><a href="" class="btn btn-warning">&#x270E</a></td>
							<?php } ?>
						</tr>
					<?php
						$i++;
						}
						if($i==0){
					?>
					<tr><td colspan="8"><center>Sorry, No Results to Show!</center></td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<?php
		$i++;
		if($i==0){
			echo "No results ";
		}
	?>

	<h2>Tools</h2>
	<div class="row">
		<div class="col">
			<div class="left">
				<span>Show: </span>
				<select name="" id="" class="" width="15px">
					<option value="">5 records</option>
					<option value="">10 records</option>
					<option value="">25 records</option>
					<option value="">50 records</option>
				</select>
			</div>
		</div>
		<div class="col">
			<div class="right">
				<span>Sort By: </span>
				<select name="" id="">
					<option value="">Category</option>
					<option value="">Price</option>
					<option value="">Available Quantity</option>
					<option value="">Manufacturer</option>
					<option value="">Status</option>
				</select>
				<select name="" id="">
					<option value="">ASC</option>
					<option value="">DESC</option>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<table class="data-table">
				<thead>
					<th>Reg ID</th>
					<th>Category</th>
					<th>Description</th>
					<th>Image</th>
					<th>Location</th>
					<th>Stock</th>
					<th>Price (Rs)</th>
					<th>Manufacturer</th>
					<th>Added</th>
					<th>Status</th>
					<?php if($user_role==2){ ?>
					<th>Edit</th>
					<?php } ?>
				</thead>
				<tbody>
					<tr>
						<td>12Af6</td>
						<td>Jig Saw</td>
						<td>Cut irregular curves</td>
						<td><a href="#">img.jpg</a></td>
						<td>Rack 23</td>
						<td>1</td>
						<td>3200</td>
						<td>CAT Saws</td>
						<td>2020:10:12</td>
						<td>
							OK
						</td>
						<?php if($user_role==2){ ?>
						<td>
							<a href="" class="btn btn-warning">&#x270E</a>
						</td>
						<?php } ?>
					</tr>
					<tr>
						<td>MT4544f</td>
						<td>Nail Gun</td>
						<td>Drive nails into woods</td>
						<td><a href="#">img.jpg</a></td>
						<td>Rack 34</td>
						<td>1</td>
						<td>2500</td>
						<td>Bostitch Tools</td>
						<td>2020:10:19</td>
						<td>
							<a href="maintenance.php">&#9888</a>
						</td>
						<?php if($user_role==2){ ?>
						<td>
							<a href="" class="btn btn-warning">&#x270E</a>
						</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br>

	<h2>Suppliers</h2>
	<div class="row">
		<div class="col">
			<div class="left">
				<span>Show: </span>
				<select name="" id="" class="" width="15px">
					<option value="">5 records</option>
					<option value="">10 records</option>
					<option value="">25 records</option>
					<option value="">50 records</option>
				</select>
			</div>
		</div>
		<div class="col">
			<div class="right">
				<span>Sort By: </span>
				<select name="" id="">
					<option value="">Name</option>
					<option value="">Status</option>
					<option value="">Added Date</option>
				</select>
				<select name="" id="">
					<option value="">ASC</option>
					<option value="">DESC</option>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<table class="data-table paginated">
				<thead>
					<th>Name</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Address</th>
					<th>Status</th>
					<th>Added On</th>
					<?php if($user_role==2){ ?>
					<th>Edit</th>
					<?php } ?>
				</thead>
				<tbody>
				<?php
					$i=0;
					$result = $supplier->getAllSuppliers();
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td data-label="Name"><?php echo $row["sup-name"]; ?></td>
					<td data-label="Email"><?php echo $row["sup-email"]; ?></td>
					<td data-label="Telephone"><?php echo $row["sup-mobile"]; ?></td>
					<td data-label="Address"><?php echo $row["sup-address"]; ?></td>
					<td data-label="Status"><?php if($row["sup-status"] == 1) {echo "Active";} else {echo "Inactive";} ?></td>
					<td data-label="Added On"><?php echo $row["sup-created-on"]; ?></td>
					<?php if($user_role==2){ ?>
					<td>
						<a href="" class="btn btn-warning">&#x270E</a>
					</td>
					<?php } ?>
				</tr>
				<?php
					$i++;
					}
					if($i==0){
				?>
				<tr><td colspan="8"><center>Sorry, No Results to Show!</center></td></tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$('table.paginated').each(function () {
        var currentPage = 0;
        var numPerPage = 5; // number of items 
        var $table = $(this);
        //var $tableBd = $(this).find("tbody");

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<span class="page-number"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        if (numRows > numPerPage) {
            $pager.insertAfter($table).find('span.page-number:first').addClass('active');
        }
    });
</script>

<?php
	require_once('leftSidebar.php');
	require_once('footer.php');
?>