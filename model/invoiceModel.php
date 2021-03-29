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
    public function updateInvoiceDB($POST){
        global $conn;	
		$sql = "
				UPDATE ".$this->invoiceOrderTable." 
				SET date = '".date('Y-m-d')."', company_name= '".$POST['c_company']."', total_before_tax = '".$POST['subTotal']."', 
                total_tax = '".$POST['taxAmount']."', tax_per = '".$POST['taxRate']."', total_after_tax = '".$POST['totalAftertax']."', 
                amount_paid = '".$POST['amountPaid']."', amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."' 
				WHERE con_id = '".$POST['con_id']."' AND invo_id = '".$POST['invo_id']."'";		
		
        if(mysqli_query($conn, $sql)){
            echo "invoice template updated successfully !";
            $this->deleteInvoiceItems($POST['invo_id']);
		    for ($i = 0; $i < count($POST['productCode']); $i++) {			
			    $sql2 = "
				INSERT INTO ".$this->invoiceOrderItemTable." 
				VALUES ('','".$POST['invo_id']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			    if(mysqli_query($conn, $sql2)){
                    echo "invoice item updated successfully !";
                }else{
                    echo "Error: " . $sql2 . " " . mysqli_error($conn);
                }			
		    }
            return 1;
        }else{
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0; 
        }			
    }
    public function deleteInvoiceItems($invoiceId){
        global $conn;
		$sql = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE invo_id = '".$invoiceId."'";
		if(mysqli_query($conn, $sql)){
            echo "all items replaced";
        }else{
            echo "replaced unsuccess";
        }				
	}
    public function deleteInvoiceDB($id){
        global $conn;
		$sql = "DELETE FROM ".$this->invoiceOrderTable." WHERE invo_id = '".$id."'";
		mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            echo "invoice delete successfully !";
            return 1;
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }		
	}
    public function getIncomebyContractDB(){
        global $conn;
		$sql = "select company_name,sum(amount_paid) as income from invoice group by con_id";
		$res = mysqli_query($conn, $sql);
        if ($res) {
            //echo "invoice incomes get successfully !";
            
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            return 0;
        }
        return $res;
    }
}

?>