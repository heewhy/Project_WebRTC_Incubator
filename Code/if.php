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
</head>
<body class="p-3 mb-2 bg-dark text-white">
<?php
$query1 = "SELECT * FROM sens_baby order by name desc LIMIT 0, 1";

$result1 = mysqli_query ($con, $query1);

?>
</div>
<br><br>
<table align="center" border="0" cellpadding="3" class="table table-light">
<thead >
<tr align="center"><th>이름</th><th>성별</th><th>혈액형</th>
<th>생년월일</th><th>입원날짜</th></tr></thead>
<tbody>
<?php

$row = mysqli_fetch_array($result1)

?>
<tr align="center">

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['sex']; ?></td>

<td><?php echo $row['bloodtype']; ?></td>

<td><?php echo $row['birth']; ?></td>

<td><?php echo $row['date']; ?></td>

</tr>
</tbody>
</table>
</body>
</html>
