<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/toolController.php');
require_once('../../controller/inventory/maintenanceController.php');
$tool = new Tool();
$maintenance = new Maintenance();

require_once('header.php');
?>

<h2>Search Inventory</h2>
<div class="container">
  <div class="search">
    <div class="search-text">
      <div class="form-group field">
        <input class="form-field" id="searchText" name="searchText" autocomplete="off" required>
        <label for="searchText" class="form-label">Search tool/machine</label>
      </div>
    </div>
    <div id="result" class="search-result"></div>
    <script type="text/javascript">
      $(document).ready(function() {
        document.getElementById("footerBlock").style.display = "none";
        $("#searchText").keyup(function() {
          var anything = $(this).val();
          if (anything != "") {
            $.ajax({
              url: './search.php',
              method: 'POST',
              data: {
                anything: anything
              },
              success: function(data) {
                $('#result').html(data);
                $('#result').css('display', 'block');
                $("#search").focusin(function() {
                  $('#result').css('display', 'block');
                });
              }
            });
          } else {
            $('#result').css('display', 'none');
          }
        });
      });
    </script>
  </div>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>