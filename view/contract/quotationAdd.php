<?php 
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/quotationController.php');
  require_once('./../../controller/contract/itemController.php');
  require_once('./search.php');
  $quo = new Quotation();
  $item = new Item();
  $result = $quo->getAllQuotation();

  $a = $_SESSION['contract_id'];

  $_SESSION['item_add'] = 'none';
  

  if (isset($_GET['quo_con_id'])) {
    $a = $_GET['quo_con_id'];
    $_SESSION['con_id'] = $a;
    //echo $a;
    //echo $_SESSION['con_id'];

    $item_details = $item->getAllItems();
  }
  
  if(isset($_POST['add_quotation'])){
    $quo_itemno = $_POST['q_itemno'];
    $quo_name = $_POST['quo_name'];
    $quo_description = $_POST['q_desc'];
    $quo_budget = $_POST['quo_budget'];
    $quo_quantity = $_POST['quo_quan'];
    $quo_discount = $_POST['quo_discount'];
    $con_id = $a;
    
    $quo->addQuotation($quo_itemno,$quo_name,$quo_description,$quo_budget,$quo_quantity,$quo_discount,$con_id);
    
  }

  if(isset($_POST['add_item'])){
    $item_name = $_POST['item_name'];
    $item_cat = $_POST['item_category'];
    $unit_price = $_POST['unit_price'];
    $item_con = new Item();

    $item_con->addItem($item_name,$item_cat,$unit_price);
    
  }
?>

<div class="container"> 
  <h1>Add New Quotation</h1>  
  <!-- searching -->
  <?php if(($_SESSION['item_add']) == 'success'): ?>
		<div class="alert alert-success" style="background-color: green;">
			<a href="./user/userProfile.php" style="text-decoration: none; color: white;">Item added successfully</a>
		</div>
	<?php endif; ?>
  <!-- Form Starts -->
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <div class="form-group field">
      <!-- item id -->
      <select class="form-field" name="q_itemno" id="q_itemno">
        <?php
        $i=0;
          while($row2 = mysqli_fetch_array($item_details)) {
        ?>
        <option value="<?php echo $row2["item_id"];?>"><?php echo $row2["item_id"]." ".$row2["item_name"]." LKR: ".$row2['unit_price'];?></option>
        <?php
          $i++;
          }
          if($i==0){
            echo "No results ";
          }
        ?>
      </select>
      <!-- end item selection -->
      <label for="q_itemno" class="form-label">Furniture Item Code</label>
      <small id="" class="form-text text-muted">select the furniture item model</small>
      <br>
      
      <!-- select items -->
      <h6 style="margin: 0x">If you haven't a furniture item code. Add a new item here</h6>
    <!-- Add new Item to Quotation -->
    <a class="btn btn-warning" onclick="document.getElementById('id01').style.display='block'">Add new Item</a>  
    </div>
    
    <div class="form-group field">
      <input type="text" class="form-field" id="q_name" name="quo_name">
      <label class="form-label">Quotation Name</label>
      <small id="" class="form-text text-muted">Provide a suitable quotation name </small>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" name="q_desc" id="quo_desc">  
      <label class="form-label">Quotation Description</label>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" id="q_budget" name="quo_budget">
      <label class="form-label">Budget(LKR Value in Item code)</label>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" id="q_quan" name="quo_quan" value = "1">
      <label class="form-label">Quantity</label>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" id="q_discount" name="quo_discount">
      <label class="form-label">Discount(%)</label>
    </div>
    <div class="right">
      <button type="submit" class="btn btn-primary" name ="add_quotation">Add Quotation</button>
    </div>
  </form>
  <!-- Form Ends -->
</div> 
<script type="text/javascript">
    $(document).ready(function(){
       $("#q_itemno").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: './search.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                $('#output').html(data);
                $('#output').css('display', 'block');
 
                $("#q_itemno").focusout(function(){
                    $('#output').css('display', 'none');
                });
                $("#q_itemno").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'none');
        }
      });
    });
  </script>   
<!-- Prompt Box -->
<div id="id01" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Add new Item</h1>
        <div class="form-group field">
          <input type="text" class="form-field" name="item_name" id="item_name" >
          <label for="item_name" class="form-label" placeholder="I0001">Item Name</label>
          <small id="" class="form-text text-muted">Provide a suitable item name eg:- bed_model#4</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="item_category" id="item_category" >
          <label for="q_budget" class="form-label">Item Category</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="unit_price" id="unit_price">  
          <label for="unit_price" class="form-label">Unit Price</label>
        </div>
        
        <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
          <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
        </div>
      </form>
    </div>
    <!-- End Prompt Box -->
<script type="text/javascript">
     // you need to fill this cities value getting data from city table of your DB
cities = {
    "Lagos": ["LagosCity1", "LagosCity2"],
    "Abuja": ["AbujaCity1", "AbujaCity2", "AbujaCity3"],
    "Rivers": ["RiversCity1", "RiversCity2", "RiversCity3"]
}
$(document).ready(function() {
  $('#state').change(function() {
       var state = $(this).val();
    if(cities[state] && cities[state].length > 0)
    $("#Scity").html('');
     $.each(cities[state], function(i, city) {
            $("<option>").attr("value", city).text(city).appendTo("#Scity");
        });
  });
});
</script>    
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	