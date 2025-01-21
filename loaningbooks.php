<form action="usersform.php" method = "POST">
<select name = "student">
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM users ORDER BY surname ASC");
$stmt->execute();
while ($row = $stmt ->fetch(PDO::FETCH_ASSOC))
    {
        #print_r($row);
        echo("<option value =".$row["studentnumber"].">".$row["surname"].", ".$row["firstname"]."</option>"); 
    }
?>  

</select>
<select name = "book">
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM books ORDER BY title ASC");
$stmt->execute();
while ($row = $stmt ->fetch(PDO::FETCH_ASSOC))
    {
        #print_r($row);
        echo("<option value =" .$row["title"].">".$row["title"].", ".$row["author"]."</option>"); 
    }
?>  

</select>
<input type="submit" value="Loan Book">
</form>
