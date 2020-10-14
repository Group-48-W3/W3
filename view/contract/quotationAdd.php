<?php 
require_once('./contractHeader.php');
require_once('./../../controller/contract/quotationController.php');

$quo = new Quotation();
$result = $quo->getAllQuotation();
?>

<div class="container">
<h1>Quotation</h1>
<h2>Quotation Gallery</h2>
<h6>Quotation gallery includes the main product quotation samples inside the business environment which may important for the future reference</h6>
<table class="table table-hover">
    <thead>
        <tr>
        <th>ID</th>
        <th >Name</th>
        <th >Description</th>
        <th >Budget</th>
        <th >Image</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row["q_id"]; ?></td>
        <td><?php echo $row["q_name"]; ?></td>
        <td><?php echo $row["q_desc"]; ?></td>
        <td><?php echo $row["q_budget"]; ?></td>
        <td><?php echo $row["q_img"]; ?></td>
        <td>
        <a class="btn btn-warning" href="./employeeUpdate.php?updateid=<?php echo $row["emp_id"]; ?>">Update</a>
        <a class="btn btn-danger" href="./../../controller/user/employeeController.php?deleteid=<?php echo $row["nic"]; ?>">Delete</a>
        </td>
    </tr>
    <?php
    $i++;
    }
    if($i==0){
        echo "No results ";
    }
    ?>
    </tbody>
</table>
<h2>Create Custom Quotation</h2>
<!-- Form Starts -->
<form method="post" action="./../../controller/contract/quotationController.php">
        <div class="form-group">
          <label>Quotation Name : </label>
          <input type="text" class="form-control" placeholder="Quotation Name" name="q_name">
          <small id="" class="form-text text-muted">Provide a suitable quotation name </small>
        </div>
        <div class="form-group">
          <label>Quotation Budget : </label>
          <input type="text" class="form-control" id="" placeholder="Quotation Budget" name="q_desc">
        </div>
        <div class="form-group">
          <label>Quotation Description : </label>
          <input type="text" class="form-control" placeholder="Description" name="q_budget">  
        </div>
        <div class="form-group">
          <label>Quotation Image :  </label>
          <input type="file" class="form-control-file" id="" name="q_img">
          <small id="">If you have a image of prove of quotation</small>
        </div>
        <button type="submit" class="btn btn-primary" name ="quotationAdd">Add Quotation</button>
      </form>
<!-- Form Ends -->
</div>    
</body>
</html>