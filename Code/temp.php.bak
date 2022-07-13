
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<title>온습도</title>
<script type="text/javascript" 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">

var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('temp.php').fadeIn("slow");
}, 5000);
</script>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<div id="load_tweets">
<?php
$query1 = "SELECT * FROM sens_table order by sensDate desc LIMIT 0, 1";

$result1 = mysqli_query ($con, $query1);

?>
<br><br>
<table align="center" border="0" cellpadding="3" class="table table-light">
<thead>
<tr align="center">
<th>입력시간</th>
<th>온도(&deg;C)</th>
<th>습도(&#37;)</th>
<th>체중(g)</th>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_array($result1)){

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
</tbody>
</table>
</div>
</body>