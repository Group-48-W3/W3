<?php
require_once("./../../config/config.php");

function addPaymentDB($con_name, $cat_name, $p_date, $p_desc, $p_amount, $p_type, $p_status)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $sql2 = "SELECT cat_id FROM category WHERE cat_name = '$cat_name' ";
    $res2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($res2);
    $cat_id = $result2['cat_id'];

    $sql = "insert into payment (p_desc, p_type, p_date, p_amount, p_status, con_id, cat_id, p_flag) Values ('$p_desc','$p_type','$p_date','$p_amount','$p_status','$con_id','$cat_id',1)";
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

function addSalaryDB($con_name, $emp_name, $p_date, $p_desc, $p_amount, $p_type)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $sql2 = "SELECT emp_id FROM employee WHERE emp_name = '$emp_name' ";
    $res2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($res2);
    $emp_id = $result2['emp_id'];
    //cat_id is 1 default value of salary payment

    $sql3 = "INSERT INTO payment (p_desc, p_type, p_date, p_amount, p_status, con_id, cat_id, p_flag) Values ('$p_desc','$p_type','$p_date','$p_amount','Paid','$con_id',1,1)";
     if (mysqli_query($conn, $sql3)) 
     {
        $sql4 = "INSERT INTO need (emp_id,p_id,pay_date) VALUES ('$emp_id',LAST_INSERT_ID(),'$p_date')";
        if (mysqli_query($conn, $sql4))
        {
            echo "Income added successfully !";
            return 1;
        }  
        else
        {
            echo "Error: " . $sql4 . " " . mysqli_error($conn);
            return 0;
         }
     } 
     else 
     {
		echo "Error: " . $sql3 . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}

function getPayIdDB($p_id)
{
	global $conn;
    $query = "select payment.p_id,contract.con_name,payment.p_date,payment.p_desc,payment.p_amount,payment.p_type,category.cat_name from contract inner join payment on contract.con_id = payment.con_id inner join category on payment.cat_id = category.cat_id where payment.p_id = '" . $p_id . "'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function getPayId1DB($p_id)
{
	global $conn;
    $query = "select payment.p_id,contract.con_name,payment.p_date,payment.p_desc,payment.p_amount,payment.p_type,employee.emp_name from contract inner join payment on contract.con_id = payment.con_id inner join need on payment.p_id = need.p_id inner join employee on need.emp_id = employee.emp_id where payment.p_id = '" . $p_id . "'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function viewPaymentDB()
{
    global $conn;
	$query = "SELECT contract.con_name,category.cat_name,payment.p_id,payment.p_amount,payment.p_date,payment.p_type,payment.p_desc from contract inner join payment on contract.con_id = payment.con_id inner join category on payment.cat_id = category.cat_id where payment.p_flag = 1 AND payment.p_status = 'Paid' AND category.cat_id != 1 ORDER BY p_date DESC";
    $result = mysqli_query($conn,$query);
    return $result;
}
function viewSalaryDB()
{
    global $conn;
	$query = "SELECT contract.con_name,employee.emp_name,payment.p_id,payment.p_amount,payment.p_date,payment.p_type,payment.p_desc from contract inner join payment on contract.con_id = payment.con_id inner join need on payment.p_id = need.p_id inner join employee on need.emp_id = employee.emp_id where payment.p_flag = 1 ORDER BY p_date DESC";
    $result = mysqli_query($conn,$query);
    return $result;
}
function viewScheduleDB()
{
    global $conn;
	$query = "SELECT contract.con_name,category.cat_name,payment.p_id,payment.p_amount,payment.p_date,payment.p_type,payment.p_desc from contract inner join payment on contract.con_id = payment.con_id inner join category on payment.cat_id = category.cat_id where payment.p_flag = 1 AND payment.p_status = 'Pending' ORDER BY p_date";
    $result = mysqli_query($conn,$query);
    return $result;
}

function deleterPaymentById($p_id)
{
	global $conn;
	$sql = "update payment set p_flag = 0 WHERE p_id='" . $p_id . "'";
    if (mysqli_query($conn, $sql)) 
    {
		return 1;
    } 
    else 
    {
		echo "Error deleting income: " . mysqli_error($conn);
	}
}

function paidScheduleById($p_id)
{
	global $conn;
	$sql = "update payment set p_status = 'Paid' , p_date = CURDATE() WHERE p_id='" . $p_id . "'";
    if (mysqli_query($conn, $sql)) 
    {
		return 1;
    } 
    else 
    {
		echo "Error deleting income: " . mysqli_error($conn);
	}
}

function updatePaymentDB($p_id,$con_name, $cat_name, $p_date, $p_desc, $p_amount, $p_type)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $sql2 = "SELECT cat_id FROM category WHERE cat_name = '$cat_name' ";
    $res2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($res2);
    $cat_id = $result2['cat_id'];

    $sql = "update payment SET con_id='".$con_id."',cat_id='".$cat_id."',p_desc='".$p_desc."',p_date='".$p_date."',p_amount='".$p_amount."',p_type='".$p_type."' WHERE p_id='".$p_id."'";
    if (mysqli_query($conn, $sql))
    {
    } 
    else 
    {
		echo "Error updating income: " . mysqli_error($conn);
	}
}

function updateSalaryDB($p_id,$con_name, $emp_name, $p_date, $p_desc, $p_amount, $p_type)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $sql2 = "SELECT emp_id FROM employee WHERE emp_name = '$emp_name' ";
    $res2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($res2);
    $emp_id = $result2['emp_id'];
    //cat_id is 1 default value of salary payment

    $sql3 = "update payment SET con_id='".$con_id."',p_desc='".$p_desc."',p_date='".$p_date."',p_amount='".$p_amount."',p_type='".$p_type."' WHERE p_id='".$p_id."'";
     if (mysqli_query($conn, $sql3)) 
     {
        $sql4 =  "update need SET emp_id='".$emp_id."',pay_date='".$p_date."' WHERE p_id='".$p_id."'";
        if (mysqli_query($conn, $sql4))
        {
        }  
        else
        {
            echo "Error: " . $sql4 . " " . mysqli_error($conn);
            return 0;
         }
     } 
     else 
     {
		echo "Error: " . $sql3 . " " . mysqli_error($conn);
		return 0;
	 }
	 mysqli_close($conn);
}

