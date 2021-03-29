<?php
require_once('./../../config/config.php');
global $conn;
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
                                        <input type="hidden" name="machineID" value="<?php echo $row['machine-id'] ?>">
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
<?php } ?>

<?php
if (isset($_POST['anything'])) {
    $query = "select * from `raw-material-category` WHERE `mat-name` LIKE '%{$_POST['anything']}%'";
    $result = mysqli_query($conn, $query);
?>
    <h3>Raw Materials</h3>
    <table class="data-table paginated">
        <thead>
            <tr>
                <th width="15%">Name</th>
                <th width="40%">Description</th>
                <th>Available Batches</th>
                <th>Total Quantity</th>
                <th>Reorder Value</th>
                <th width="11%">Average Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $date = date("Y-m-d");
                $inventoryCode = $row['inv-code'];
                $sql1 = "SELECT COUNT(`batch-id`) AS `batch-count`, SUM(`batch-quantity`) AS `total-amount`, CAST(AVG(`unit-price`) AS DECIMAL(10,2)) AS `avg-price` FROM `raw-material-batch` WHERE `inv-code`= '$inventoryCode' AND `end-date` >= '$date'";
                $batch = mysqli_query($conn, $sql1);
                $batchRow = mysqli_fetch_array($batch);

            ?>
                <tr onclick="window.location='rawMaterialBatch.php?material=<?php echo $row['inv-code']; ?>';" class="row-link">
                    <td data-label="Name">
                        <?php echo $row["mat-name"]; ?>
                    </td>
                    <td data-label="Description">
                        <?php echo $row["inv-desc"]; ?>
                    </td>
                    <td data-label="Available Batches">
                        <?php echo $batchRow["batch-count"] ?>
                    </td>
                    <td data-label="Total Quantity">
                        <?php if ($batchRow["total-amount"]) {
                            echo $batchRow["total-amount"];
                        } else {
                            echo "No Data";
                        } ?>
                    </td>
                    <td data-label="Reorder Value">
                        <?php echo $row["min-qty"]; ?></td>
                    <td data-label="Average Price">
                        <?php if ($batchRow["avg-price"]) {
                            echo "Rs." . $batchRow["avg-price"];
                        } else {
                            echo "No Data";
                        } ?>
                    </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
    <?php
    $sql2 = "SELECT * FROM `tool-detailed` WHERE `description` LIKE '%{$_POST['anything']}%'";
    $toolDetails = mysqli_query($conn, $sql2);
    ?>
    <hr><br>
    <h3>Tools</h3>
    <table class="data-table paginated">
        <thead>
            <tr>
                <th>Description</th>
                <th>Store Location</th>
                <th>Total Amount</th>
                <th>Available Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($toolDetails) > 0) {
                while ($row = mysqli_fetch_array($toolDetails)) { ?>
                    <tr>
                        <td data-label="Description"><?php echo $row["description"]; ?></td>
                        <td data-label="Store Location"><?php echo $row["tool-location"]; ?></td>
                        <td data-label="Total Amount"><?php echo $row["tool-qty"]; ?></td>
                        <td data-label="Available Amount"><?php echo $row["tool-qty"]; ?></td>
                    </tr>
                <?php }
            } else { ?>
                <td colspan='5'>Tool not found...</td>
            <?php } ?>
        </tbody>
    </table>

    <?php
    $sql3 = "SELECT * FROM `machine-detailed` WHERE (`machine-desc` LIKE '%{$_POST['anything']}%' OR `reg-id` LIKE '%{$_POST['anything']}%')";
    $machineDetails = mysqli_query($conn, $sql3); ?>
    <hr><br>
    <h3>Machines</h3>
    <table class="data-table paginated">
        <thead>
            <tr>
                <th>Registered ID</th>
                <th>Description</th>
                <th>Store Location</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($machineDetails) > 0) {
                while ($row = mysqli_fetch_array($machineDetails)) { ?>
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
                    </tr>
                <?php }
            } else { ?>
                <td colspan='5'>Machine not found...</td>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

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