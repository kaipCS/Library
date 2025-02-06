<?php

header('Location:studentaccount.php');
include_once('connection.php');
array_map("htmlspecialchars", $_POST);


$updateStmt = $conn->prepare("UPDATE books SET onloan = 0 WHERE isbn = :isbn");
$updateStmt->bindParam(':isbn', $_POST["isbn"]);
$updateStmt->execute();

$updateStmt2 = $conn->prepare("UPDATE loans SET returned = 1 WHERE isbn = :isbn");
$updateStmt2->bindParam(':isbn', $_POST["isbn"]);
$updateStmt2->execute();


$conn=null;

?>