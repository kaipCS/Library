<?php
header('Location:booksform.php');
include_once('connection.php');
array_map("htmlspecialchars", $_POST);


$stmt = $conn->prepare("INSERT INTO books (isbn,title,author,genre,description, cover, onloan,shelf,fictionornot)
VALUES (:isbn,:title,:author,:genre,:description, :cover, :onloan, :shelf,:fictionornot)");
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':description', $_POST["description"]);
$stmt->bindParam(':shelf', $_POST["shelf"]);
$stmt->bindParam(':cover', $_POST["cover"]);
$stmt->bindParam(':onloan', $_POST["onloan"]);
$stmt->bindParam(':fictionornot', $_POST["fictionornot"]);
$stmt->execute();
$conn=null;
?>