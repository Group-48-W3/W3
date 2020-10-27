<?php require_once('./contractHeader.php');?>
    <div class="container">
    <h3>Contract Overview</h3>
    <div class="container">
    <div id="contractBurndown" style="height: 370px; width: 80%;"></div>
    <div id="chartContainerpie" style="height:320px; width: 40%;"></div>
    </div>
    <br>
    <h3>Expense Overview</h3>
    <!-- Body starts -->
    <div class="container">
      <div id="chartContainer" style="height:200px; width: 80%; background-color:#363332; "></div>
      
    </div>
    <!-- Body ends -->
    <br>
    <h3>Inventory Overview</h3>
    </div>
    <br>

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
      
      $dataPoints_pie = array( 
        array("label"=>"Araliya", "symbol" => "A","y"=>46.6),
        array("label"=>"KCC", "symbol" => "KCC","y"=>27.7),
        array("label"=>"Bentota", "symbol" => "B","y"=>13.9),
        array("label"=>"Euler", "symbol" => "E","y"=>5),
        // array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
        // array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
        // array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
        // array("label"=>"Others", "symbol" => "Others","y"=>1.5),
      
      )
      ?>
      <script>
      window.onload = function () {
        // revenue distribution   
      var chart = new CanvasJS.Chart("chartContainer", {
        theme: "dark2",
        animationEnabled: true,
        title:{
          text: "Company Revenue by Year"
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
      // contract distribution
      var chartpie = new CanvasJS.Chart("chartContainerpie", {
        theme: "dark2",
        animationEnabled: true,
        title: {
          text: "Contract Analysis"
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
                text: "Contract Burndown"
            },
            axisY :{
                includeZero: false,
                prefix: "Unit"
            },
            toolTip: {
                shared: true
            },
            legend: {
                fontSize: 13
            },
            data: [{
                type: "splineArea",
                showInLegend: true,
                name: "Araliya",
                yValueFormatString: "$#,##0",
                xValueFormatString: "MMM YYYY",
                dataPoints: [
                    { x: new Date(2019, 2), y: 61000 },
                    { x: new Date(2019, 3), y: 35000 },
                    { x: new Date(2019, 4), y: 30000 },
                    { x: new Date(2019, 5), y: 28400 },
                    { x: new Date(2019, 6), y: 25900 },
                    { x: new Date(2019, 7), y: 23000 },
                    { x: new Date(2019, 8), y: 20200 },
                    { x: new Date(2019, 9), y: 18000 },
                    { x: new Date(2019, 10), y: 16500 },
                    { x: new Date(2019, 11), y: 14800 },
                    { x: new Date(2020, 0),  y: 11900 },
                    { x: new Date(2020, 1),  y: 9000 }
                ]
            },
            {
                type: "splineArea", 
                showInLegend: true,
                name: "Bentota Beach",
                yValueFormatString: "$#,##0",
                dataPoints: [
                    { x: new Date(2019, 2), y: 72100 },
                    { x: new Date(2019, 3), y: 66000 },
                    { x: new Date(2019, 4), y: 60000 },
                    { x: new Date(2019, 5), y: 55000 },
                    { x: new Date(2019, 6), y: 49000 },
                    // { x: new Date(2019, 7), y: 21000 },
                    // { x: new Date(2019, 8), y: 22000 },
                    // { x: new Date(2019, 9), y: 25000 },
                    // { x: new Date(2019, 10), y: 23000 },
                    // { x: new Date(2019, 11), y: 25000 },
                    // { x: new Date(2017, 0), y: 26000 },
                    // { x: new Date(2017, 1), y: 25000 }
                ]
            },
            {
                type: "splineArea", 
                showInLegend: true,
                name: "KCC Kandy",
                yValueFormatString: "$#,##0",     
                dataPoints: [
                    { x: new Date(2019, 2), y: 60100 },
                    { x: new Date(2019, 3), y: 45000 },
                    { x: new Date(2019, 4), y: 40400 },
                    { x: new Date(2019, 5), y: 33000 },
                    { x: new Date(2019, 6), y: 27000 },
                    // { x: new Date(2019, 7), y: 3900 },
                    // { x: new Date(2019, 8), y: 4200 },
                    // { x: new Date(2019, 9), y: 5000 },
                    // { x: new Date(2019, 10), y: 14300 },
                    // { x: new Date(2019, 11), y: 12300 },
                    // { x: new Date(2017, 0), y: 8300 },
                    // { x: new Date(2017, 1), y: 6300 }
                ]
            },
            {
                type: "splineArea", 
                showInLegend: true,
                yValueFormatString: "$#,##0",      
                name: "Euler",
                dataPoints: [
                    { x: new Date(2019, 2), y: 27000 },
                    { x: new Date(2019, 3), y: 24500 },
                    { x: new Date(2019, 4), y: 22000 },
                    { x: new Date(2019, 5), y: 19800 },
                    { x: new Date(2019, 6), y: 16000 },
                    { x: new Date(2019, 7), y: 14000 },
                    { x: new Date(2019, 8), y: 11500 },
                    { x: new Date(2019, 9), y: 10000 },
                    { x: new Date(2019, 10), y: 8500 },
                    { x: new Date(2019, 11), y: 5400 },
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