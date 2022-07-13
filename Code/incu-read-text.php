<!DOCTYPE html><html>

<head>

<title>Sensed Data</title>

</head><body>

<center>

<H1>My Sensor Data</H1>

</center>

<?php

echo "<center>";

echo "[" . $current_user->display_name . "(으)로 로그인]<br />";

echo "</center>";

$con = mysqli_connect('localhost','yun_user','yun_1234','incu_sens','3306');

// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

//Selecting the data from table but with limit

$query = "SELECT * FROM sens_table order by sensDate desc LIMIT 0, 20";

$result = mysqli_query ($con, $query);

?>

<table align="center" border="0" cellpadding="3">

<tr><th>Send Date</th><th>Temperature(&deg;C)</th><th>Humidity(&#37;)</th><th>Weight</th></tr>

<?php

while ($row = mysqli_fetch_array($result)) {

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

</table>

</body>

</html>