<?php
print_r($_POST);
$updateStmt = $conn->prepare("UPDATE books SET onloan = 0 WHERE isbn = :isbn");
$updateStmt->bindParam(':isbn', $_POST["book"]);
$updateStmt->execute();

//update loans table
?>