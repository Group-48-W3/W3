<?php
require_once('./../../config/config.php');

if (isset($_POST['machine'])) {
    $sql = "SELECT * FROM `machine-detailed` WHERE `status` != '2' AND (`machine-desc` LIKE '%{$_POST['machine']}%' OR `reg-id` LIKE '%{$_POST['machine']}%')";
    $result = mysqli_query($conn, $sql); ?>
    <table class="data-table paginated">
        <thead>
            <tr>
                <th>Registered ID</th>
                <th>Description</th>
                <th>Store Location</th>
                <th>Status</th>
                <th width='15%'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td data-label="Name"><?php echo $row["reg-id"]; ?></td>
                        <td data-label="Description"><?php echo $row["machine-desc"]; ?></td>
                        <td data-label="Store Location"><?php echo $row["machine-location"]; ?></td>
                        <td data-label="Status">
                            <?php if ($row["status"] == 1) {
                                echo "Available";
                            } else if ($row["status"] == 0) {
                                echo "In Use";
                            } else if ($row["status"] == 2) {
                                echo "In Maintenance";
                            } ?>
                        </td>
                        <td data-label="Action">
                            <div id="<?php echo $row['machine-id']; ?>" class="confirm-box">
                                <div class="right" style="margin-right:25px;">
                                    <span onclick="document.getElementById('<?php echo $row['machine-id']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>
                                <form method="post" action="./../../controller/inventory/maintenanceController.php">
                                    <h1>Add to maintenance</h1>
                                    <p>You are about to add this tool to maintenance. Please enter the following deatils</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group field">
                                                    <input class="form-field" id="reason" name="reason" required>
                                                    <label for="reason" class="form-label">Reason for maintenance</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group field">
                                                    <input class="form-field" id="maintainer" name="maintainer" required>
                                                    <label for="maintainer" class="form-label">Details of maintainer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group field">
                                                    <input type="date" class="form-field" id="pickup" name="pickup" required>
                                                    <label for="pickup" class="form-label">Expected pickup date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix right">
                                        <input type="hidden" name="machineID" value="<?php echo $row['machine-id']?>">
                                        <button type="button" class="btn btn-secondary" onclick="document.getElementById('<?php echo $row['machine-id']; ?>').style.display='none'">Cancel</button>
                                        <button type="submit" name="addMaintenance" class="btn btn-warning">Add to mainteance</button>
                                    </div>
                                </form>
                            </div>
                            <button class="btn btn-secondary" onclick="document.getElementById('<?php echo $row['machine-id']; ?>').style.display='block'">
                                + Add to maintenance
                            </button>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <td colspan='5'>Machine not found...</td>
            <?php } ?>
        </tbody>
    </table>
    
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
<?php } ?>