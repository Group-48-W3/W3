<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
	header('location:index.php?lmsg=true');
	exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
require_once('../../controller/inventory/toolController.php');
require_once('../../controller/contract/contractController.php');
require_once('../../controller/user/employeeController.php');
$rawMaterial = new RawMaterial();
$tool = new Tool();
$contract = new Contract();
$employee = new Employee();
require_once('header.php');
?>

<h2>Issue Raw Material</h2>
<div class="container">
	<div class="col" id="rawMaterial">
		<h3>Raw Material</h3>
		<form method="post" action="./../../controller/inventory/rawMaterialController.php">
			<div class="form-group field">
				<select class="form-field" id="matInventoryCode" name="matCategory" required>
					<option value="" disabled selected>Select from list</option>
					<?php
					$i = 0;
					$result = $rawMaterial->getAllRawMaterialCategory();
					while ($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["mat-name"]; ?></option>
					<?php
						if ($i == 0) {
							$i++;
						}
					}
					if ($i == 0) {
						echo "No results ";
					}
					?>
				</select>
				<label for="matInventoryCode" class="form-label">Raw Material</label>
			</div>
			<div class="form-group field">
				<select class="form-field" id="contract" name="contractID" required>
					<option value="" disabled selected>Select from list</option>
					<?php
					$i = 0;
					$result = $contract->getAllActiveContracts();
					while ($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row["con_id"]; ?>"><?php echo $row["con_name"]; ?></option>
					<?php
						if ($i == 0) {
							$i++;
						}
					}
					if ($i == 0) {
						echo "No results ";
					}
					?>
				</select>
				<label for="contract" class="form-label">Select contract</label>
			</div>
			<div class="form-group field">
				<select class="form-field" id="matEmployee" name="matEmployeeID" required>
					<option value="" disabled selected>Select from list</option>
					<?php
					$i = 0;
					$result = $employee->getAllEmployee();
					while ($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row["emp_id"]; ?>"><?php echo $row["emp_name"]; ?></option>
					<?php
						if ($i == 0) {
							$i++;
						}
					}
					if ($i == 0) {
						echo "No results ";
					}
					?>
				</select>
				<label for="matEmployee" class="form-label">Select employee</label>
			</div>
			<div class="form-group field">
				<input type="number" class="form-field" id="amount" name="issueAmount" min="1" required>
				<label for="amount" class="form-label">Enter amount</label>
			</div>
			<div class="right">
				<button class="btn btn-primary" type="submit" value="Submit" name="issueRawMaterial">Issue Raw Material</button>
			</div>
		</form>
	</div>
	<!--Issue Raw Material - End-->
</div>

