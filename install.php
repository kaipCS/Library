<?php 
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS library");
    $conn->exec("USE library");

    $conn->exec("
        DROP TABLE IF EXISTS books;
        CREATE TABLE books (
            isbn VARCHAR(20) NOT NULL PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            author VARCHAR(30) NOT NULL,
            genre VARCHAR(30) NOT NULL,
            description TEXT NOT NULL,
            cover VARCHAR(50) NOT NULL,
            onloan TINYINT(1) NOT NULL,
            shelf INT(2) NOT NULL,
            fictionornot TINYINT(1) NOT NULL
        );

        DROP TABLE IF EXISTS users;
        CREATE TABLE users (
            accountnumber VARCHAR(20) PRIMARY KEY,
            firstname VARCHAR(20) NOT NULL,
            surname VARCHAR(20) NOT NULL,
            password VARCHAR(200) NOT NULL,
            email VARCHAR(50) NOT NULL,
            role TINYINT(1) NOT NULL
        );

        DROP TABLE IF EXISTS loans;
        CREATE TABLE loans (
            isbn VARCHAR(20) NOT NULL,
            returned TINYINT(1) NOT NULL,
            accountnumber VARCHAR(20),
            date VARCHAR(20),
            timeperiod INT(2),
            duedate VARCHAR(20),
            PRIMARY KEY(isbn, accountnumber, date)
        );
    ");

    $stmt = $conn->prepare("
        INSERT INTO users (accountnumber, firstname, surname, password, email, role) 
        VALUES (:accountnumber, :firstname, :surname, :password, :email, :role)
    ");

    $accountnumber = "123"; 
    $firstname = "Test";
    $surname = "Teacher";
    $hashedPassword = password_hash("testteacher", PASSWORD_DEFAULT);
    $email = "testteacher@school.com";
    $role = 1;

    $stmt->bindParam(':accountnumber', $accountnumber, PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_INT);
    $stmt->execute();


    $accountnumber = "456";
    $firstname = "Testing";
    $surname = "Student";
    $hashedPassword = password_hash("teststudent", PASSWORD_DEFAULT);
    $email = "teststudent@school.com"; 
    $role = 0;

    $stmt->execute();

    echo "Database and tables created successfully. Test users inserted.<br>";

  
    $stmt1 = $conn->prepare("
        INSERT INTO books (isbn, title, author, genre, description, cover, onloan, shelf, fictionornot) 
        VALUES (:isbn, :title, :author, :genre, :description, :cover, :onloan, :shelf, :fictionornot)
    ");

    $isbn = "0140186425"; 
    $title = "Of Mice and Men";
    $author = "John Steinbeck";
    $genre = "Tragedy";
    $description = "Over seventy-five years since its first publication, Steinbeck's tale of commitment, loneliness...";
    $cover = "OMAM.jpg";
    $onloan = 0;
    $shelf = 10;
    $fictionornot = 1;

    $stmt1->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $stmt1->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt1->bindParam(':author', $author, PDO::PARAM_STR);
    $stmt1->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt1->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt1->bindParam(':cover', $cover, PDO::PARAM_STR);
    $stmt1->bindParam(':onloan', $onloan, PDO::PARAM_INT);
    $stmt1->bindParam(':shelf', $shelf, PDO::PARAM_INT);
    $stmt1->bindParam(':fictionornot', $fictionornot, PDO::PARAM_INT);
    $stmt1->execute();

    $isbn = "052129455X"; 
    $title = "Macbeth";
    $author = "William Shakespeare";
    $genre = "Play";
    $description = "One of Shakespeare's greatest, but also bloodiest tragedies, was written around 1605/06...";
    $cover = "macbeth.jpg";
    $onloan = 0;
    $shelf = 11;
    $fictionornot = 1;

    $stmt1->execute();

    echo "Test books inserted successfully.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
