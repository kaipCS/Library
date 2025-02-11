<?php
// change header and pass correct role
$role = $_POST["role"];
if ($role === '0') {
    header('Location: studentaccount.php');}
  elseif ($role === '1') {
     header('Location: teacheraccount.php');; 
}

// send back with the information still
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

// Current date when the book is loaned
$loanDate = date("Y-m-d"); // YYYY-MM-DD format
//print_r($_POST);
// Calculate the due date by adding the time period (days) to the current date
$timePeriod = $_POST['timeperiod']; // time period (in days)
$dueDate = date('Y-m-d', strtotime("+$timePeriod days", strtotime($loanDate)));

// Prepare the SQL query to insert the loan record
$stmt = $conn->prepare("INSERT INTO loans (isbn, returned, accountnumber, date, timeperiod, duedate)
VALUES (:isbn, :returned, :accountnumber, :date, :timeperiod, :duedate)");
$returned = 0;
// Bind the parameters
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':returned', $returned); // Assuming 1 means the book is returned 
$stmt->bindParam(':accountnumber', $_POST["accountnumber"]);
$stmt->bindParam(':date', $loanDate);
$stmt->bindParam(':timeperiod', $_POST["timeperiod"]);
$stmt->bindParam(':duedate', $dueDate);


// Execute the query
$stmt->execute();
$updateStmt = $conn->prepare("UPDATE books SET onloan = 1 WHERE isbn = :isbn");
$updateStmt->bindParam(':isbn', $_POST["isbn"]);
$updateStmt->execute();
?>
