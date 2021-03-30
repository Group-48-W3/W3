<?php
// include model
require_once("./../../model/inventory/supplierModel.php");

if (isset($_POST['addSupplier'])) {
    $con = new Supplier();
    $con->addSupplier();
}
if (isset($_POST['toggleActive'])) {
    $con = new Supplier();
    $con->toggleActive();
}
if (isset($_POST['updateSupplier'])) {
    $con = new Supplier();
    $con->updateSupplier();
}

class Supplier
{
    function __construct()
    {
        $this->index();
    }
    function index()
    {
        //to-do
    }
    function addSupplier()
    {
        $supName = $_POST['supName'];
        $supMail = $_POST['supMail'];
        $supMob = $_POST['supMob'];
        $supAddress = $_POST['supAddress'];
        $supCat = $_POST['supplierCat'];

        if (!empty($supName) && !empty($supMail) && !empty($supMob) && !empty($supAddress) && !empty($supCat)) {
            if (isInSupplier($supName)) {
                echo "<script>
                    if (confirm('Supplier Already Exists!')) {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    }</script>";
            } else {
                insertToSupplier($supName, $supMail, $supMob, $supAddress, $supCat);
                echo "<script>
                    if (confirm('Supplier Added Successfully!')) {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    }</script>";
            }
        } else {
            echo 'All fields are required';
        }
        exit;
    }
    function getAllSuppliers()
    {
        $res =  selectAllSuppliers();
        return $res;
    }
    function getSupplier($supplierID)
    {
        $res =  selectSupplier($supplierID);
        return $res;
    }
    function getActiveSuppliers()
    {
        $res =  selectActiveSuppliers();
        return $res;
    }
    function toggleActive()
    {
        $id = $_POST['supId'];
        $status = $_POST['supStatus'];
        toggleActiveDB($id, $status);
        echo "<script>
                    if (confirm('Supplier Updated Successfully!')) {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    }</script>";
        exit;
    }
    function updateSupplier()
    {
        $id = $_POST['supplierId'];
        $name = $_POST['supName'];
        $email = $_POST['supMail'];
        $mobile = $_POST['supMob'];
        $address = $_POST['supAddress'];
        $category = $_POST['supplierCat'];
        updateSupplierDB($id, $name, $email, $mobile, $address, $category);
        echo "<script>
        if (confirm('Supplier Updated Successfully!')) {
            window.location.replace(\"./../../view/inventory/supplier.php\");
        } else {
            window.location.replace(\"./../../view/inventory/supplier.php\");
        }</script>";
        exit;
    }
}
