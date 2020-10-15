<?php require_once('./contractHeader.php');?>
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
      <p>Input a contract to show activity logs of the contract</p>
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