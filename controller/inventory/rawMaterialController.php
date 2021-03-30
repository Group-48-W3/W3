<?php
// include model
require_once("./../../model/inventory/rawMaterialModel.php");

if (isset($_POST['addNewRawMaterialCategory'])) {
    $con = new RawMaterial();
    $con->addRawMaterialCategory();
}

if (isset($_POST['replenishRawMaterial'])) {
    $con = new RawMaterial();
    $con->replenishRawMaterial();
}

if (isset($_POST['issueRawMaterial'])) {
    $con = new RawMaterial();
    $con->issueRawMaterial();
}

if (isset($_POST['issueConfirmed'])) {
    $con = new RawMaterial();
    $con->issueAndInform();
}
if (isset($_POST['updateMatCategory'])) {
    $con = new RawMaterial();
    $con->updateCategory();
}
if (isset($_POST['updateBatch'])) {
    $con = new RawMaterial();
    $con->updateBatch();
}

class RawMaterial
{
    function __construct()
    {
        $this->index();
    }

    function index()
    {
        //
    }

    function addRawMaterialCategory()
    {
        $materialName = $_POST['materialName'];
        $materialDescription = $_POST['materialDescription'];
        $materialReorderValue = $_POST['materialReorderValue'];
        $materialAbcCategory = $_POST['materialAbcCategory'];

        if (!empty($materialName) && !empty($materialDescription) && !empty($materialReorderValue) && !empty($materialAbcCategory)) {
            if (isInRawMaterial($materialName)) {
                echo "<script>
                    if (confirm('Material Already Exists!')) {
                        window.location.replace(\"./../../view/inventory/replenish.php\");
                    } else {
                        window.location.replace(\"./../../view/inventory/replenish.php\");
                    }</script>";
            } else {
                //get owner permission to execute following command
                insertRawMaterialCategory($materialName, $materialDescription, $materialReorderValue, $materialAbcCategory);
            }
        } else {
            echo 'All fields are required';
        }
        //header('location:./../../view/inventory/replenishOwnerPermission.php');//redirection
        exit;
    }

    function getAllRawMaterialCategory()
    {
        // select all raw material categories from db
        $res =  selectAllRawMaterialCategories();
        return $res;
    }

    function getRawMaterialCategory($matId)
    {
        $res =  selectRawMaterialCategoryDB($matId);
        if (mysqli_num_rows($res) > 0) {
            $details = mysqli_fetch_array($res);
            return $details;
        }
        return 0;
    }

    function getMaterialName($material)
    {
        $res =  mysqli_fetch_array(getSingleMaterial($material));
        return $res['mat-name'];
    }

    function replenishRawMaterial()
    {
        $replenishMaterialId = $_POST['inventoryCode'];
        $replenishMaterialAmount = $_POST['replenishMaterialAmount'];
        $replenishUnitPrice = $_POST['replenishUnitPrice'];
        $replenishLocation = $_POST['replenishLocation'];
        $replenishPeriod = $_POST['replenishPeriod'];
        $replenishSupplier = $_POST['replenishSupplier'];
        $replenishDelivery = $_POST['replenishDelivery'];

        if (!empty($replenishMaterialId) && !empty($replenishMaterialAmount) && !empty($replenishUnitPrice) && !empty($replenishLocation) && !empty($replenishPeriod) && !empty($replenishSupplier) && !empty($replenishDelivery)) {
            addNewBatch($replenishMaterialId, $replenishMaterialAmount, $replenishUnitPrice, $replenishLocation, $replenishPeriod, $replenishSupplier, $replenishDelivery);
            session_start();
            $_SESSION['replenishMaterialId'] = $replenishMaterialId;
            $_SESSION['replenishMaterialAmount'] = $replenishMaterialAmount;
            $_SESSION['replenishUnitPrice'] = $replenishUnitPrice;
            $_SESSION['replenishPeriod'] = $replenishPeriod;
            $_SESSION['replenishSupplier'] = $replenishSupplier;
            $_SESSION['replenishDelivery'] = $replenishDelivery;
            header('location:./../../view/inventory/goodRecieveNote.php');
        } else {
            echo 'All fields are required';
        }
        //redirection
        exit;
    }

    function getBatchDetails($inventoryCode)
    {
        $res =  getBatchDetailsDB($inventoryCode);
        return $res;
    }

    function getAllBatchDetailsOf($inventoryCode)
    {
        $res = getAllBatchDetailsWhere($inventoryCode);
        return $res;
    }

    function getSingleBatchDetails($batch)
    {
        $res = getSingleBatchDetailsWhere($batch);
        if (mysqli_num_rows($res) > 0) {
            $details = mysqli_fetch_array($res);
            return $details;
        }
        return 0;
    }

    function issueRawMaterial()
    {
        $material = $_POST['matCategory'];
        $quantity = $_POST['issueAmount'];
        $contract = $_POST['contractID'];
        $employee = $_POST['matEmployeeID'];
        if (!empty($material) && !empty($quantity) && !empty($contract) && !empty($employee)) {
            $availableQuantity = getAvailableQuantity($material);
            $reorderValue = getReorderValue($material);

            if ($availableQuantity - $quantity > $reorderValue) {
                issueFromRawMaterial($material, $quantity);
                finishIssue($material, $quantity, $contract, $employee);
            } else if ($availableQuantity - $quantity <= $reorderValue) {
                if ($availableQuantity - $quantity < 0) {
                    echo "<script>
                        if (confirm('Issue Failed! Not enough stock')) {
                            window.location.replace(\"./../../view/inventory/issue.php\");
                        } else {
                            window.location.replace(\"./../../view/inventory/issue.php\");
                        }
                    </script>";
                } else {
                    session_start();
                    $_SESSION['material'] = $material;
                    $_SESSION['quantity'] = $quantity;
                    $_SESSION['contract'] = $contract;
                    $_SESSION['employee'] = $employee;
                    $_SESSION['availableQuantity'] = $availableQuantity;
                    $_SESSION['reorderValue'] = $reorderValue;
                    header('location:./../../view/inventory/issueSubmit.php');
                    exit;
                }
            }
        } else {
            echo 'All fields are required';
        }
    }

    function issueAndInform()
    {
        $material = $_POST['matCategory'];
        $quantity = $_POST['issueAmount'];
        $contract = $_POST['contractID'];
        $employee = $_POST['matEmployeeID'];
        issueFromRawMaterial($material, $quantity);
        finishIssue($material, $quantity, $contract, $employee);
    }

    function getIssueDetails()
    {
        $res = getRawMaterialIssues();
        return $res;
    }

    function getExpiredCount()
    {
        $res = mysqli_num_rows(getExpiredBatches());
        return $res;
    }

    function getReOrderCount()
    {
        $res = getReOrderMaterials();
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            $reOrdervalue = getReorderValue($row['inv-code']);
            if ($row['available'] < $reOrdervalue) {
                $i++;
            }
        }
        return $i;
    }
    function updateCategory()
    {
        $mName = $_POST['mName'];
        $mDesc = $_POST['mDesc'];
        $mMinQty = $_POST['mMinQty'];
        $abc = $_POST['abc'];
        $matId = $_POST['matId'];
        updateMatCatDB($mName, $mDesc, $mMinQty, $abc, $matId);
        echo "<script>
        if (confirm('Raw Material Category Updated Successfully!')) {
            window.location.replace(\"./../../view/inventory/inventoryHome.php\");
        } else {
            window.location.replace(\"./../../view/inventory/inventoryHome.php\");
        }</script>";
        exit;
    }
    function updateBatch()
    {
        $bLoc = $_POST['bLoc'];
        $bDate = $_POST['bDate'];
        $bQty = $_POST['bQty'];
        $bPrice = $_POST['bPrice'];
        $batchId = $_POST['batchId'];
        $inv = $_POST['invCode'];
        updateBatchDB($batchId, $bLoc, $bDate, $bQty, $bPrice);
        echo "<script>
        if (confirm('Raw Material Batch Updated Successfully!')) {
            window.location.replace(\"./../../view/inventory/rawMaterialBatch.php?material=" . $inv . "\");
        } else {
            window.location.replace(\"./../../view/inventory/rawMaterialBatch.php?material=" . $inv . "\");
        }</script>";
        exit;
    }
    // to retrive the data for storage report
    function getAllIssueRawMaterialContract($id){
        $res = getAllIssueRawMaterialContractDB($id);
        return $res;
    }
}
