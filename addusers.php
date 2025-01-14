<?php
print_r($_POST);
header("Location: usersform.php");
array_map("htmlspecialchars", $_POST);

include_once("connection.php");
$stmt = $conn->prepare("INSERT INTO users (studentnumber,surname,firstname,password,house,year ,email)
VALUES (:studentnumber,:surname,:firstname,:password,:house,:year,:email)");

$stmt->bindParam(':studentnumber', $_POST["studentnumber"]);
$stmt->bindParam(':firstname', $_POST["firstname"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':year', $_POST["year"]);
$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->execute();
$conn=null;

?>