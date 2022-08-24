<?php


#$servername = "mysql";
$servername = "host.docker.internal";
$username = "sail";
$password = "password";
$database = "newsaggregat";

//phpinfo();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
