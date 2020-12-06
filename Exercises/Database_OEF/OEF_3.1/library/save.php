<?php
require_once "connection.php";

$sql = "INSERT INTO test SET ";
$sql.= " img_title = '" . $_POST["img_title"] . "' , ";
$sql.= " img_filename = '" . $_POST["img_filename"] . "' , ";
$sql.= " img_width = '" . $_POST["img_width"] . "' , ";
$sql.= " img_height = '" . $_POST["img_height"] . "' ";
print $sql;

function saveData($sqli){
    global $conn;
    $result = $conn->query($sqli);

    var_dump($result);}

saveData($sql);