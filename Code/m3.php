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

<title>무게그래프</title>
<script type="text/javascript">

var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('m3.php').fadeIn("slow");
}, 1000);

google.charts.load('current', {packages:['corechart']});

 google.charts.setOnLoadCallback(drawChart);

 function drawChart() {

        var data = google.visualization.arrayToDataTable([

        ['Date', 'Weight'],

        <?php

        $query = "SELECT * From sens_table order by sensDate desc LIMIT 0, 200";

        $exec = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($exec)){

               echo "['" . $row['sensDate'] . "'," . $row['weight']. "],";

        }

        ?>

        ]);

        var options = {

               title: '체중그래프',

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
<div id="load_tweets">
 <div id="curve_chart" style="width: 800px; height: 400px;"></div>
</body>
</html>