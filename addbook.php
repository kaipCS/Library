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
$stmt->bindParam(':cover', $_FILES["cover"][$_POST["isbn"]]);
$stmt->bindParam(':onloan', $_POST["onloan"]);
$stmt->bindParam(':fictionornot', $_POST["fictionornot"]);
$stmt->execute();

$target_dir = "images/";
print_r($_FILES);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . ($_FILES["cover"][$_POST["isbn"]]). $imageFileType;
echo $target_file;
$uploadOk = 1;
if (move_uploaded_file($_FILES["cover"][$_POST["isbn"]], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["cover"][$_POST["isbn"]])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

$conn=null;
?>