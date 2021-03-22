<?php 
    session_start();
    require_once('./../../controller/user/userController.php'); 
    require_once('./header.php');
    require_once('./../../controller/contract/quotationController.php');
    
    if (isset($_GET['q_id'])) {
        $_SESSION['quotation_id'] = $_GET['q_id'];
        $quo = new Quotation();
        $quo_details = $quo->getSingleQuotation($_SESSION['quotation_id']);
        $row = mysqli_fetch_array($quo_details);
    }
    
    if(isset($_POST['update_quotation'])){
        $quo = new Quotation();
        $quo->updateQuotation($_SESSION['quotation_id'],$_POST['q_item'],$_POST['q_name'],$_POST['q_desc'],
        $_POST['q_budget'],$_POST['q_discount']);
    }
    if(isset($_GET['del_id'])){
        //echo "success";
        //echo $_GET['con_id'];
        $quo = new Quotation();
        $quo->deleteQuotation($_GET['del_id'],$_GET['con_id']);
    }
?>

<div class="container">
    <h2>Update Quotation Details</h2>
    <h6>apply necessay changes applied to the quotation</h6>
</div>
<div class="container">
    <h5></h5>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="q_item" value="<?php echo $row['q_item'];?>">
                    <div class="form-group field">
                        <input type="text" class="form-field" name="q_name" id="itemName" value="<?php echo $row['q_name'];?>">
                        <label for="itemName" class="form-label">Quotation Name</label>
                    </div>
                    
                    <div class="form-group field">
                        <input type="text" class="form-field" name="q_desc" id="itemDesc" value="<?php echo $row['q_desc'];?>">
                        <label for="itemDesc" class="form-label">Quoatation Description</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="q_budget" id="itemPrice" value="<?php echo $row['q_budget'];?>">
                        <label for="itemPrice" class="form-label">Budget</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="q_budget" id="itemPrice" value="<?php echo $row['q_quantity'];?>">
                        <label for="itemPrice" class="form-label">Quantity</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="q_discount" id="itemPrice" value="<?php echo $row['q_discount'];?>">
                        <label for="itemPrice" class="form-label">Discount</label>
                    </div>
                    <br>
                    <div class="right">
                        <input type="submit" value="Update Quotation" name="update_quotation" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	