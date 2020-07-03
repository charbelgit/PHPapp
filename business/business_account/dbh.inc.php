<?php

$servername ="localhost";
$dBUsername="root";
$dBPassword=""; // insert password ... normally empty for localhost
$dBName=" "; // insert databse name

$conn= mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
if (!$conn) {
  die("Connection failed:".mysqli_connect_error());
  }
