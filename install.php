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
            cover VARCHAR(30) NOT NULL,
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

    echo "Database and tables created successfully. Test users inserted.";

    // add test books 
} 
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>