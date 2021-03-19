<?php
  require_once('./../../config/config.php');
 
  if (isset($_POST['query'])) {
     
        $query = "SELECT * FROM furniture_item WHERE item_id LIKE '{$_POST['query']}%' LIMIT 5";
        $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<select id='item_name' name='item_code_selected' class='form-field'>";
        while ($user = mysqli_fetch_array($result)){
            echo "<option value='".$user['item_id']."'>".$user['item_name']."</option>";
        }
        echo "</select>";
    } else {
        echo "<p style='color:red'>Item not found...</p>";
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