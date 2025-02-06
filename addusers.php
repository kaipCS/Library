<?php
session_start();
print_r($_SESSION);
header('Location: usersform.php');
print_r($_POST);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	
    
    $stmt = $conn->prepare("INSERT INTO users (accountnumber,surname,firstname,password,email)
    VALUES (:accountnumber,:surname,:firstname,:password,:email)");
    $stmt->bindParam(':accountnumber', $_POST["accountnumber"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':firstname', $_POST["firstname"]);
    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null; 
?>