<?php 

require_once('./../../controller/user/userController.php');
require_once('./../../controller/user/testController.php');// controller
require_once('./header.php');

if(isset($_POST['noticeMsg']))
{
   $test = new TestController();
   $test->index($_POST['msgHeader'],$_POST['msgNotice'],$_POST['msgDate']);// controller calling
} 

?> 

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin/Owner Notices</h1>
            <p>Admin or Owner can push messages into the dashboard which is important to the all users</p>
            <h6>Here you can draft your message according to the format provided</h6>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="form-group field">
                    <input type="text" class="form-field" name="msgHeader">
                    <label for="msgHeader" class="form-label">Message Header</label>
                </div>
                <div class="form-group field">
                    <textarea class="form-field" rows="3" name="msgNotice"></textarea>
                    <label for="exampleTextarea" class="form-label">Message</label>
                    <small id="emailHelp" class="form-text text-muted">Suitable and short meaningful message</small>
                </div>
                <div class="form-group field">
                    <input type="text" class="form-field" name="msgDate" >
                    <label for="msgDate" class="form-label">Date/Time</label>
                    <small class="form-text text-muted">eg:- <?php echo " ".date("Y/m/d")." ".date("h:i:sa") ?></small>
                </div>
                <div class="right">
                    <input class="btn btn-primary" type="submit" value="Push Message" name="noticeMsg">
                </div>
            </form>
        </div>
        <div class="col">
            <h1>Admin/Owner Messages</h1>
            <p>Admin or Owner can push messages into the specifically for a user role to notify some details</p>
            <h6>Input your details and select and press Push Notifcation into the User</h6>
            <form action="">
                <div class="form-group field">
                    <select class="form-field" name="member" id="member">
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                        <option value="accountant">Accountant</option>
                        <option value="stock keeper">Stock Keeper</option>
                    </select>
                    <label for="member" class="form-label">Select Role</label>
                </div>
                <div class="form-group field">
                    <input type="text" id="msgHeader2" class="form-field">
                    <label for="msgHeader2" class="form-label">Message Header</label>
                </div>
                <div class="form-group field">
                    <textarea class="form-field" id="exampleTextarea2" rows="3"></textarea>
                    <label for="exampleTextarea2" class="form-label">Message</label>
                    <small id="emailHelp" class="form-text text-muted">Suitable and short meaningful message</small>
                </div>
                <div class="form-group field">
                    <input type="text" id="msgDate2" class="form-field" placeholder="">
                    <label for="msgDate2" class="form-label">Date/Time</label>
                    <small class="form-text text-muted">eg:- <?php echo " ".date("Y/m/d")." ".date("h:i:sa") ?></small>
                </div>
                <div class="right">
                    <input class="btn btn-primary" type="submit" value="Push Notification" name="#">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	