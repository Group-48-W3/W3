<?php
    session_start();
    require_once('./../../controller/user/userController.php');
    require_once('./../../controller/contract/contractController.php');
    $con = new Contract();
    $result = $con->getAllActiveContracts();
    require_once('header.php');
?>


<!-- Content Starts -->
<div class="container">
    <h1>Activities</h1>
    <div class="row">
        <div class="col-7">
            <h3>Today Activities</h3>
            <!-- Today Activity Table -->
            <table>
                <thead>
                    <tr>
                    <th>Contract</th>
                    <th>Name</th>
                    <th>Weight</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td data-label="Contract">Bentota 360 Hotel</td>
                    <td data-label="Name">Beach Chairs</td>
                    <td data-label="Weight">3 Units</td>
                    <td data-label="Description">High Comfortable Chair Model for Hotels</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h3>Activity Log</h3>
            <div class="form-group field">
                <select class="form-field" name="contract" id="con">
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
                <label for="con" class="form-label">Select a contract to show activity logs of the contract</label>
            </div>
            <table>
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Contract</th>
                    <th>Name</th>
                    <th>Weight</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Date">2020-10-18</td>
                        <td data-label="Contract">Bentota 360 Hotel</td>
                        <td data-label="Name">Beach Chairs</td>
                        <td data-label="Weight">3 Units</td>
                        <td data-label="Description">High Comfortable Chair Model for Hotels</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <div class="alert alert-dismissible alert-info">
                <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
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

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	