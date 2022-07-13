<?php

  $servername = "localhost";

  $username = "yun_user";

  $password = "yun_1234";

  $dbname = "incu_sens";
 
  $mysql_port = "3306";
  $mysql_charset = "utf8";


  date_default_timezone_set('Asia/Seoul');

  $now = new DateTime();

  parse_str( html_entity_decode( $_SERVER['QUERY_STRING']) , $out);

  if ( array_key_exists( 'temperature', $out ) ) {

    // Create connection

    $conn = new mysqli($servername, $username, $password, $dbname,$mysql_port);

    // Check connection

    if ($conn->connect_error) {

      die("Connection failed: " . $conn->connect_error);

    }

    $datenow = $now->format("Y-m-d H:i:s");

    $temperature  = $out['temperature'];

    $humidity = $out['humidity'];

    $weight = $out['weight'];

    $sql = "INSERT INTO sens_table (sensDate , temperature, humidity, weight) VALUES ('$datenow' , $temperature, $humidity, $weight)";

    if ($conn->query($sql) === TRUE) {

      echo "Sensed data saved.";

    } else {

      echo "Error: " . $sql . "<br>" . $conn->error;

    }

    $conn->close();

  }

?>