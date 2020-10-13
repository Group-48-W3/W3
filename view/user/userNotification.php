<?php require_once('./../../controller/user/userController.php');?> 
<?php require_once('./userHeader.php');?> 
<div class="container col-10">
<h1>Admin/Owner Message</h1>
<p>Admin or Owner can push messages into the dashboard which is important to the all users</p>

<h6>Here you can draft your message according to the format provided</h6>
<form action="">
    <label for="exampleInputEmail1">Message Header</label>
    <input type="text" class="form-control" placeholder="Enter Header">
    <small id="emailHelp" class="form-text text-muted">Suitable and short meaningful message</small>
    <label for="exampleTextarea">Message</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    <label for="exampleInputEmail1">Date/Time</label>
    <input type="text" class="form-control" placeholder="<?php echo " ".date("Y/m/d")." ".date("h:i:sa") ?>">

    <input type="submit" value="Push Message" name="#">
</form>
<h1>Admin/Owner Notifications</h1>
<p>Admin or Owner can push notifications into the specifically for a user role to notify some details</p>

<h6>Input your details and select and press Push Notifcation into the User</h6>
<form action="">
    <label for="">Select Role</label>
    <br>
    <select name="member" id="member">
        <option value="USA">Admin</option>
        <option value="Russia">Owner</option>
        <option value="India">Accountant</option>
        <option value="Britain">Stock Keeper</option>
    </select>
    <br>
    <label for="exampleInputEmail1">Message Header</label>
    <input type="text" class="form-control" placeholder="Enter Header">
    <small id="emailHelp" class="form-text text-muted">Suitable and short meaningful message</small>
    <label for="exampleTextarea">Message</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    <label for="exampleInputEmail1">Date/Time</label>
    <input type="text" class="form-control" placeholder="<?php echo " ".date("Y/m/d")." ".date("h:i:sa") ?>">

    <input type="submit" value="Push Notification" name="#">
</form>

</div>
</body>
</html>