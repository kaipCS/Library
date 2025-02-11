<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>

<div class="header">
  <h1>Library</h1>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Search</a>
  <a href="#">Account</a>
</div>

</body>
</html>
    <?php
include_once ("connection.php");
$stmt = $conn -> prepare("SELECT * FROM books");
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC))

{
    echo($row["isbn"]." ".$row["title"]." ". $row["author"]." ". $row["genre"]." ". $row["description"]." ". $row["shelf"]." ". "<br>");   
    echo ('<img src="images/'.$row["cover"].'"><br>');
}
?>   
<?php if ($role === '0') { ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Library</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="frontpage.php">Library Home</a></li>
                    <li><a href="returnbook.php?accountnumber=<?php echo $accountnumber; ?>&role=<?php echo $role; ?>">Return</a></li>
                    <li><a href="signinform.php">Sign Out</a></li>
                </ul>

                <form class="navbar-form navbar-right" action="search.php" method="get">
                    <input type="text" name="isbnsearch" placeholder="Search by ISBN..." class="form-control">
                    <input type="hidden" name="accountnumber" value="<?php echo $accountnumber; ?>">
                    <input type="hidden" name="role" value="<?php echo $role; ?>">
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                </form>
            </div>
        </div>
    </nav>
<?php } ?>


<?php if ($role == '1') { ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Library</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="frontpage.php">Library Home</a></li>
                    <li><a href="returnbook.php?accountnumber=<?php echo $accountnumber; ?>&role=<?php echo $role; ?>">Return</a></li>
                    <li><a href="signinform.php">Sign Out</a></li>
                    <li><a href="booksform.php?accountnumber=<?php echo $accountnumber; ?>">Add book</a></li>
                    <li><a href="usersform.php?accountnumber=<?php echo $accountnumber; ?>">Add user</a></li>
                </ul>

                <form class="navbar-form navbar-right" action="search.php" method="get">
                    <input type="text" name="isbnsearch" placeholder="Search by ISBN..." class="form-control">
                    <input type="hidden" name="accountnumber" value="<?php echo $accountnumber; ?>">
                    <input type="hidden" name="role" value="<?php echo $role; ?>">
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php } ?>