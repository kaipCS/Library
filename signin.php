<?php
    session_start();
    include_once("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentnumber']) && isset($_POST['password'])) {
            $conn = new PDO("mysql:host=localhost;dbname=Library", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $studentnumber = trim($_POST['studentnumber']);
            $password = trim($_POST['password']);
            $stmt = $conn->prepare("SELECT * FROM users WHERE studentnumber = :studentnumber");
            $stmt->bindParam(':studentnumber', $studentnumber, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['studentnumber'] = $studentnumber;
                if ($user['role'] == 'student') {
                    //header("Location: studentborrowed.php");
                } else {
                    //header("Location: teacherborrowed.php");
                }
                exit();
            } else {
                echo "<p style='color:red;'>Invalid login credentials.</p>";
            }
    } 
?>