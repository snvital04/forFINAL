<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sobremesadb";
try {
  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connected to database"; // check for connection
} catch (PDOException $e) {
  echo "", $e->getMessage();
}
