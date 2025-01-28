<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
    session_start();
    if (isset($_POST['studnetnumber'])) {
        $studentnumber = stripslashes($_REQUEST['studentnumber']);  
        $studentnumber = mysqli_real_escape_string($conn, $studentnumber);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query    = "SELECT * FROM `users` WHERE studnetnumber='$studentnumber'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($cnon, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['studentnumber'] = $studentnumber;
            header("Location: studentborrowed.php");
        } 
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="studentnumber" placeholder="Student Number" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
    // if student go to books borrowed page, if teacher go to list of books borrowed
?>
</body>
</html>