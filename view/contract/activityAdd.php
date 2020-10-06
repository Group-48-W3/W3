<?php require_once('./contractHeader.php');?>
<!-- Content Starts -->
<div class="container">
<h2>Activities</h2>
  <div class="row">
    <div class="col-8">
    
      <h4>Contract Activity Details</h4>
      <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Contract Name : </label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contract">
          <small id="emailHelp" class="form-text text-muted">Give a suitable name for your project</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">StartDate : </label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="StartDate">
        </div>
        EndDate:<br>
        <input type="text" name="last_name">
        <br>
        Location:<br>
        <input type="text" name="email">
        <br>
        Description:<br>
        <input type="password" name="password">
            <br>
        Status:<br>
        <input type="password" name="cpassword">
            <br>
        Payment Method:<br>
        <input type="password" name="cpassword">
            <br>
            <br>
        <input type="submit" name="userdetails" value="submit">
      </form>
      
    </div>
    <div class="col-4">
    <div class="alert alert-dismissible alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Please Be Noticed!</strong> This is about adding contract
      <h5>Step 01 :- Add Contract Settings</h5>
      <h5>Step 02 :- Add Client Details</h5>
      <h5>Step 03 :- Initial Step Record</h5>
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