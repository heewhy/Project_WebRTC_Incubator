﻿<?php

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
<?php
$query1 = "SELECT * FROM sens_table order by sensDate desc LIMIT 0, 1";

$result1 = mysqli_query ($con, $query1);

while ($row = mysqli_fetch_array($result1)){

?>


 <meta charset="utf-8">
<script language="javascript">
if(<?php echo $row['weight']; ?>>500){
	alert('경고 1번 인큐베이터에 문제가 발생하였습니다.')}
</script>
<?php 
};
?>
</head>
</body>


<frameset rows="*,*" BORDERCOLOR="GRAY">
	<frameset cols="*,*,*"  BORDERCOLOR="GRAY">
		<frame src="video.html" frameborder="1">
		<frame src="video3.html" frameborder="1">
		<frame src="video.html" frameborder="1">
	</frameset>
	<frameset cols="*,*,*"  BORDERCOLOR="GRAY">
		<frame src="video3.html" frameborder="1">
		<frame src="video.html" frameborder="1">
		<frame src="video3.html" frameborder="1">
	</frameset>
</frameset>