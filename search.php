<?php
session_start();
include_once("connection.php");

if (isset($_POST['accountnumber']) && !empty($_POST['accountnumber'])) {
    $_SESSION['accountnumber'] = $_POST['accountnumber'];
}
$accountnumber = isset($_SESSION['accountnumber']) ? $_SESSION['accountnumber'] : '';

if (isset($_POST['role']) && !empty($_POST['role'])) {
    $_SESSION['role'] = $_POST['role'];
}
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

?>

<!DOCTYPE html>
<head>
    <title>Search result </title>
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
    $role = $_GET['role'];
    $accountnumber = $_GET['accountnumber'];
?>

</head>
<body>

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

<div class="container">
    <h2>Search result:</h2>
    <?php
    if (isset($_GET["isbnsearch"])) {
        $stmt = $conn->prepare("SELECT * FROM books WHERE isbn = :isbnsearch");
        $stmt->bindParam(':isbnsearch', $_GET["isbnsearch"]);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>{$row['title']} by {$row['author']} at shelf number {$row['shelf']}</p>";
            echo "<img src='images/{$row['cover']}' alt='Book Cover' style='width:200px;'><br>";

            if ($row['onloan'] == 0) {
                echo "Loan book: ";
                echo "
                <form action='addloan.php' method='POST'>
                    <input type='hidden' name='accountnumber' value='$accountnumber'>
                    <input type='hidden' name='role' value='$role'>
                    <input type='hidden' name='isbn' value='{$_GET['isbnsearch']}'>
                    
                    <label for='timeperiod'>How many days would you like to loan the book for?</label>
                    <select name='timeperiod' id='timeperiod'>
                        <option value='7'>7</option>
                        <option value='14'>14</option>
                        <option value='21'>21</option>
                    </select>
                    <input type='submit' value='Loan Book'>
                </form>
                ";
            } else {
                echo "This book is currently on loan";
            }
        }
    }
    ?>
</div>

</body>
</html>
