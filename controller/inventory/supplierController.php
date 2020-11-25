<?php
// include model
    require_once("./../../model/inventory/supplierModel.php");
    
    if(isset($_POST['addSupplier'])){
        $con = new Supplier();     
        $con->addSupplier();
    }

    class Supplier{
        function __construct(){
            $this->index();
        }
        function index(){
            //to-do
        }

        function addSupplier(){
            $supName = $_POST['supName'];
            $supMail = $_POST['supMail'];
            $supMob = $_POST['supMob'];
            $supAddress = $_POST['supAddress'];
    
            if(!empty($supName) && !empty($supMail) && !empty($supMob) && !empty($supAddress)){
                if(isInSupplier($supName)){
                    echo "<script>
                    if (confirm('Supplier Already Exists!')) {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    }</script>";
                }else{
                    insertToSupplier($supName, $supMail, $supMob, $supAddress);
                    echo "<script>
                    if (confirm('Supplier Added Successfully!')) {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/supplier.php\");
                    }</script>";
                }
            }else{
                echo 'All fields are required';
            }
            exit;
        }

        function getAllSuppliers(){
            $res =  selectAllSuppliers();
            return $res;
        }

        function getActiveSuppliers(){
            $res =  selectActiveSuppliers();
            return $res;
        }
    }

?>

