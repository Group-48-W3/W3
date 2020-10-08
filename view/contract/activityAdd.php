<?php require_once('./contractHeader.php');?>
<!-- Content Starts -->
<div class="container">
<h2>Activities</h2>
  <div class="row">
    <div class="col-8">
    
      <h4>Contract Activity Details</h4>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Contract Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Select Contract" name="c_id">
          <small id="" class="form-text text-muted">Select Contract: </small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Activity Name : </label>
          <input type="text" class="form-control" id="" placeholder="Activity Name" name="start_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Activity Description : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Description" name="end_date">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Activity Weight : </label>
          <input type="text" class="form-control" id="" placeholder="Weight eg:- 2 Units put as 2" name="location">
          <small id="" class="form-text text-muted">Weight describes the work load of the work done</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date: </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Date" name="description">  
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
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
    </div>
    <div class="col-4">
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