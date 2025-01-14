<!DOCTYPE html>
<html>
<head>
    
    <title>Users</title>
    
</head>
<body>
<form action="addusers.php" method = "POST" >
  Student number:<input type="text" name="studentnumber"><br>
  Last name:<input type="text" name="surname"><br>
  First name:<input type="text" name="firstname"><br>
  Password:<input type="password" name="password"><br>
  House:<input type="text" name="house"><br>
  Year:<input type="number" name="year"><br>
  Email:<input type="text" name="email"><br>
</form>

<h2>Current users</h2>
<?php
include_once ("connection.php");
$stmt = $conn -> prepare("SELECT * FROM tblusers");
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))
{                                                     
#print_r($row);                                                       
echo($row["forename"]. " ". $row["surname"]. "<br>");                                                                                                          
}                           
?>                                                                                                                                                                                              
</body>
</html>