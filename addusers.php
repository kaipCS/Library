<?php
session_start();
print_r($_SESSION);
print_r($_POST);

header('Location: teacheraccount.php');

switch($_POST["role"]){
    case "S":
        $role=0;
        break;
    case "T":
        $role=1;
        break;
}


try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    
    $stmt = $conn->prepare("INSERT INTO users (accountnumber,surname,firstname,password,email,role)
    VALUES (:accountnumber,:surname,:firstname,:password,:email,:role)");
    $stmt->bindParam(':accountnumber', $_POST["accountnumber"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':firstname', $_POST["firstname"]);
    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
}


catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null; 
?>