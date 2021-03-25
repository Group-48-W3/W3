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

<script>
	function loadSubTools(form) {
		var val = form.toolCategory.options[form.toolCategory.options.selectedIndex].value;
		self.location = 'issue.php?tc=' + val + '#issueTool';
	}

	function loadSubMachines(form) {
		var val = form.machineCategory.options[form.machineCategory.options.selectedIndex].value;
		self.location = 'issue.php?mc=' + val + '#issueTool';
	}

	function loadMachineDetails(form) {
		var val1 = form.machineCategory.options[form.machineCategory.options.selectedIndex].value;
		var val2 = form.machineType.options[form.machineType.options.selectedIndex].value;
		self.location = 'issue.php?mc=' + val1 + '&mt=' + val2 + '#issueTool';
	}
</script>

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

<a name="issueTool"></a>
<h2>Issue Tool/Machine</h2>
<div class="container">
	<div class="row">
		<!--Issue Tool-->
		<div class="col" id="tool">
			<h3>Tool</h3>
			<form method="post" action="./../../controller/inventory/toolController.php">
				<div class="form-group field">
					<select class="form-field" id="toolInventoryCode" name="toolCategory" onchange="loadSubTools(this.form)">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $tool->getAllToolCategory();
						while ($row = mysqli_fetch_array($result)) {
							if ($row["inv-code"] == $_GET['tc']) {
						?>
								<option selected value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
							<?php } else { ?>
								<option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
						<?php
							}
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
						<?php
						$i = 0;
						if (isset($_GET['tc'])) {
							$result = $tool->getTools($_GET['tc']);
							while ($row = mysqli_fetch_array($result)) {
						?>
								<option value="<?php echo $row["tool-id"]; ?>"><?php echo $row["description"]; ?></option>
						<?php
								if ($i == 0) {
									$i++;
								}
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
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
			<form method="post" action="./../../controller/inventory/toolController.php">
				<div class="form-group field">
					<select class="form-field" id="toolInventoryCode" name="machineCategory" onchange="loadSubMachines(this.form)">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						$result = $tool->getAllToolCategory();
						while ($row = mysqli_fetch_array($result)) {
							if ($row["inv-code"] == $_GET['mc']) {
						?>
								<option selected value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
							<?php } else { ?>
								<option value="<?php echo $row["inv-code"]; ?>"><?php echo $row["tool-name"]; ?></option>
						<?php
							}
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
					<select class="form-field" id="item" name="machineType" onchange="loadMachineDetails(this.form)">
						<option value="" disabled selected>Select from list...</option>
						<?php
						$i = 0;
						if (isset($_GET['mc'])) {
							$result = $tool->getDistinctMachines($_GET['mc']);
							while ($row = mysqli_fetch_array($result)) {
								if ($row["machine-desc"] == $_GET['mt']) {
						?>
									<option selected value="<?php echo $row["machine-desc"]; ?>"><?php echo $row["machine-desc"]; ?></option>
								<?php } else { ?>
									<option value="<?php echo $row["machine-desc"]; ?>"><?php echo $row["machine-desc"]; ?></option>
						<?php
								}
								if ($i == 0) {
									$i++;
								}
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="item" class="form-label">Machine Type</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="machineRegID" name="machineRegID">
						<option value="" disabled selected>Select from list</option>
						<?php
						$i = 0;
						if (isset($_GET['mc']) && isset($_GET['mt'])) {
							$result = $tool->getMachineIDs($_GET['mt']);
							while ($row = mysqli_fetch_array($result)) {
						?>
								<option value="<?php echo $row["machine-id"]; ?>"><?php echo $row["reg-id"]; ?></option>
						<?php

								if ($i == 0) {
									$i++;
								}
							}
						}
						if ($i == 0) {
							echo "No results ";
						}
						?>
					</select>
					<label for="machineRegID" class="form-label">Registered ID</label>
				</div>
				<div class="form-group field">
					<select class="form-field" id="machineEmployee" name="machineEmployeeID">
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
					<label for="machineEmployee" class="form-label">Select employee</label>
				</div>
				<div class="right">
					<button class="btn btn-primary" type="submit" value="Submit" name="issueMachine">Issue Tool</button>
				</div>
			</form>
		</div>
		<!--Issue Machine - End-->
	</div>
</div>
<br>

<a name="recentIssues"></a>
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
					<th>Date</th>
					<th>Tool</th>
					<th>Quantity</th>
					<th>Issued to</th>
					<th>Received Quantity</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				$result = $tool->getIssueDetails();
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td data-label="Date">
							<?php echo $row["issue-date"]; ?>
						</td>
						<td data-label="Tool">
							<?php echo $row["description"]; ?>
						</td>
						<td data-label="Quantity">
							<?php echo $row["issue-qty"]; ?>
						</td>
						<td data-label="Issued to">
							<?php echo $row["emp_name"]; ?>
						</td>
						<td data-label="Received">
							<?php echo $row["receive-qty"]; ?>
						</td>
						<td data-label="Status">
							<?php if ($row['issue-qty'] - $row['receive-qty'] > 1) { ?>
								<div id="<?php echo $row['issue-id'] ?>" class="confirm-box">
									<div class="right" style="margin-right:25px;">
										<span onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
									</div>
									<form method="post" action="./../../controller/inventory/toolController.php">
										<h1>Confirm hand over</h1>
										<p>You are about to mark this tool as recieved. Please enter the following details</p>
										<div class="container">
											<div class="row">
												<div class="col-10">
													<div class="form-group field">
														<input type="hidden" name="issueID" value="<?php echo $row['issue-id'] ?>">
														<input class="form-field" id="receiveAmount" name="receiveAmount">
														<label for="receiveAmount" class="form-label">Received amount</label>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix right">
											<button type="button" class="btn btn-secondary" onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display='none'">
												Cancel
											</button>
											<button type="submit" name="receiveTool" class="btn btn-warning">Submit</button>
										</div>
									</form>
								</div>
								<button class="btn-warning" onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display = 'block'">
									Mark as received
								</button>
							<?php } else if ($row['issue-qty'] - $row['receive-qty'] == 1) { ?>
								<div id="<?php echo $row['issue-id'] ?>" class="confirm-box">
									<div class="right" style="margin-right:25px;">
										<span onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
									</div>
									<form method="post" action="./../../controller/inventory/toolController.php">
										<h1>Are you sure?</h1>
										<p>You are about to mark this tool as received.</p>
										<input type="hidden" name="issueID" value="<?php echo $row['issue-id'] ?>">
										<input type="hidden" class="form-field" id="receiveAmount" name="receiveAmount" value="1">
										<div class="clearfix right">
											<button type="button" class="btn btn-secondary" onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display='none'">
												Cancel
											</button>
											<button type="submit" name="receiveTool" class="btn btn-warning">Submit</button>
										</div>
									</form>
								</div>
								<button class="btn-warning" onclick="document.getElementById('<?php echo $row['issue-id'] ?>').style.display = 'block'">
									Mark as received
								</button>
							<?php } else {
								echo "Received";
							} ?>
						</td>
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
	<div id="recentMachines" class="tabcontent">
		<h2>Machines</h2>
		<table class="data-table paginated">
			<thead>
				<tr>
					<th>Date</th>
					<th>Machine</th>
					<th>Registered ID</th>
					<th>Issued to</th>
					<th>Received</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					$i = 0;
					$result = $tool->getIssueDetailsOfMachines();
					while ($row = mysqli_fetch_array($result)) {
					?>
				<tr>
					<td data-label="Date">
						<?php echo $row["issue-date"]; ?>
					</td>
					<td data-label="Tool">
						<?php echo $row["machine-desc"]; ?>
					</td>
					<td data-label="Registered ID">
						<?php echo $row["reg-id"]; ?>
					</td>
					<td data-label="Issued to">
						<?php echo $row["emp_name"]; ?>
					</td>
					<td data-label="Received">
						<?php if ($row["received-date"]) {
							echo $row["received-date"];
						} else {
							$boxID = "m" . $row['issue-id'];
						?>
							<div id="<?php echo $boxID ?>" class="confirm-box">
								<div class="right" style="margin-right:25px;">
									<span onclick="document.getElementById('<?php echo $boxID ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
								</div>
								<form method="post" action="./../../controller/inventory/toolController.php">
									<h1>Are you sure?</h1>
									<p>You are about to mark this machine as received.</p>
									<input type="hidden" name="issueID" value="<?php echo $row['issue-id'] ?>">
									<input type="hidden" name="machineID" value="<?php echo $row['machine-id'] ?>">
									<div class="clearfix right">
										<button type="button" class="btn btn-secondary" onclick="document.getElementById('<?php echo $boxID ?>').style.display='none'">
											Cancel
										</button>
										<button type="submit" name="receiveMachine" class="btn btn-warning">Submit</button>
									</div>
								</form>
							</div>
							<button class='btn-warning' onclick="document.getElementById('<?php echo $boxID ?>').style.display='block'">
								Mark as received
							</button>
						<?php } ?>
					</td>
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