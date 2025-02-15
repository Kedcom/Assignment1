<?php
$host = "localhost";
$db_name = "student";
$username = "root";
$password = "Worldovermayhem1234&";

$conn = mysqli_connect($host, $username, $password, $db_name);
// $conn = mysqli_connect($host, $db_name, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>