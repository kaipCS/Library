<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>  
  
  <style>
.navbar {
  margin-bottom: 0;
  background-color:gray;
  border: 0;
  font-size: 11px !important;
  letter-spacing: 2px;
  opacity: 1;
}
.navbar li a, .navbar .navbar-brand {
  color:white!important;
}

.navbar-default .navbar-toggle {
  border-color: transparent;
}

.open .dropdown-toggle {
  color: #fff ;
  background-color:gray !important;
}

.dropdown-menu li a {
  color: gray !important;
}
.jumbotron {
  background-color: gray /* Orange */
  color:white;
  font-family: "Lucida console";
  padding: 120 25px;
}

.container-fluid {
  padding: 30px 20px;
}

.logo {
  font-size: 200px;
}
@media screen and (max-width: 768px) {
  .col-sm-4 {
    text-align: center;
    margin: 25px 0;
  }
}

.container-fluid {
  padding: 30px 20px;
}

</style>

<body>


<body>
    <form class="form" action="signin.php" method="post" name="login">
    <div class="jumbotron text-center">
    <h1>Sign in to your account</h1>
    <p> For testing purposes, use account number "123"and password "testteacher" or account number "456" and password "teststudent"</p>
    <div class="container">
    <label for="uname"><b>Account number</b></label>
    <input type="text" class="login-input" name="accountnumber" placeholder="Account Number">
    <label for="psw"><b>Password</b></label>
    <input  type="password" class="login-input" name="password" placeholder="Password">

    <button input type="submit" value="Login" name="submit" class="login-button">Login</button>
    </div>
    </form>
</body>