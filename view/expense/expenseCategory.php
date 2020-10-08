<?php require_once('./expenseHeader.php');?>
<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
    
      <h4>Add expense category</h4>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/expensetController.php">
        <div class="form-group">
          <label for="name">Category name : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="ex:- Food">
        </div>
        <div class="form-group">
          <label for="category description">Category description : </label>
          <input type="text" class="form-control" id="" placeholder="description" >
        </div>
        <div class="form-group">
          <label for="category type">Category Type : </label>
          <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="optional">
          
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <!-- Form Ends -->
      <h3>Expense Categories</h3>
      <!-- Show Expense Categories -->
      <table class="table table-hover">
          <thead>
              <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>

              </tr>
          </thead>
          <tbody>
              <tr class="table-active">
              <th scope="row">1</th>
              <td>Food</td>
              <td>Employees' daily food cost</td>
              <td>additional expenses</td>
              <td>
                    <a class="btn btn-warning" href="#">Update</a>
                    <a class="btn btn-danger" href="#">Delete</a>
              </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>



</div>

<!-- Content Ends -->
</body>
</html>