<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
	header('location:index.php?lmsg=true');
	exit;
}

require_once('../../controller/user/userController.php');
require_once('header.php');
?>

<h2>Issue Item</h2>

<div class="container">
	<div class="row">

		<!--Issue Raw Material-->
		<div class="col" id="rawMaterial">
			<h3>Raw Material</h3>
			<form method="post" action="./../../controller/user/inventoryController.php">
				<div class="form-group field">
					<!-- inventory type selection -->
					<select class="form-field" id="type" name="materialType">
						<option value="">Nail</option>
						<option value="m_1204">Hammer</option>
						<option value="m_1204">Pancil</option>
						<option value="m_1204">String</option>
						<option value="m_1204">Gum</option>
						<option value="m_1204">Wood</option>
					</select>
					<label for="item" class="form-label">Raw material category</label>
				</div>
				<div class="form-group field">
					<input class="form-field" id="amount" name="issueAmount">
					<label for="amount" class="form-label">Enter amount</label>
				</div>

				<div class="form-group field">
					<select class=form-field id="cemployee" name="issueEmployee">
						<option value="">Select Employee</option>
						<option value="emp1">Employee 1</option>
						<option value="emp1">Employee 2</option>
						<option value="emp1">Employee 3</option>
						<option value="emp1">Employee 4</option>
					</select>
					<label for="emlpoyeeDetails" class="form-label">Select employee</label>
				</div>
				<div class="form-group field">
					<select class=form-field id="contract" name="issueContract">
						<option value="">Select a contract</option>
						<option value="contractA">contractA</option>
						<option value="contractB">contractB</option>
						<option value="contractC">contractC</option>
						<option value="contractC">contractC</option>
					</select>
					<label for="contract" class="form-label">Select contract</label>
				</div>
				<div class="right">
					<button class="btn btn-primary" type="submit" value="Submit" name="issueRawMaterial">Issue Raw Material</button>
					<button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
				</div>
			</form>
		</div>
		<!--Issue Raw Material - End-->

		<!--Issue Tool-->
		<div class="col" id="tool">
			<h3>Tool</h3>
			<form method="post" action="./../../controller/user/inventoryController.php">
				<div class="row" style="padding-top:0;">
					<div class="col">
						<div class="form-group field">
							<!-- inventory type selection -->
							<select class="form-field" id="type" name="toolType">
								<option value="" disabled selected>Select from list...</option>
								<option value="m_1204">Saw</option>
								<option value="m_1204">Chisel</option>
								<option value="m_1204">Hammer</option>
								<option value="m_1204">Plane</option>
								<option value="m_1204">Misc</option>
							</select>
							<label for="item" class="form-label">Select tool category</label>
						</div>
					</div>
					<div class="col">
						<div class="form-group field">
							<select class="form-field" id="item" name="toolId">
								<option value="" disabled selected>Select from list...</option>
								<!--
                      <//?php while($row = mysqli_fetch_array($result)) ?>
                          <option value="<//?php echo $row["toolId"];">
                              <//?php echo $row["toolId"]." - ".$row["toolName"]; ?>
                          </option>
                      <//?php } ?> 
                  -->
								<option value="m_1201">Hand Saw</option>
								<option value="m_1202">Back Saw</option>
								<option value="m_1203">Coping Saw</option>
								<option value="m_1204">Circular Saw (Power)</option>
								<option value="m_1204" disabled><hr></option>
								<option value="m_1201">Normal Chisel</option>
								<option value="m_1202">Mortice Chisel</option>
								<option value="m_1204" disabled><hr></option>
								<option value="m_1203">Block Plane</option>
								<option value="m_1204">Jack Plane</option>
								<option value="m_1203">Hand Plane (Power)</option>
								<option value="m_1204">Surface Plane (Power)</option>
							</select>
							<label for="item" class="form-label">Select tool/machine</label>
						</div>
					</div>
				</div>
				<div class="form-group field">
					<select class=form-field id="contract" name="issueContract">
						<option value="">Select a registered number</option>
						<option value="contractA">contractA</option>
						<option value="contractB">contractB</option>
						<option value="contractC">contractC</option>
						<option value="contractC">contractC</option>
					</select>
					<label for="contract" class="form-label">Select Registration No: (If available)</label>
				</div>
				<div class="form-group field">
					<select class=form-field id="cemployee" name="issueEmployee">
						<option value="">Select Employee</option>
						<option value="emp1">Employee 1</option>
						<option value="emp1">Employee 2</option>
						<option value="emp1">Employee 3</option>
						<option value="emp1">Employee 4</option>
					</select>
					<label for="emlpoyeeDetails" class="form-label">Select employee</label>
				</div>
				<div class="form-group field">
					<input class="form-field" id="amount" name="issueAmount">
					<label for="amount" class="form-label">Enter amount</label>
				</div>
				<div class="right">
					<button class="btn btn-primary" type="submit" value="Submit" name="issueTool">Issue Tool</button>
					<button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
				</div>
			</form>
		</div>
		<!--Issue Tool - End-->

	</div>
</div>
<br>
<h2>Recent Issues</h2>
<div class="container center">
	<div class="tab">
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, 'recentTools')">Tools & Machines</button>
		<button class="tablinks" onclick="openTab(event, 'recentRawMaterials')">Raw Materials</button>
	</div>
	<div id="recentTools" class="tabcontent">
		<h2>Tools & Machines</h2>
		<table class="data-table paginated">
			<thead>
				<tr>
					<th>Item</th>
					<th>Amount</th>
					<th>Employee</th>
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