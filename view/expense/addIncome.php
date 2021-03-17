<?php
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
  }
  //controller calling
  require_once('./../../controller/expense/incomeController.php');
  //income object
  $income = new Income();
  $result = $income->viewIncome();
  require_once('../../controller/user/userController.php');
?>

<?php include_once('header.php'); ?>

<!-- Content Starts -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Income</h1>
      <h2>Add Income</h2>
      <!-- Form Starts -->
      <form method="post" action="./../../controller/expense/incomeController.php">
      <div class="form-group field">
        <select id="con_name" class="form-field" name="con_name">
            <option value="default">Select contract name</option>
            <?php
              $list = mysqli_query($conn,"SELECT con_name FROM contract");
              while ($row_ah = mysqli_fetch_assoc($list)) {
              ?>
              <option value="<?php echo $row_ah['con_name']; ?>"><?php echo $row_ah['con_name']; ?></option>
              <?php } ?>
        </select>
        <label class="form-label" for="con_name">Contract's Name : </label>
      </div>
      <div class="form-group field">
          <input type="date" class="form-field" name="inc_date" id="inc_date">
          <label class="form-label" for="inc_date">Date : </label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="inc_desc" id="inc_desc">
          <label class="form-label" for="inc_desc">Income description : </label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name ="inc_amount" id="inc_amount">
          <label class="form-label" for="inc_amount">Amount(LKR) : </label>
        </div>
        <div class="right">
		        <input class="btn btn-primary" type="submit" name="incDetails" id="incDetails" value="Add Income">
          </div>
      </form>
      <!-- Form Ends -->
      <h2>Income Details</h2>
      <!-- Show Expense Categories -->
      <table>
          <thead>
                <th>ID</th>
                <th>Contract Name</th>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Action</th>
          </thead>
          <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
          ?>
          <tbody>
              <tr>
                <td data-label="ID"><?php echo $row["inc_id"]; ?></td>
                <td data-label="Name"><?php echo $row["con_name"]; ?></td>
                <td data-label="Date"><?php echo $row["inc_date"]; ?></td> 
                <td data-label="Type"><?php echo $row["inc_desc"]; ?></td>
                <td data-label="Type"><?php echo $row["inc_amount"]; ?></td>
                <td>
                    <a class="btn btn-warning" href="./updateIncome.php?updateid=<?php echo $row["inc_id"]; ?>">Update</a>
                    <a class="btn btn-danger" href="./../../controller/expense/incomeController.php?deleteid=<?php echo $row["inc_id"]; ?>">Delete</a>
                </td>
              </tr>
          </tbody>
          <?php
            $i++;
            }
            if($i==0){
                echo "No results ";
            }
        ?>
      </table>

    </div>
  </div>
</div>
<!-- Content Ends -->

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	