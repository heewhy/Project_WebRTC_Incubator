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

 <script type="text/javascript">

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

 <h1>My Sensor Data</h1>

 <div id="curve_chart" style="width: 1000px; height: 450px;"></div>

</center>

</body>

</html>