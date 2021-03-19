<?php
require_once("./../../config/config.php");

class InvoiceModel{
    private $invoiceOrderTable = 'invoice';
	private $invoiceOrderItemTable = 'invoice_item';
    public function getInvoiceListDB(){
        global $conn;
        $sql = "select * from invoice";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "invoice list retrive successfully !";
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        
        return $result;
        mysqli_close($conn);
    }
    public function addInvoiceDB($POST){
        global $conn;
        $sql = "
		INSERT INTO ".$this->invoiceOrderTable." 
		VALUES (' ','".
        date("Y-m-d")."', '".$POST['c_company']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."', '".$POST['c_id']."')";		
		
        
        if (mysqli_query($conn, $sql)) {
            //echo "invoice created successfully !";
            $mid_sql = "select invo_id from invoice ORDER BY invo_id DESC LIMIT 1";
            $res = mysqli_fetch_array(mysqli_query($conn, $mid_sql));
            for ($i = 0; $i < count($POST['productCode']); $i++) {
                $sql2 = "
                INSERT INTO ".$this->invoiceOrderItemTable.
                " VALUES (' ','".$res[0]."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
                if(mysqli_query($conn, $sql2)){
                    //echo "invoice item created successfully !";
                }else{
                    echo "Error: " . $sql2 . " " . mysqli_error($conn);
                }
            }
            return 1;
         } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
         }
        mysqli_close($conn);
    }
    public function getInvoiceDB($invo_id){
        global $conn;
        $sql = "select * from invoice WHERE invo_id = '$invo_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "invoice list retrive successfully !";
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        
        return $result;
    }
    public function getInvoiceItemsDB($invo_id){
        global $conn;
        $sql = "select * from invoice_item WHERE invo_id = '$invo_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //echo "invoice list retrive successfully !";
        
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        
        return $result;
    }
}

?>