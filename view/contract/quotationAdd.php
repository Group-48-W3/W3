<?php require_once('./contractHeader.php');?>

<div class="container">
<h1>Quotation</h1>
<h2>Quotation Gallery</h2>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Budget</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-active">
        <th scope="row">Weesa Chair</th>
        <td>22,000</td>
        <td>Not Avaliable</td>
        <td>High Comfortable Chair Model for Hotels</td>
        </tr>
    </tbody>
</table>
<h2>Create Custom Quotation</h2>
<!-- Form Starts -->
<form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Quotation Name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Quotation Name" name="c_id">
          <small id="" class="form-text text-muted">Provide a suitable quotation name </small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Quotation Budget : </label>
          <input type="text" class="form-control" id="" placeholder="Quotation Budget" name="start_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Quotation Description : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Description" name="end_date">  
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Quotation Image :  </label>
          
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          <small id="" class="form-text text-muted">If you have a image of prove of quotation</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
</div>    
</body>
</html>