<?php

$sname = 'localhost';
$unmae = 'root';
$password = '';
$db_name = 'web.sn4jp3r.xyz';

// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

// if (!$conn) {
// 	echo "Błąd Łączenia z Bazą Danych!";
// }

try {
  $conn = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Błąd Łączenia z Bazą Danych! : ". $e->getMessage();
}