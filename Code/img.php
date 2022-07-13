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
 <title>아기영상</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<a href="m6.html" target="_blank">
<center>
<?php
$query1 = "SELECT * FROM sens_table order by sensDate desc LIMIT 0, 1";

$query2 = "SELECT * FROM sens_baby order by name desc LIMIT 0, 1";

$result1 = mysqli_query ($con, $query1);
$result2 = mysqli_query ($con, $query2);
?>
<div id="load_tweets" class="alert alert-secondary" role="alert">
<?php
while ($row = mysqli_fetch_array($result2)) {
?>
<h5 aling="center"><?php echo $row['name']; ?>
<?php
};
?>
<?php
while ($row = mysqli_fetch_array($result1)){
?>
(<?php echo $row['temperature']; ?>&deg;C
<?php echo $row['humidity']; ?>&#37;
<?php echo $row['weight']; ?>g)
</h5>
<?php

};

?>
</div>
</center>
</a>
</body>
</html>