<?php 

session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}	
require_once('./contractHeader.php');
require_once('./../../controller/contract/contractController.php');
$con = new Contract();
$result = $con->getAllActiveContracts();
?>
  <div class="container">
      <!-- Heading  -->
      <h2>Contract Home</h2>
     
      <input type="text" placeholder="Find a Repostory">
      <a class="btn btn-primary" href="./contractAdd.php">Add New Contract</a>
      <br>
      <br>
      <!-- Start the card View  -->
    <div class="row">
        <!-- 1st card -->
        <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">5</h1>
            <p class="card-text">Contracts</p>
          </div>
        </div>
        </div>
        <!-- end card 1 -->
        <!-- 2nd card -->
        <div class="col-sm">
        <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">45</h1>
            <p class="card-text">Activities</p>
          </div>
        </div>
        </div>
        <!-- end card 2 -->
        <!--3rd card  -->
        <div class="col-sm">
        <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">29</h1>
            <p class="card-text">Quotations</p>
          </div>
        </div>
        </div>
        <!-- end card 3 -->
        <!-- 4th card  -->
        <div class="col-sm">
        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 id="value" class="card-title">0</h1>
            <p class="card-text">Invoices</p>
          </div>
        </div>
        </div>
        <!-- end 4 -->
      </div>
      <!-- end of row -->

      <!--Contrat Summary Details  -->
      <h3>Ongoing Contracts</h3>
      <p>Contracts that are Active</p>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {

      ?>
      <!-- Contract Item -->
      <div class="container card text-white bg-primary" onclick="location.href='./contractSinglePage.php?con_id=<?php echo $row["con_id"]; ?>';" style="cursor: pointer;">
        <br>
        <h4><?php echo $row["con_name"]; ?></h4>
        <h6><?php echo $row["con_desc"]; ?></h6>
        <h6>Start Date :<?php echo $row["startdate"]; ?>Upto End date : <?php echo $row["enddate"]; ?></h6>
        <h6><?php echo $row["location"]; ?></h6>
        <p style="text-align:right;"><?php echo $row["status"]; ?></p>
        <br>
      </div>
      <!-- Contract Item Ends -->
      <?php
      $i++;
      }
      if($i==0){
          echo "No results ";
      }
      ?>
      <h3>Statistics</h3>
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
        array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
        array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
        array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
        array("label"=>"Iron", "symbol" => "Fe","y"=>5),
        array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
        array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
        array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
        array("label"=>"Others", "symbol" => "Others","y"=>1.5),
      
      )
      ?>
      <script>
      window.onload = function () {
      
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
          text: "Company Revenue by Year"
        },
        axisY: {
          title: "Revenue in USD",
          valueFormatString: "#0,,.",
          suffix: "mn",
          prefix: "$"
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
      // pie chart
      var chartpie = new CanvasJS.Chart("chartContainerpie", {
        theme: "light2",
        animationEnabled: true,
        title: {
          text: "Contract Visibility"
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
      }
      </script>
      <div class="container">
      <div id="chartContainer" style="height:200px; width: 80%;"></div>
      <div id="chartContainerpie" style="height:200px; width: 80%;"></div>
      </div>
    </div>
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
</body>
</html>