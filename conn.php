<?php
$servername = "localhost";
$username = "id21703179_root";
$password = "@Q1057m8I";
$dbname = "id21703179_visitors";

try {
    $conn = new PDO("mysql:host=$servername;dbname=id21703179_visitors", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
