<?php
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $FirstName = trim($_POST["fname"]);
  $LastName = trim($_POST["lname"]);
  $BirthDay = trim($_POST["bday"]);
  $Email = trim($_POST["email"]);
  $PassWord = trim($_POST["pword"]);
}
$exec = false;
$sql = "SELECT count(*)FROM tbuser WHERE email = :email ;";
$result = $conn->prepare($sql);
$result->execute([
  ":email" => $Email,
]);
$count = $result->fetchColumn();
if ($count > 0) {
  $error_message = "Error: Email already exist. Please choose another one.";
} else {
  $PassWord = password_hash($PassWord, PASSWORD_DEFAULT);

  $sqlInsert = "INSERT INTO tbuser (firstname,lastname,birthday,email,password) VALUES (:fname,:lname,:bday,:email,:pword)";
  $sqlResult = $conn->prepare($sqlInsert);
  $exec = $sqlResult->execute([
    ":fname" => $FirstName,
    ":lname" => $LastName,
    ":bday" => $BirthDay,
    ":email" => $Email,
    ":pword" => $PassWord,
  ]);
}
if ($exec) {
  echo ("inserted");
  header("Location: ../index.php");
  exit();
} else {
  $error_message = "Data could not be inserted.";
}
