<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
require_once('../../controller/inventory/maintenanceController.php');
$tool = new Tool();
$maintenance = new Maintenance();

require_once('header.php');
?>

<h2>Maintenance</h2>
<div class="container">
  <h3>Add tool/machine to maintenance</h3>
  <div class="search">
    <div class="search-text">
      <div class="form-group field">
        <input class="form-field" id="searchMachineText" name="searchMachineText" autocomplete="off" required>
        <label for="searchMachineText" class="form-label">Search tool/machine</label>
      </div>
    </div>
    <div id="searchResult" class="search-result"></div>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#searchMachineText").keyup(function() {
          var machine = $(this).val();
          if (machine != "") {
            $.ajax({
              url: './search.php',
              method: 'POST',
              data: {
                machine: machine
              },
              success: function(data) {
                $('#searchResult').html(data);
                $('#searchResult').css('display', 'block');
                $("#search").focusin(function() {
                  $('#searchResult').css('display', 'block');
                });
              }
            });
          } else {
            $('#searchResult').css('display', 'none');
          }
        });
      });
    </script>
  </div>
</div>
<br>
<div class="container">
  <h3>Machines in maintenance</h3>
  <table>
    <thead>
      <tr>
        <th width="10%">Machine ID</th>
        <th width="10%">Description</th>
        <th width="15%">Maintaner</th>
        <th width="20%">Reason</th>
        <th width="15%">Added date</th>
        <th width="15%">Date of pickup</th>
        <th width="15%">Option</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $result = $maintenance->getMaintenanceDetails();
      while ($row = mysqli_fetch_array($result)) {
        $boxID = "rm" . $row['reg-id'];
      ?>
        <tr>
          <td data-label="Registered ID"><?php echo $row['reg-id'] ?></td>
          <td data-label="Description"><?php echo $row['machine-desc'] ?></td>
          <td data-label="Maintaner"><?php echo $row['maintenance-by'] ?></td>
          <td data-label="Reason"><?php echo $row['reason'] ?></td>
          <td data-label="Added date"><?php echo $row['added-date'] ?></td>
          <td data-label="Date of Pickup"><?php echo $row['pickup-date'] ?></td>
          <td data-label="Option">
            <div id="<?php echo $boxID ?>" class="confirm-box">
              <div class="right" style="margin-right:25px;">
                <span onclick="document.getElementById('<?php echo $boxID ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
              </div>
              <form method="post" action="../../controller/inventory/maintenanceController.php">
                <h1>Are you sure?</h1>
                <p>You are about to remove this tool from maintenance. Please enter the following deatails</p>
                <div class="container">
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group field">
                        <input class="form-field" id="cost" name="cost">
                        <label for="cost" class="form-label">Cost for maintenance</label>
                      </div>
                      <div class="form-group field">
                        <input class="form-field" id="receivedDate" name="receivedDate" type="date">
                        <script>
                          document.getElementById('receivedDate').value = new Date().toDateInputValue();
                        </script>
                        <label for="receivedDate" class="form-label">Received Date</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix right">
                  <input type="hidden" name="machineID" value="<?php echo $row['machine-id'] ?>">
                  <input type="hidden" name="maintenanceID" value="<?php echo $row['maintenance-id'] ?>">
                  <button type="button" class="btn btn-secondary" onclick="document.getElementById('<?php echo $boxID ?>').style.display='none'">
                    Cancel
                  </button>
                  <button type="submit" name="removeMaintenance" class="btn btn-warning">Remove from maintenance</button>
                </div>
              </form>
            </div>
            <button class="btn btn-secondary" onclick="document.getElementById('<?php echo $boxID ?>').style.display='block'">
              Remove from maintenance
            </button>
          </td>
        </tr>
      <?php
        $i++;
      }
      if ($i == 0) {
      ?>
        <tr>
          <td colspan="7">
            <center>No machine is currently in maintanence</center>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h3>Previous maintenance details</h3>
  <table>
    <thead>
      <tr>
        <th>Tool ID</th>
        <th>Category</th>
        <th>Maintaner</th>
        <th>Reason</th>
        <th>Cost</th>
        <th>Added Date</th>
        <th>Expected Date</th>
        <th>Received Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $result = $maintenance->getPreviousMaintenance();
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td data-label="Registered ID"><?php echo $row['reg-id'] ?></td>
          <td data-label="Description"><?php echo $row['machine-desc'] ?></td>
          <td data-label="Maintaner"><?php echo $row['maintenance-by'] ?></td>
          <td data-label="Reason"><?php echo $row['reason'] ?></td>
          <td data-label="Cost"><?php echo $row['cost'] ?></td>
          <td data-label="Added date"><?php echo $row['added-date'] ?></td>
          <td data-label="Expected Date"><?php echo $row['pickup-date'] ?></td>
          <td data-label="Received Date">
            <?php echo $row['received-date'] ?>
          </td>
        </tr>
      <?php
        $i++;
      }
      if ($i == 0) {
      ?>
        <tr>
          <td colspan="8">
            <center>Sorry, No results to show!</center>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>