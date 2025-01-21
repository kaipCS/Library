<?php 
    // note this does not use connection.php as connection made at the time of creation
   $servername = 'localhost';
   $username = 'root';
   $password= '';
//note no Database mentioned here!!

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS library";

$conn->exec($sql);
    $sql = "USE library";
    $conn->exec($sql);
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS books;
    CREATE TABLE books 
    (isbn VARCHAR(20) NOT NULL PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    author VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    cover VARCHAR(30) NOT NULL,
    onloan TINYINT(1) NOT NULL,
    shelf INT(2) NOT NULL,
    fictionornot TINYINT(1)NOT NULL)");
    $stmt1->execute();
    $stmt1->closeCursor(); 
    $stmt = $conn->prepare("DROP TABLE IF EXISTS users;
    CREATE TABLE users
    (studentnumber VARCHAR(20) PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    year INT(2) NOT NULL,
    house VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
    email VARCHAR(30) NOT NULL)
    ");
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = $conn->prepare("DROP TABLE IF EXISTS loans;
    CREATE TABLE loans
    (isbn VARCHAR(20) NOT NULL,
    onloan TINYINT(1) NOT NULL,
    studentnumber VARCHAR(20),
    date  VARCHAR(20),
    timeperiod INT(2),
    PRIMARY KEY(isbn,studentnumber))
    ");
    $stmt->execute();
    $stmt->closeCursor();
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>