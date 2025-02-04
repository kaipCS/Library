<?php
include_once ("connection.php");
$stmt = $conn -> prepare("SELECT * FROM users");
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))
{                                                     
#print_r($row);                                                       
echo($row["accountnumber"]. " ". $row["firstname"]." ". $row["surname"]." ". $row["year"]." ". $row["house"]." ". $row["password"]." ". $row["email"]. "<br>");                                                                                                              
}                           
?>   