<?php
include_once('connection.php');
session_start();
$_SESSION['accountnumber'] = $_POST["accountnumber"];
$_SESSION['role'] = $_POST["role"];
$role = $_POST["role"];
if ($role === '0') {
    header('Location: studentaccount.php');
} elseif ($role === '1') {
    header('Location: teacheraccount.php');
}
array_map("htmlspecialchars", $_POST);

$updateStmt = $conn->prepare("UPDATE books SET onloan = 0 WHERE isbn = :isbn");
$updateStmt->bindParam(':isbn', $_POST["isbn"]);
$updateStmt->execute();

$updateStmt2 = $conn->prepare("UPDATE loans SET returned = 1 WHERE isbn = :isbn");
$updateStmt2->bindParam(':isbn', $_POST["isbn"]);
$updateStmt2->execute();


$conn=null;

?>