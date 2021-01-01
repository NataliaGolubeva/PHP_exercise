<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$servername = "localhost";
$username = "root";
$password = "nata123";
$dbname = "steden";

function CreateConnection(){
    global $conn;
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
CreateConnection();