function tExpenseDB()
{
    global $conn;
    $sql = "SELECT SUM(p_amount) AS p_texpense FROM payment WHERE p_flag = 1 AND cat_id != 1 AND p_date = CURDATE()" ;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function yExpenseDB()
{
    global $conn;
    $sql = "SELECT SUM(p_amount) AS p_yexpense FROM payment WHERE p_flag = 1 AND cat_id != 1 AND p_date = CURDATE() - INTERVAL 1 DAY" ;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function wExpenseDB()
{
    global $conn;
    $sql = "SELECT SUM(p_amount) AS p_wexpense FROM payment WHERE p_flag = 1 AND cat_id != 1 AND p_date >= CURDATE() - INTERVAL 7 DAY" ;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function mExpenseDB()
{
    global $conn;
    $sql = "SELECT SUM(p_amount) AS p_mexpense FROM payment WHERE p_flag = 1 AND cat_id != 1 AND p_date >= CURDATE() - INTERVAL 1 MONTH" ;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function viewPaymentReportDB($con_name,$s_date,$e_date)
{
    global $conn;

    $sql1 = "SELECT con_id FROM contract WHERE con_name = '$con_name'";
    $res1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_array($res1);
    $con_id = $result1['con_id'];

    $query = "SELECT category.cat_name,payment.p_amount,payment.p_date,payment.p_type,payment.p_desc from payment inner join category on payment.cat_id = category.cat_id where payment.p_flag = 1 AND payment.p_status = 'Paid' AND category.cat_id != 1 AND p_date BETWEEN '$s_date' AND '$e_date' AND payment.con_id = '$con_id'";
    $result = mysqli_query($conn,$query);
    return $result;
}

function maintenanceCostDB()
{
    global $conn;
    $sql = "SELECT SUM(cost) AS cost FROM maintenance";
    $result = mysqli_query($conn, $sql);
    return $result;
}

?>