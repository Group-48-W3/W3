<?php
// include model
require_once("./../../model/inventory/maintenanceModel.php");

if (isset($_POST['addMaintenance'])) {
    $con = new Maintenance();
    $con->addMaintenance();
}
if (isset($_POST['removeMaintenance'])) {
    $con = new Maintenance();
    $con->removeFromMaintenance();
}

class Maintenance
{
    function __construct()
    {
        $this->index();
    }
    function index()
    {
        //
    }

    function addMaintenance()
    {
        $machine = $_POST['machineID'];
        $reason = $_POST['reason'];
        $maintainer = $_POST['maintainer'];
        $pickup = $_POST['pickup'];

        if (!empty($machine) && !empty($reason) && !empty($maintainer) && !empty($pickup)) {
            addMachineToMaintenance($machine, $reason, $maintainer, $pickup);
        } else {
            echo "All fields are required!";
        }
        header('location:./../../view/inventory/maintenance.php');
        exit;
    }

    function getMaintenanceCount()
    {
        if (mysqli_num_rows(getMachinesInMaintenance()) > 0) {
            $res = mysqli_num_rows(getMachinesInMaintenance());
            return $res;
        } else {
            return 0;
        }
    }

    function getFinishedCount()
    {
        if (mysqli_num_rows(getFinishedMaintenance()) > 0) {
            $res = count(mysqli_fetch_array(getFinishedMaintenance()));
            return $res;
        } else {
            return 0;
        }
    }

    function getMaintenanceDetails()
    {
        $res = getMaintenanceDetailsDB();
        return $res;
    }

    function getPreviousMaintenance()
    {
        $res = getPreviousMaintenanceDB();
        return $res;
    }

    function removeFromMaintenance()
    {
        $maintenance = $_POST['maintenanceID'];
        $machine = $_POST['machineID'];
        $cost = $_POST['cost'];
        $receivedDate = $_POST['receivedDate'];
        if (!empty($machine) && !empty($maintenance) && !empty($cost) && !empty($receivedDate)) {
            removeMachinefromMaintenance($maintenance, $machine, $cost, $receivedDate);
        } else {
            echo "All fields are required!";
        }
        header('location:./../../view/inventory/maintenance.php');
        exit;
    }
}
