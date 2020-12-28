<?php
  require_once('./../../config/config.php');
 
  if (isset($_POST['query'])) {
     
        $query = "SELECT * FROM furniture_item WHERE item_name LIKE '{$_POST['query']}%' LIMIT 5";
        $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
        echo $user["item_id"]." ".$user['item_name']."<br/>";
        }
    } else {
        echo "<p style='color:red'>User not found...</p>";
    }
    
    }
    if (isset($_POST['contract'])) {
        
        $query = "SELECT * FROM contract WHERE con_name LIKE '{$_POST['contract']}%' LIMIT 5";
        $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
        echo $user["con_id"]." ".$user['con_name']."<br/>";
        }
    } else {
        echo "<p style='color:red'>Contract not found...</p>";
    }
    
    }
?>