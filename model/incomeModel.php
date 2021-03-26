<?php
require_once("./../../config/config.php");

function addIncomeDB($con_name, $inc_date, $inc_desc, $inc_amount)
{
    global $conn;
    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res = mysqli_query($conn,$sql1);
    $result = mysqli_fetch_array($res);
    $con_id = $result['con_id'];
    $sql = "insert into income (inc_date, inc_desc, inc_amount, con_id, inc_flag) Values ('$inc_date','$inc_desc','$inc_amount','$con_id',1)";
     if (mysqli_query($conn, $sql)) 
     {
		echo "Income added successfully !";
		return 1;
     } 
     else 
     {
		echo "Error: " . $sql . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}

function getIncIdDB($inc_id)
{
	global $conn;
    $query = "select income.inc_id,contract.con_name,income.inc_date,income.inc_desc,income.inc_amount from income inner join contract on income.con_id = contract.con_id where income.inc_id = '" . $inc_id . "'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function viewIncomeDB()
{
    global $conn;
	$query = "select income.inc_id,income.con_id,contract.con_name,income.inc_date,income.inc_desc,income.inc_amount from income inner join contract on income.con_id = contract.con_id where income.inc_flag = 1 ORDER BY inc_date DESC";
    $result = mysqli_query($conn,$query);
    return $result;
}

function deleterIncomeById($inc_id)
{
	global $conn;
	$sql = "update income set inc_flag = 0 WHERE inc_id='" . $inc_id . "'";
    if (mysqli_query($conn, $sql)) 
    {
		return 1;
    } 
    else 
    {
		echo "Error deleting income: " . mysqli_error($conn);
	}
}

function updateIncomeDB($inc_id,$con_name, $inc_date, $inc_desc, $inc_amount)
{
    global $conn;
    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res = mysqli_query($conn,$sql1);
    $result = mysqli_fetch_array($res);
    $con_id = $result['con_id'];
    $sql = "update income SET con_id='$con_id',inc_desc='".$inc_desc."',inc_date='".$inc_date."',inc_amount='".$inc_amount."' WHERE inc_id='".$inc_id."'";
    if (mysqli_query($conn, $sql))
    {
    } 
    else 
    {
		echo "Error updating income: " . mysqli_error($conn);
	}
}
function totalIncomeDB()
{
    global $conn;
    $sql = "SELECT SUM(inc_amount) AS inc_amount FROM income WHERE inc_flag = 1 AND EXTRACT(YEAR_MONTH FROM inc_date) = EXTRACT(YEAR_MONTH FROM CURDATE() - INTERVAL 1 MONTH)";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function viewIncomeReportDB($con_name,$s_date,$e_date)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $query = "SELECT inc.desc,inc.date,inc.amount from income where inc_flag = 1 AND con_id = '$con_id'  inc_date BETWEEN '$s_date' AND '$e_date'";
    $result = mysqli_query($conn,$query);
    return $result;



}

?>