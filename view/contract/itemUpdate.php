<?php
 session_start();
 if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
{
    header('location:index.php?lmsg=true');
    exit;
}		
 require_once('./../../controller/user/userController.php'); 
 require_once('./header.php');
 require_once('./../../controller/contract/contractController.php'); 
 require_once('./../../controller/contract/itemController.php');

// data importing
$con = new Contract();
$item = new Item();

$a = '';
if(isset($_GET['item_id'])){
    $_SESSION['item_id'] = $_GET['item_id'];
}
$row = mysqli_fetch_array($item->getSingleItem($_SESSION['item_id']));

if(isset($_POST['update_item'])){
    //validation
    $item->updateItem($_SESSION['item_id'],$_POST['item_name'],$_POST['item_cat'],$_POST['unit_price']);
}

if(isset($_GET['view'])){
    $a = 'disabled';
}
    
?>
<div class="container">
<?php if($a != ''){ ?>
    <h2>Item View</h2>
<?php }else{ ?>
    <h2>Item Update</h2>
<?php }   
?> 
<div class="container">
</div>
<div class="container">
    <h5></h5>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id'];?>">
                    <div class="form-group field">
                        <input type="text" class="form-field" name="item_name" id="itemName" value="<?php echo $row['item_name'];?>" <?php echo $a; ?>>
                        <label for="itemName" class="form-label">Item Name</label>
                    </div>
                    
                    <div class="form-group field">
                        <input type="text" class="form-field" name="item_cat" id="itemDesc" value="<?php echo $row['item_category'];?>" <?php echo $a; ?>>
                        <label for="itemDesc" class="form-label">Item Category</label>
                    </div>
                    <div class="form-group field">
                        <input type="text" class="form-field" name="unit_price" id="itemPrice" value="<?php echo $row['unit_price'];?>" <?php echo $a; ?>>
                        <label for="itemPrice" class="form-label">Unit Price</label>
                    </div>
                    
                    <br>
                    <?php if($a != ''){ ?>
                        
                    <?php }else{ ?>
                        <div class="right">
                        <input type="submit" value="Update Item" name="update_item" class="btn btn-warning">
                        </div>
                    <?php }   
                    ?>
                    
                </form>
            </div>
        </div>
    </div>
    
</div>

</div>
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>