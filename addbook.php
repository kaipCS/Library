<?php
header('Location:teacheraccount.php');
include_once('connection.php');
array_map("htmlspecialchars", $_POST);


$stmt = $conn->prepare("INSERT INTO books (isbn,title,author,genre,description, cover, onloan,shelf,fictionornot)
VALUES (:isbn,:title,:author,:genre,:description, :cover, 0, :shelf,:fictionornot)");
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':description', $_POST["description"]);
$stmt->bindParam(':shelf', $_POST["shelf"]);
$stmt->bindParam(':cover', $_FILES["cover"]["name"]);
$stmt->bindParam(':fictionornot', $_POST["fictionornot"]);
$stmt->execute();

$target_dir = "images/";
print_r($_FILES);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . ($_FILES["cover"]["name"]). $imageFileType;
echo $target_file;
$uploadOk = 1;
if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["cover"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

$conn=null;
?>