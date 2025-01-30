<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="studentnumber" placeholder="Student Number" required autofocus />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button"/>
    </form>
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
    // the error message means not yet send not not correct
?>
</body>
</html>