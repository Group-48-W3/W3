<?php 
    session_start();
    if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
    require_once('./../../controller/user/userController.php');
    require_once('./header.php');
    require_once('./../../controller/contract/contractController.php'); 
    require_once('./../../controller/contract/activityController.php');


    $contract = new Contract();
    $con_details = $contract->getAllActiveContracts();
    
    $count = mysqli_num_rows($contract->getAllActiveContracts());
    
    $i = 0;
    $result = array();
    $data_bucket = array();
    while($res = mysqli_fetch_array($con_details)){
        
        $row[$i][0] = $res['con_id'];
        $row[$i][1] = $res['con_name'];
        $row[$i][2] = $res['con_progress'];

        $result[] = array("label"=>$row[$i][1], "symbol"=>$row[$i][0],"y"=>$row[$i][2]);
        
        $points = array();
        //echo $row[$i][0];
        $contract_progress_points = $contract->getAllProgressPointContract($row[$i][0]);
        $j = 1;
        while($res2 = mysqli_fetch_array($contract_progress_points)){
            //echo $res2['con_id']." ".$res2['progress_val']."</br>";
            $points[] = array("label"=>$res['con_name'],"x"=>$j,"y"=>$res2['progress_val']);
            //echo $res2['con_id']." ".$res2['progress_date']." ".$res2['progress_val']."</br>";
            $j++;
        }
        $data_bucket[] = $points;
        //echo $data_bucket[$i][0]['label']."</br>";
        $i++;
    }
