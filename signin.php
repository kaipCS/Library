<?php
    session_start();
    include_once("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentnumber']) && isset($_POST['password'])) {
            
            $studentnumber = trim($_POST['studentnumber']);
            $password = trim($_POST['password']);
            print_r($_POST);
            $stmt = $conn->prepare("SELECT * FROM users WHERE studentnumber = :studentnumber");
            $stmt->bindParam(':studentnumber', $studentnumber, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($user);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['studentnumber'] = $user['studentnumber'];
                header ("Location: studentborrowed.php");
               // if ($user['role'] == 'student') {
                    //header("Location: studentborrowed.php");
                //} else {
                    //header("Location: books.php");
               // }
               exit();
            } else {
                echo "<p style='color:red;'>Invalid login credentials.</p>";
            }
    } 
?>