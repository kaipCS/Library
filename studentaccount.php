<head>
    <title>Student account</title>
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
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="frontpage.php">Library home</a></li>
          <li><a href="searchform.php">Search</a></li>
          <li><a href="returnbook.php">Return</a></li>
          <li><a href="signinform.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </nav>

        <?php
    include_once ("connection.php");
    $stmt = $conn -> prepare("SELECT * FROM books");
    $stmt -> execute();
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))

    {
        echo($row["isbn"]. " ". $row["title"]." ". $row["author"]." ". $row["genre"]." ". $row["description"]." ". $row["cover"]." ". $row["onloan"]." ". $row["shelf"]." ". $row["fictionornot"]. "<br>");   
        echo ('<img src="images/'.$row["cover"].'"><br>');
    }
    ?>   
    </div>
    </form>
    </body>