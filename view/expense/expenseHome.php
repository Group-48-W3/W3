<?php require_once('./expenseHeader.php');?>
<div class="container">
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
    </div>
    <h3>Summary</h3>
  <!-- Start the card View  -->
<div class="row">
    <!-- 1st card -->
    <div class="col-sm">
    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">5</h1>
        <p class="card-text">Contracts</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
    <!-- 2nd card -->
    <div class="col-sm">
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">45</h1>
        <p class="card-text">Activities</p>
      </div>
    </div>
    </div>
    <!-- end card 2 -->
    <!--3rd card  -->
    <div class="col-sm">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">29</h1>
        <p class="card-text">Quotations</p>
      </div>
    </div>
    </div>
    <!-- end card 3 -->
    <!-- 4th card  -->
    <div class="col-sm">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 id="value" class="card-title">0</h1>
        <p class="card-text">Invoices</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->

   <!--Contrat Summary Details  -->
   <h3>Ongoing Contracts</h3>
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

<script>
function animateValue(id, start, end, duration) {
    var range = end - start;
    var current = start;
    var increment = end > start? 1 : -1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var obj = document.getElementById(id);
    var timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

animateValue("value", 0, 4, 3000);
</script>   
</body>
</html>