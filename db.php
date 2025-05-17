<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // default password is blank in XAMPP
$dbname = 'readnshop';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>