?>
    <!-- Charts -->
    <div class="container">
        <h2>Business Overview</h2>
        <h3>Contract Overview</h3>
        <div class="container" id="chart">
            <div class="row">
                <div class="col-7">
                    <div id="contractBurndown" style="height: 320px; width: 100%;"></div>
                </div>
                <div class="col-4">
                    <div id="chartContainerpie" style="height:320px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <br>
        <h3>Expense Overview</h3>
        <!-- Body starts -->
        <div class="container" id="chart">
            <div class="row">
                <div class="col-6">
                    <div id="monthExpenseCtaegory" style="height: 370px;"></div>
                </div>
                <div class="col-5">
                    <div id="chartContainer" style="height:370px; background-color:#363332; "></div>
                </div>
            </div>
        </div>
        <!-- Body ends -->
        <br>
        <h3>Inventory Overview</h3>
        <div class="container" id="chart">
            <div id="itemDistribution" style="height: 370px;"></div></div>
        </div>
        
    <br>
    <!-- Charts ends -->
    
    <?php
        $dataPoints = array(
            array("x" => 946665000000, "y" => 3289000),
            array("x" => 978287400000, "y" => 3830000),
            array("x" => 1009823400000, "y" => 2009000),
            array("x" => 1041359400000, "y" => 2840000),
            array("x" => 1072895400000, "y" => 2396000),
            array("x" => 1104517800000, "y" => 1613000),
            array("x" => 1136053800000, "y" => 1821000),
            array("x" => 1167589800000, "y" => 2000000),
            array("x" => 1199125800000, "y" => 1397000),
            array("x" => 1230748200000, "y" => 2506000),
            array("x" => 1262284200000, "y" => 6704000),
            array("x" => 1293820200000, "y" => 5704000),
            array("x" => 1325356200000, "y" => 4009000),
            array("x" => 1356978600000, "y" => 3026000),
            array("x" => 1388514600000, "y" => 2394000),
            array("x" => 1420050600000, "y" => 1872000),
            array("x" => 1451586600000, "y" => 2140000)
        );
        
        $dataPoints_pie = $result;
    ?>

    <script>
        window.onload = function () {
        //////////////////////////////////////////////////////
        //demo
        // contract distribution
        
        
        // contract distribution
        var chartpie = new CanvasJS.Chart("chartContainerpie", {
        theme: "dark2",
        animationEnabled: true,
        title: {
            text: "Contract Distribution"
        },
        data: [{
            type: "doughnut",
            indexLabel: "{symbol} - {y}",
            yValueFormatString: "#,##0.0\"%\"",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints_pie, JSON_NUMERIC_CHECK); ?>
        }]
        });
        chartpie.render();
        
        // contract burndown
        var chart = new CanvasJS.Chart("contractBurndown", {
            theme: "dark2",
            animationEnabled: true,
            title:{
                text: "Contract Progress Analysis"
            },
            axisY :{
                includeZero: false,
                suffix: "%",
            },
            toolTip: {
                shared: true
            },
            legend: {
                fontSize: 13,
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [
            {
                type: "splineArea",
                showInLegend: true,
                name: "Araliya",
                yValueFormatString: "#,##0",
                xValueFormatString: "MMM YYYY",
                dataPoints: <?php echo json_encode($data_bucket[0], JSON_NUMERIC_CHECK); ?>
                    //[ 
                    // { x: new Date(2019, 2), y: 61000 },
                    // { x: new Date(2019, 3), y: 35000 },
                    // { x: new Date(2019, 4), y: 30000 },
                    // { x: new Date(2019, 5), y: 28400 },
                    // { x: new Date(2019, 6), y: 25900 },
                    // { x: new Date(2019, 7), y: 23000 },
                    // { x: new Date(2019, 8), y: 20200 },
                    // { x: new Date(2019, 9), y: 18000 },
                    // { x: new Date(2019, 10), y: 16500 },
                    // { x: new Date(2019, 11), y: 14800 },
                    // { x: new Date(2020, 0),  y: 11900 },
                    // { x: new Date(2020, 1),  y: 9000 }
                    //]
                
            },
            
            {
                type: "splineArea", 
                showInLegend: true,
                name: "Bentota Beach",
                yValueFormatString: "#,##0",
                dataPoints: <?php echo json_encode($data_bucket[1], JSON_NUMERIC_CHECK); ?>
                // [
                //     { x: new Date(2019, 2), y: 72100 },
                //     { x: new Date(2019, 3), y: 66000 },
                //     { x: new Date(2019, 4), y: 60000 },
                //     { x: new Date(2019, 5), y: 55000 },
                //     { x: new Date(2019, 6), y: 49000 },
                //     // { x: new Date(2019, 7), y: 21000 },
                //     // { x: new Date(2019, 8), y: 22000 },
                //     // { x: new Date(2019, 9), y: 25000 },
                //     // { x: new Date(2019, 10), y: 23000 },
                //     // { x: new Date(2019, 11), y: 25000 },
                //     // { x: new Date(2017, 0), y: 26000 },
                //     // { x: new Date(2017, 1), y: 25000 }
                // ]
            },
            {
                type: "splineArea", 
                showInLegend: true,
                name: "KCC Kandy",
                yValueFormatString: "#,##0",     
                dataPoints: <?php echo json_encode($data_bucket[2], JSON_NUMERIC_CHECK); ?>
                // [
                //     { x: new Date(2019, 2), y: 60100 },
                //     { x: new Date(2019, 3), y: 45000 },
                //     { x: new Date(2019, 4), y: 40400 },
                //     { x: new Date(2019, 5), y: 33000 },
                //     { x: new Date(2019, 6), y: 27000 },
                //     // { x: new Date(2019, 7), y: 3900 },
                //     // { x: new Date(2019, 8), y: 4200 },
                //     // { x: new Date(2019, 9), y: 5000 },
                //     // { x: new Date(2019, 10), y: 14300 },
                //     // { x: new Date(2019, 11), y: 12300 },
                //     // { x: new Date(2017, 0), y: 8300 },
                //     // { x: new Date(2017, 1), y: 6300 }
                // ]
            },
            {
                type: "splineArea", 
                showInLegend: true,
                yValueFormatString: "#,##0",      
                name: "Matrix Wood",
                dataPoints: <?php echo json_encode($data_bucket[3], JSON_NUMERIC_CHECK); ?>
                // [
                //     { x: new Date(2019, 2), y: 27000 },
                //     { x: new Date(2019, 3), y: 24500 },
                //     { x: new Date(2019, 4), y: 22000 },
                //     { x: new Date(2019, 5), y: 19800 },
                //     { x: new Date(2019, 6), y: 16000 },
                //     { x: new Date(2019, 7), y: 14000 },
                //     { x: new Date(2019, 8), y: 11500 },
                //     { x: new Date(2019, 9), y: 10000 },
                //     { x: new Date(2019, 10), y: 8500 },
                //     { x: new Date(2019, 11), y: 5400 },
                // ]
            },
            ]
        });
        chart.render();
        //////////////////////////////////////////////////////
        // revenue distribution 
        var chart = new CanvasJS.Chart("chartContainer", {
        theme: "dark2",
        animationEnabled: true,
        title:{
            text: "Company Revenue by Year"
        },
        legend:{
                cursor: "pointer",
                itemclick: explodePie
        },
        axisY: {
            title: "Revenue in LKR",
            valueFormatString: "#0,,.",
            suffix: "mn",
            prefix: "LKR"
        },
        data: [{
            type: "spline",
            markerSize: 5,
            xValueFormatString: "YYYY",
            yValueFormatString: "$#,##0.##",
            xValueType: "dateTime",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
        });
        
        chart.render();
        /////////////////////////////////////////////////////////////////////
        // Monthly Expense via category
        var chart = new CanvasJS.Chart("monthExpenseCtaegory", {
            theme: "dark2",
            exportFileName: "Doughnut Chart",
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "Monthly Expense via Categories"
            },
            legend:{
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [{
                type: "doughnut",
                innerRadius: 90,
                showInLegend: true,
                toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
                indexLabel: "{name} - #percent%",
                dataPoints: [
                    { y: 450, name: "Food" },
                    { y: 120, name: "Insurance" },
                    { y: 300, name: "Employee" },
                    { y: 800, name: "Rent" },
                    { y: 150, name: "Tools" },
                    { y: 150, name: "Machinary"},
                    { y: 250, name: "Others" }
                ]
            }]
        });
        chart.render();
        function explodePie (e) {
            if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
            } else {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
            }
            e.chart.render();
        }
        // Item Distribution
        
            var chart = new CanvasJS.Chart("itemDistribution", {
                animationEnabled: true,
                theme: "dark2", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Inventory Distribution"
                },
                axisY: {
                    title: "Inventory Graph"
                },
                data: [{        
                    type: "column",  
                    showInLegend: true, 
                    legendMarkerColor: "grey",
                    legendText: "Item Count",
                    dataPoints: [      
                        { y: 300878, label: "Furniture " },
                        { y: 266455,  label: "Glue" },
                        { y: 169709,  label: "Blade" },
                        { y: 158400,  label: "Nuts and bolts 2mm" },
                        { y: 142503,  label: "Paint" },
                        { y: 101500, label: "Waterbase" },
                        { y: 97800,  label: "JAT" },
                        { y: 80000,  label: "Locks and Handles" }
                    ]
                }]
            });
            chart.render(); 
        }
    </script>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        function animateValue(id, start, end, duration) {
            var range = end - start;
            var current = start;
            var increment = end > start? 1 : -1;
            var stepTime = Math.abs(Math.floor(duration / range));
            var obj = document.getElementById(id);
            var timer = setInterval(function() {
                current += increment;
                obj.innerHTML = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        animateValue("value", 0, 4, 3000);
    </script>   
 
<?php
  require_once('./leftSidebar.php'); 
  require_once('./footer.php'); 
?>