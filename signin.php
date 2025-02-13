<?php
    session_start();
    include_once("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accountnumber']) && isset($_POST['password'])) {
            
            $accountnumber = trim($_POST['accountnumber']);
            $password = trim($_POST['password']);
            //print_r($_POST);
            $stmt = $conn->prepare("SELECT * FROM users WHERE accountnumber = :accountnumber");
            $stmt->bindParam(':accountnumber', $accountnumber, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($user);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['accountnumber'] = $user['accountnumber'];
               if ($user['role'] == '0') {
                    session_start();
                    $_SESSION['accountnumber'] = $accountnumber;
                    $_SESSION['role'] = 0;
                    header("Location: studentaccount.php");
                    exit();
                } else {
                    session_start();
                    $_SESSION['accountnumber'] = $accountnumber;
                    $_SESSION['role'] = 1;
                    header("Location: teacheraccount.php");
                    exit();
                }
               exit();
            } else {
                //echo "<p style='color:red;'>Invalid login credentials.</p>";
                header('Location:index.php');
            }
    } 
?>