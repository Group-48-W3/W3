<?php
// include model
require_once("./../../model/expenseModel.php");


if(isset($_POST['payDetails']))
{
    $pay = new Payment();
    $pay->addPayment();
}

if(isset($_POST['salDetails']))
{
    $pay = new Payment();
    $pay->addSalary();
}

if(isset($_POST['payUpdateDetails']))
{
    $pay = new Payment();
    $pay->updatePayment();
}

if(isset($_POST['payUpdateDetails1']))
{
    $pay = new Payment();
    $pay->updateSalary();
}

if (isset($_GET['deleteid']))
{
    $pay = new Payment();
    $pay->deletePayment($_GET['deleteid']);
}

if (isset($_GET['paidid']))
{
    $pay = new Payment();
    $pay->paidSchedule($_GET['paidid']);
}

// payment class
class Payment
{
    function addPayment()
    {
        $con_name = $_POST['con_name'];
        $cat_name = $_POST['cat_name'];
        $p_date = $_POST['p_date'];
        $p_desc = $_POST['p_desc'];
        $p_amount = $_POST['p_amount'];
        $p_type = $_POST['p_type'];
        $p_status = $_POST['p_status'];
        
        if(!empty($con_name) && !empty($p_date) && !empty($p_amount) && !empty($p_status) && !empty($cat_name))
        {
        // check for validation
            addPaymentDB($con_name, $cat_name, $p_date, $p_desc, $p_amount, $p_type, $p_status);
            header('location:./../../view/expense/addExpense.php');//redirection
            exit;//break;
        }
        else
        {
           echo "<h4>Fill all required feilds</h4>";
        }
    }
    function addSalary()
    {
        $con_name = $_POST['con_name'];
        $emp_name = $_POST['emp_name'];
        $p_date = $_POST['p_date'];
        $p_desc = $_POST['p_desc'];
        $p_amount = $_POST['p_amount'];
        $p_type = $_POST['p_type'];
        
        if(!empty($con_name) && !empty($p_date) && !empty($p_amount) &&  !empty($emp_name))
        {
        // check for validation
            addSalaryDB($con_name, $emp_name, $p_date, $p_desc, $p_amount, $p_type);
            header('location:./../../view/expense/addExpense.php');//redirection
            exit;//break;
        }
        else
        {
           echo "<h4>Fill all required feilds</h4>";
        }
    }
    function viewPayment()
    {
        // view Expense
        $res =  viewPaymentDB();
        return $res;   
    }
    function viewSalary()
    {
        // view Salary payments
        $res =  viewSalaryDB();
        return $res;   
    }
    function viewSchedule()
    {
        // view Schedule
        $res =  viewScheduleDB();
        return $res;   
    }
    function deletePayment($p_id)
    {
        //delete Payment
        if(deleterPaymentById($p_id))
        {
            header('location:./../../view/expense/addExpense.php');
            exit;
        }
    }

    function paidSchedule($p_id)
    {
        //delete Payment
        if(paidScheduleById($p_id))
        {
            header('location:./../../view/expense/addExpense.php');
            exit;
        }
    }

    function getPayId($p_id)
    {
        $res = getPayIdDB($p_id);
        return $res;
    }

    function getPayId1($p_id)
    {
        $res = getPayId1DB($p_id);
        return $res;
    }

    function updatePayment()
    {
        //update payment
        $p_id = $_POST['p_id'];
        $con_name = $_POST['con_name'];
        $cat_name = $_POST['cat_name'];
        $p_date = $_POST['p_date'];
        $p_desc = $_POST['p_desc'];
        $p_amount = $_POST['p_amount'];
        $p_type = $_POST['p_type'];
       
        if(!empty($con_name) && !empty($p_date) && !empty($p_amount) && !empty($cat_name))
        {
        // check for validation
            updatePaymentDB($p_id,$con_name, $cat_name, $p_date, $p_desc, $p_amount, $p_type);
            header('location:./../../view/expense/addExpense.php');//redirection
            exit;//break;
        }
        else
        {
           echo "<h4>Fill all required feilds</h4>";
        }

    }

    function updateSalary()
    {
        //update salary
        $p_id = $_POST['p_id'];
        $con_name = $_POST['con_name'];
        $emp_name = $_POST['emp_name'];
        $p_date = $_POST['p_date'];
        $p_desc = $_POST['p_desc'];
        $p_amount = $_POST['p_amount'];
        $p_type = $_POST['p_type'];
       
        if(!empty($con_name) && !empty($p_date) && !empty($p_amount) && !empty($emp_name))
        {
        // check for validation
            updateSalaryDB($p_id,$con_name, $emp_name, $p_date, $p_desc, $p_amount, $p_type);
            header('location:./../../view/expense/addExpense.php');//redirection
            exit;//break;
        }
        else
        {
           echo "<h4>Fill all required feilds</h4>";
        }

    }

    function tExpense()
    {
       $result = tExpenseDB();
       return $result;
    }

    function yExpense()
    {
       $result = yExpenseDB();
       return $result;
    }

    function wExpense()
    {
       $result = wExpenseDB();
       return $result;
    }

    function mExpense()
    {
       $result = mExpenseDB();
       return $result;
    }
}

?>