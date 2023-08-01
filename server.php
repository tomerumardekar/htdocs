<?php
$servername = "localhost";
$username = "Tomer";
$password = "tomer1991";
$port = 3307; 
$database = "currency_exchange_db"; 

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to database: " . $database;
?>