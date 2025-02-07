<!DOCTYPE html>
<head>
    <title>Add book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .navbar {
            margin-bottom: 0;
            background-color: gray;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 2px;
            opacity: 1;
            padding: 5px 10px; 
            min-height: 40px; 
        }

        .navbar-nav > li > a,
        .navbar .navbar-brand {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            font-size: 12px;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            padding: 5px;
        }

        .navbar-form {
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .navbar-form input[type="text"] {
            height: 25px;
            font-size: 12px;
            padding: 2px 5px;
        }

        .navbar-form button {
            height: 25px;
            font-size: 12px;
            padding: 2px 8px;
            margin-left: 5px;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: white !important;
        }

        .jumbotron {
            background-color: gray;
            color: white;
            font-family: "Lucida Console", monospace;
            padding: 50px 25px;
        }

        .container-fluid {
            padding: 20px 15px;
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 15px 0;
            }
        }
        .container {
    margin-top: 90px; 
}


    </style>


<?php
  include_once("connection.php");
  $accountnumber = $_GET['accountnumber'];
  $role = 1; 
  ?>

</head>
<body>

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
                </form>
            </div>
        </div>
    </nav>

<div class="container">
        <h2>Add a User</h2>
<form action="addusers.php" method = "POST" >
  Account number:<input type="text" name="accountnumber"><br>
  Last name:<input type="text" name="surname"><br>
  First name:<input type="text" name="firstname"><br>
  Password:<input type="password" name="password"><br>
  Email:<input type="text" name="email"><br>
  <input type="hidden" name="accountnumber" value="<?php echo $accountnumber; ?>">
  Role:<select name="role">
		<option value="T">Teacher</option>
		<option value="S">Student</option>
	</select><br>
<input type="submit" value="Add User">
</div>
</body>
</html>

