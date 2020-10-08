<?php
require_once("./../../model/employeeModel.php");
if(isset($_POST['empDetails'])){
    $emp = new Employee();
    $emp->addEmployee();
}
if (isset($_GET['deleteid'])) {
    $emp = new Employee();
    $emp->deleteEmployee($_GET['deleteid']);
}

class Employee{

    function __construct(){
       
    }
    function addEmployee(){
        // echo "in the function";
        $emp_nic = $_POST['emp_nic'];
        $emp_name = $_POST['emp_name'];
        $emp_dob = $_POST['emp_dob'];
        $emp_address = $_POST['emp_address'];
        $emp_contact = $_POST['emp_contact'];
        $emp_type = $_POST['emp_type'];

        if(!empty($emp_nic) && !empty($emp_name) && !empty($emp_dob) && !empty($emp_address) && !empty($emp_contact) && !empty($emp_type)){
            if(getNICEmployee($emp_nic)){
                    addEmployeeDB($emp_nic,$emp_name,$emp_dob,$emp_address,$emp_contact,$emp_type);
            }else{
                echo "Employee already exist";
            }	
        }else{
            echo 'All fields are required';
        }
        header('location:./../../view/user/employeeView.php');
        exit;
    }
    function getAllEmployee(){
        // get all employee controller
        $res =  getAllEmployeeDB();
        
        return $res;
        
    }
    function getSingleEmployee($id){
        $res = getSingleEmployeeDB($id);
        return $res;
    }
    function deleteEmployee($nic){
        //delete the employee
        if(deleterUserByNic($nic)){
            header('location:./../../view/user/employeeView.php');
            exit;
        }
    }
    function updateEmployee(){
        //update the employee

    }
}

?>