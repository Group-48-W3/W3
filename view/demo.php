<?php 
    echo "demo page "."</br>";
    /* User's password. */
$password = '12345';

/* MD5 hash to be saved in the database. */
$hash = md5($password);
$hash_sha = sha1($password);
echo "this is md5 ".$hash."</br>";
echo "this is sha1 ".$hash_sha."</br>";
$hash2 = password_hash($password, PASSWORD_DEFAULT);
echo $hash2."</br>";
/* Set the "cost" parameter to 12. */
$options = ['cost' => 12];

/* Create the hash. */
$hash3 = password_hash($password, PASSWORD_DEFAULT);
echo $hash3."</br>";




?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var dataPoints = [];

var options = {
	theme: "dark2",
	title: {
		text: "Live Chart from JSON Data"
	},
	data: [{
		type: "spline",
		dataPoints: dataPoints
	}]
};

$("#chartContainer").CanvasJSChart(options);
updateData();

// Initial Values
var xValue = 1;
var yValue = 1;
var newDataCount = 6;

function addData(data) {
	if (newDataCount != 10) {
		$.each(data, function (key, value) {
			dataPoints.push({ x: value[0], y: parseInt(value[1]) });
			xValue++;
			yValue = parseInt(value[1]);
		});
		newDataCount++;
	} else {
		dataPoints.shift();
		dataPoints.push({ x: data[0][0], y: parseInt(data[0][1]) });
		xValue++;
		yValue = parseInt(data[0][1]);
	}
	$("#chartContainer").CanvasJSChart().render();
	setTimeout(updateData, 1500);
}

function updateData() {
	$.getJSON("https://canvasjs.com/services/data/datapoints.php?xstart=" + xValue + "&ystart=" + yValue + "&length=" + newDataCount + "type=json", addData);
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>