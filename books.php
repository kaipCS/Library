<?php
include_once ("connection.php");
$stmt = $conn -> prepare("SELECT * FROM books");
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))

{
    echo($row["isbn"]. " ". $row["title"]." ". $row["author"]." ". $row["genre"]." ". $row["description"]." ". $row["cover"]." ". $row["onloan"]." ". $row["shelf"]." ". $row["fictionornot"]. "<br>");   
    echo ('<img src="images/'.$row["cover"].'"><br>');
}
?>   