<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>

<div class="header">
  <h1>Header</h1>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Search</a>
  <a href="#">Account</a>
</div>

</body>
</html>
    <?php
include_once ("connection.php");
$stmt = $conn -> prepare("SELECT * FROM books");
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))

{
    echo($row["title"]." ". $row["author"]." ". $row["genre"]." ". $row["description"]." ". $row["shelf"]." ". "<br>");   
    echo ('<img src="images/'.$row["cover"].'"><br>');
}
?>   