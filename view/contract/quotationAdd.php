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

    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <!-- Quotation Item Starts-->
    <div class="container card text-white bg-primary" onclick="location.href='./quotationSinglePage.php?q_id=<?php echo $row["q_id"]; ?>';" style="cursor: pointer;">
        <br>
        <h4><?php echo $row["q_name"]; ?></h4>
        <h6>Description :<?php echo $row["q_desc"]; ?></h6>
        <h6>Budget : <?php echo $row["q_budget"]; ?></h6>
        <h6>Item Count : </h6>
        <br>
      </div>
      <!-- Quotation Item Ends -->
    <?php
    $i++;
    }
    if($i==0){
        echo "No results ";
    }
    ?>
    
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