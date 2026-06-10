<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "im102_week1";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>