<?php
// include model
require_once("./../../model/incomeModel.php");


if(isset($_POST['incDetails']))
{
    $inc = new Income();
    $inc->addIncome();
}

if(isset($_POST['incUpdateDetails']))
{
    $inc = new Income();
    $inc->updateIncome();
}

if (isset($_GET['deleteid']))
{
    $inc = new Income();
    $inc->deleteIncome($_GET['deleteid']);
}

// income class
class Income
{
    function addIncome()
    {
        $con_name = $_POST['con_name'];
        $inc_date = $_POST['inc_date'];
        $inc_desc = $_POST['inc_desc'];
        $inc_amount = $_POST['inc_amount'];
        

        if(!empty($con_name) && !empty($inc_date) && !empty($inc_amount))
        {
        // check for validation
            addIncomeDB($con_name, $inc_date, $inc_desc, $inc_amount);
            header('location:./../../view/expense/addIncome.php');//redirection
            exit;//break;
        }
        else
        {
           echo "<h4>Fill all required feilds</h4>";
        }
    }
    function viewIncome()
    {
        // view Income
        $res =  viewIncomeDB();
        return $res;   
    }
    function deleteIncome($inc_id)
    {
        //delete Income
        if(deleterIncomeById($inc_id))
        {
            header('location:./../../view/expense/addIncome.php');
            exit;
        }
    }
    function getIncId($inc_id)
    {
        $res = getIncIdDB($inc_id);
        return $res;
    }
    function updateIncome()
    {
        //update Income
        $inc_id = $_POST['inc_id'];
        $con_name = $_POST['con_name'];
        $inc_date = $_POST['inc_date'];
        $inc_desc = $_POST['inc_desc'];
        $inc_amount = $_POST['inc_amount'];
       
        if(!empty($con_name) && !empty($inc_date) && !empty($inc_amount))
        {
            updateIncomeDB($inc_id,$con_name, $inc_date, $inc_desc, $inc_amount); 
        }
        else
        {
            echo 'Fill all required feilds';
        }
        header('location:./../../view/expense/addIncome.php');
        exit;

    }
    function totalIncome()
    {
       $result = totalIncomeDB();
       return $result;
    }

    function viewIncomeReport($con_name,$s_date,$e_date)
    {
        $result = viewIncomeReportDB($con_name,$s_date,$e_date);
        return $result;
    }
}

?>