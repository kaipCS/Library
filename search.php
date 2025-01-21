<?php
include_once ("connection.php");
$isbnsearch = isset($_GET['isbnsearch']) ? $_GET['isbnsearch'] : '';
$sql = "SELECT * FROM books WHERE isbn LIKE  ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%{$isbnsearch}%";
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  echo 'Title: ' . $row['title'] . '<br />';
}
?>