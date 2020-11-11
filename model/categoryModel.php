<?php
require_once("./../../config/config.php");

function addCatergoryDB($cat_id, $cat_name, $cat_desc, $cat_type)
{
    global $conn;
    $sql = "insert into category VALUES ('','$cat_name','$cat_name','$cat_desc','$cat_type')";
     if (mysqli_query($conn, $sql)) 
     {
		echo "category added successfully !";
		return 1;
     } 
     else 
     {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}

function getCatId($cat_id)
{
	global $conn;
	$sql = "select * from employee where cat_id = '".$cat_id."'";
				
	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);

	if($numRows == 0){
		return 1;
	}else{
		return 0;
	}
}

function viewCategoryDB()
{
    global $conn;
	$query = "select * from category";
	$result = mysqli_query($conn,$query);

	return $result;
}

function deleterCategoryById($cat_id)
{
	global $conn;
	$sql = "delete from category WHERE cat_id='" . $cat_id . "'";
    if (mysqli_query($conn, $sql)) 
    {
		return 1;
    } 
    else 
    {
		echo "Error deleting category: " . mysqli_error($conn);
	}
}

function updateCategoryDB($cat_id, $cat_name, $cat_desc, $cat_type){
    global $conn;
	$sql = "update category SET cat_name='".$cat_name."',cat_desc='".$cat_desc."',cat_type='".$cat_type."' WHERE cat_id='".$cat_id."'";
}

?>