<h2>Issue Tool/Machine</h2>
<div class="container">
	<div class="row">
		<!--Issue Tool-->
		<div class="col" id="tool">
			<h3>Tool</h3>
			<form method="post" action="./../../controller/user/inventoryController.php">
				<div class="form-group field">
					<select class="form-field" id="toolInventoryCode" name="toolCategory">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $tool->getAllToolCategory();
						while ($row = mysqli_fetch_array($result)) {
						?>
							<option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
						<?php
							if ($i == 0) {
								$i++;
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="toolInventoryCode" class="form-label">Category</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="item" name="toolId">
						<option value="" disabled selected>Select from list...</option>
						<option value="m_1201">Hand Saw</option>
						<option value="m_1202">Back Saw</option>
						<option value="m_1203">Coping Saw</option>
						<option value="m_1204">Circular Saw (Power)</option>
						<option value="m_1204" disabled>
							<hr>
						</option>
						<option value="m_1201">Normal Chisel</option>
						<option value="m_1202">Mortice Chisel</option>
						<option value="m_1204" disabled>
							<hr>
						</option>
						<option value="m_1203">Block Plane</option>
						<option value="m_1204">Jack Plane</option>
						<option value="m_1203">Hand Plane (Power)</option>
						<option value="m_1204">Surface Plane (Power)</option>
					</select>
					<label for="item" class="form-label">Tool</label>
				</div>
				<div class="form-group field">
					<input class="form-field" id="amount" name="issueAmount">
					<label for="amount" class="form-label">Enter amount</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="toolEmployee" name="toolEmployeeID">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $employee->getAllEmployee();
						while ($row = mysqli_fetch_array($result)) {
						?>
							<option value="<?php echo $row["emp_id"]; ?>"><?php echo $row["emp_name"]; ?></option>
						<?php
							if ($i == 0) {
								$i++;
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="toolEmployee" class="form-label">Select employee</label>
				</div>
				<div class="right">
					<button class="btn btn-primary" type="submit" value="Submit" name="issueTool">Issue Tool</button>
				</div>
			</form>
		</div>
		<!--Issue Tool - End-->

		<!--Issue Machine-->
		<div class="col" id="machine">
			<h3>Machine</h3>
			<form method="post" action="./../../controller/user/inventoryController.php">
				<div class="form-group field">
					<select class="form-field" id="toolInventoryCode" name="toolCategory">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $tool->getAllToolCategory();
						while ($row = mysqli_fetch_array($result)) {
						?>
							<option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
						<?php
							if ($i == 0) {
								$i++;
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="toolInventoryCode" class="form-label">Category</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="item" name="toolId">
						<option value="" disabled selected>Select from list...</option>
						<option value="m_1201">Hand Saw</option>
						<option value="m_1202">Back Saw</option>
						<option value="m_1203">Coping Saw</option>
						<option value="m_1204">Circular Saw (Power)</option>
						<option value="m_1204" disabled>
							<hr>
						</option>
						<option value="m_1201">Normal Chisel</option>
						<option value="m_1202">Mortice Chisel</option>
						<option value="m_1204" disabled>
							<hr>
						</option>
						<option value="m_1203">Block Plane</option>
						<option value="m_1204">Jack Plane</option>
						<option value="m_1203">Hand Plane (Power)</option>
						<option value="m_1204">Surface Plane (Power)</option>
					</select>
					<label for="item" class="form-label">Machine Type</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="toolEmployee" name="toolEmployeeID">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $employee->getAllEmployee();
						while ($row = mysqli_fetch_array($result)) {
						?>
							<option value="<?php echo $row["emp_id"]; ?>"><?php echo $row["emp_name"]; ?></option>
						<?php
							if ($i == 0) {
								$i++;
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="toolEmployee" class="form-label">Registered ID</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="toolEmployee" name="toolEmployeeID">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $employee->getAllEmployee();
						while ($row = mysqli_fetch_array($result)) {
						?>
							<option value="<?php echo $row["emp_id"]; ?>"><?php echo $row["emp_name"]; ?></option>
						<?php
							if ($i == 0) {
								$i++;
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="toolEmployee" class="form-label">Select employee</label>
				</div>
				<div class="right">
					<button class="btn btn-primary" type="submit" value="Submit" name="issueTool">Issue Tool</button>
				</div>
			</form>
		</div>
		<!--Issue Machine - End-->
	</div>
</div>
<br>

<h2>Recent Issues</h2>
<div class="container center">
	<div class="tab">
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, 'recentTools')">Tools</button>
		<button class="tablinks" onclick="openTab(event, 'recentMachines')">Machines</button>
		<button class="tablinks" onclick="openTab(event, 'recentRawMaterials')">Raw Materials</button>
	</div>
	<div id="recentTools" class="tabcontent">
		<h2>Tools</h2>
		<table class="data-table paginated">
			<thead>
				<tr>
					<th>Tool</th>
					<th>Quantity</th>
					<th>Issued to</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="Item">Hand Saw</td>
					<td data-label="Amount">1</td>
					<td data-label="Quantity">Sarath</td>
					<td data-label="Date">2021.01.07</td>
					<td data-label="Status"><button class="btn-warning">Mark as received</button></td>
				</tr>
				<tr>
					<td data-label="Item">Power Saw</td>
					<td data-label="Amount">1</td>
					<td data-label="Quantity">Kamal</td>
					<td data-label="Date">2020.12.10</td>
					<td data-label="Status"><button class="btn-warning">Mark as received</button></td>
				</tr>
				<tr>
					<td data-label="Item">Normal Chisel</td>
					<td data-label="Amount">4</td>
					<td data-label="Quantity">Nuwan</td>
					<td data-label="Date">2020.12.07</td>
					<td data-label="Status">&#10004 Received</td>
				</tr>
				<tr>
					<td data-label="Item">Block Plane</td>
					<td data-label="Amount">1</td>
					<td data-label="Quantity">Wellappili</td>
					<td data-label="Date">2020.12.05</td>
					<td data-label="Status">&#10004 Received</td>
				</tr>
				<tr>
					<td data-label="Item">Hand Plane</td>
					<td data-label="Amount">2</td>
					<td data-label="Quantity">Nihal</td>
					<td data-label="Date">2020.11.30</td>
					<td data-label="Status">&#10004 Received</td>
				</tr>
				<tr>
					<td data-label="Item">Mortice Chisel</td>
					<td data-label="Amount">1</td>
					<td data-label="Quantity">Sunil</td>
					<td data-label="Date">2020.11.28</td>
					<td data-label="Status">&#10004 Received</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="recentMachines" class="tabcontent">
		<h2>Machines</h2>
		<table class="data-table paginated">
			<thead>
				<tr>
					<th>Machine ID</th>
					<th>Type</th>
					<th>Issued to</th>
					<th>Date of issue</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="Machine ID">RX3641</td>
					<td data-label="Type">Power Saw</td>
					<td data-label="Issued to">Sarath Kumara</td>
					<td data-label="Date of issue">2021.01.07</td>
					<td data-label="Status"><button class="btn-warning">Mark as received</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="recentRawMaterials" class="tabcontent">
		<h2>Raw Materials</h2>
		<table class="data-table paginated">
			<thead>
				<tr>
					<th>Date</th>
					<th>Raw Material</th>
					<th>Quantity</th>
					<th>Issued to</th>
					<th>Contract</th>
				</tr>
			</thead>
			<tbody>
			<?php
					$i = 0;
					$result = $rawMaterial->getIssueDetails();
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td data-label="Date"><?php echo $row["date"]; ?></td>
							<td data-label="Raw Material"><?php echo $row["mat-name"]; ?></td>
							<td data-label="Quantity"><?php echo $row["quantity"]; ?></td>
							<td data-label="Issued to"><?php echo $row["emp_name"]; ?></td>
							<td data-label="Contract"><?php echo $row["con_name"]; ?></td>
						</tr>
					<?php
						$i++;
					}
					if ($i == 0) {
					?>
						<tr>
							<td colspan="8">
								<center>Sorry, No Results to Show!</center>
							</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$('table.paginated').each(function() {
		var currentPage = 0;
		var numPerPage = 5; // number of items 
		var $table = $(this);
		//var $tableBd = $(this).find("tbody");

		$table.bind('repaginate', function() {
			$table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
		});
		$table.trigger('repaginate');
		var numRows = $table.find('tbody tr').length;
		var numPages = Math.ceil(numRows / numPerPage);
		var $pager = $('<div class="pager"></div>');
		for (var page = 0; page < numPages; page++) {
			$('<span class="page-number"></span>').text(page + 1).bind('click', {
				newPage: page
			}, function(event) {
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