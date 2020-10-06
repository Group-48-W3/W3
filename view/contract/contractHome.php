<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract</title>
    <link href="./../../assets/css/style_darkly.css" rel="stylesheet" type="text/css">
</head>
<body>
 <!--Navbar starts -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../dashboard.php">W3 DASHBOARD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./contractHome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./contractAdd.php">Add Contract</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Add Activity</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Add Quotation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Invoice</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!--Navbar ends  -->
<div class="container">
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
    </div>
    <h3>Summary</h3>
  <div class="row">
    
    <div class="col-sm">
    <!-- 1st card -->
    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">5</h1>
        <p class="card-text">Contracts</p>
      </div>
    </div>
    <!-- end card 1 -->
    </div>
    <div class="col-sm">
     <!-- 1st card -->
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">45</h1>
        <p class="card-text">Activities</p>
      </div>
    </div>
    <!-- end card 2 -->
    </div>
    <div class="col-sm">
     <!--2nd card  -->
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">29</h1>
        <p class="card-text">Quotations</p>
      </div>
    </div>
    <!-- end card 3 -->
    </div>
    <div class="col-sm">
    <!--2nd card  -->
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">3</h1>
        <p class="card-text">OnGoing</p>
      </div>
    </div>
    <!-- end 4 -->
    </div>
  </div>
   <!--Contrat Summary Details  -->
   <h3>Ongoing Contracts</h3>
</div>

   
</body>
</html>