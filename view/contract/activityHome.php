<?php 

require_once('./contractHeader.php');
require_once('./../../controller/contract/contractController.php');

$con = new Contract();
$result = $con->getAllActiveContracts();

?>
<!-- Content Starts -->
<div class="container">
<h2>Activities</h2>
  <div class="row">
    <div class="col-7">
      <h3>Today Activities</h3>
      <!-- Today Activity Table -->
      <table class="table table-hover">
          <thead>
              <tr>
              <th scope="col">Contract</th>
              <th scope="col">Name</th>
              <th scope="col">Weight</th>
              <th scope="col">Description</th>
              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <th scope="row">Bentota 360 Hotel</th>
              <td>Beach Chairs</td>
              <td>3 Units</td>
              <td>High Comfortable Chair Model for Hotels</td>
              </tr>
          </tbody>
      </table>
      <hr>
      <h3>Activity Log</h3>
      <p>Select a contract to show activity logs of the contract</p>
      <select name="contract" id="con">
            <?php
            $i=0;
            while($row_quo = mysqli_fetch_array($result)) {

            ?>
            <option value="<?php echo $row_quo["con_id"];?>"><?php echo $row_quo["con_name"];?></option>

        
        <?php
        $i++;
        }
        if($i==0){
            echo "No results ";
        }
        ?>
        </select>
        <table class="table table-hover">
          <thead>
              <tr>
              <th scope="col">Date</th>
              <th scope="col">Contract</th>
              <th scope="col">Name</th>
              <th scope="col">Weight</th>
              <th scope="col">Description</th>
              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <td>2020-10-18</td>
              <td>Bentota 360 Hotel</td>
              <td>Beach Chairs</td>
              <td>3 Units</td>
              <td>High Comfortable Chair Model for Hotels</td>
              </tr>
          </tbody>
      </table>
    </div>
    <div class="col-3">
    <div class="alert alert-dismissible alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>What is a Activity?</strong> Activity improves contract progress
      <h5></h5>
    </div>
    </div>
  </div>



</div>

<!-- Content Ends -->
<script>
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>
</body>
</html>