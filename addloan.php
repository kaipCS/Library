<?php
#header('Location:loaningbooks.php');
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

// Current date when the book is loaned
$loanDate = date("Y-m-d"); // YYYY-MM-DD format

// Calculate the due date by adding the time period (days) to the current date
$timePeriod = $_POST['timeperiod']; // time period (in days)
$dueDate = date('Y-m-d', strtotime("+$timePeriod days", strtotime($loanDate)));

// Prepare the SQL query to insert the loan record
$stmt = $conn->prepare("INSERT INTO loans (isbn, returned, studentnumber, date, timeperiod, duedate)
VALUES (:isbn, :returned, :studentnumber, :date, :timeperiod, :duedate)");
$returned = 1;
// Bind the parameters
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':returned', $returned); // Assuming 1 means the book is on loan
$stmt->bindParam(':studentnumber', $_POST["studentnumber"]);
$stmt->bindParam(':date', $loanDate);
$stmt->bindParam(':timeperiod', $_POST["timeperiod"]);
$stmt->bindParam(':duedate', $dueDate);

// Execute the query
$stmt->execute();
?>