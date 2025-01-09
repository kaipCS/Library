<?php 
    // note this does not use connection.php as connection made at the time of creation
   $servername = 'localhost';
   $username = 'root';
   $password= '';
//note no Database mentioned here!!

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS library;

$conn->exec($sql);
    $sql = "USE Toilets";
    $conn->exec($sql);
    echo "DB created successfully";
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS books;
    CREATE TABLE books 
    (isbn INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(20) NOT NULL,
    author VARCHAR(20) NOT NULL,
    genre VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL,
    cover VARCHAR(20) NOT NULL,
    onloan VARCHAR(20) NOT NULL,
    shelf VARCHAR(20) NOT NULL,
    fictionornot VARCHAR(20) NOT NULL)");
    $stmt1->execute();
    $stmt1->closeCursor(); 



}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>