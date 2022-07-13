<?php

// db initialization

$servername = "localhost";

$username = "yun_user";

$password = "yun_1234";

$dbname = "incu_sens";

$mysql_port = "3306";

date_default_timezone_set('Asia/Seoul');

// Check connection

$con = new mysqli($servername, $username, $password, $dbname,$mysql_port);

if ($con->connect_error) {

  die("Connection failed: " . $con->connect_error);

}

?>

<!DOCTYPE HTML>

<html>

<head>

 <meta charset="utf-8">

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">

var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('incu-read.php').fadeIn("slow");
}, 1000);


 google.charts.load('current', {packages:['corechart']});

 google.charts.setOnLoadCallback(drawChart);

 function drawChart() {

        var data = google.visualization.arrayToDataTable([

        ['Date', 'Temperature', 'Humidity', 'Weight'],

        <?php

        $query = "SELECT * From sens_table order by sensDate desc LIMIT 0, 200";

        $exec = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($exec)){

               echo "['" . $row['sensDate'] . "'," . $row['temperature']. "," . $row['humidity']. "," . $row['weight']. "],";

        }

        ?>

        ]);

        var options = {

               title: 'Sensor Data',

               curveType: 'function',

               legend: {position: 'bottom'},

               hAxis: {direction: -1}

               }

               vAxis: {

                       viewWindow: {

                              min: -10

                       }

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);

 }

 </script>

</head>

<body>

<center>

 <h1>관리자 모드</h1>

<div id="load_tweets">
 <div id="curve_chart" style="width: 1000px; height: 450px;"></div>
<?php
$query1 = "SELECT * FROM sens_table order by sensDate desc LIMIT 0, 1";

$result1 = mysqli_query ($con, $query1);

?>
</div>
<br><br>
<table align="center" border="0" cellpadding="3">
<tr><th>Send Date</th><th>Temperature(&deg;C)</th><th>Humidity(&#37;)</th><th>Weight</th></tr>
<div id="load_tweets">
<?php

while ($row = mysqli_fetch_array($result1)) {

?>

<tr align="center">

<td><?php echo $row['sensDate']; ?></td>

<td><?php echo $row['temperature']; ?></td>

<td><?php echo $row['humidity']; ?></td>

<td><?php echo $row['weight']; ?></td>

</tr>
<?php

};

?>
</div>
</table>
<br><br>
<button>UV LED ON</button>
<button>UV LED OFF</button>
</center>

</body>

</html>