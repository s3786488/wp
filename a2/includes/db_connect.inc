<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "gamesrus";
} else {
    $host = "saturn.csit.rmit.edu.au";
    $user = "s3786488";
    $password = "BB19924ge!";
    $database = "s3786488";
}

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
