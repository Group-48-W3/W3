<?php
require_once("./../../config/config.php");

function addCategoryDB($cat_name, $cat_desc, $cat_type)
{
    global $conn;
    $sql = "insert into category (cat_name, cat_desc, cat_type, cat_flag) Values ('$cat_name','$cat_desc','$cat_type',1)";
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

function getCatIdDB($cat_id)
{
	global $conn;
    $query = "select * from category WHERE cat_id = '".$cat_id."'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function viewCategoryDB()
{
    global $conn;
	$query = "select * from category WHERE cat_flag = 1";
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

function updateCategoryDB($cat_id, $cat_name, $cat_desc, $cat_type)
{
    global $conn;
    $sql = "update category SET cat_name='".$cat_name."',cat_desc='".$cat_desc."',cat_type='".$cat_type."' WHERE cat_id='".$cat_id."'";
    if (mysqli_query($conn, $sql))
    {
    } 
    else 
    {
		echo "Error updating category: " . mysqli_error($conn);
	}
}

?>