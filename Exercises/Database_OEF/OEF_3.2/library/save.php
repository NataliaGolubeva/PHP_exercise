<?php
require_once "connection.php";
CreateConnection();
//print json_encode($_POST);
/* $img_title = $img_filename = $img_width = $img_height = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $img_title = data_input($_POST["img_title"]);
    $img_filename = data_input($_POST["img_filename"]);
    $img_width = data_input($_POST["img_width"]);
    $img_title = data_input($_POST["img_title"]);
}*/
function data_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){

$sql = "UPDATE images SET ";
$sql.= " img_title = '" . data_input($_POST["img_title"]) . "' , ";
$sql.= " img_filename = '" . data_input($_POST["img_filename"]) . "' , ";
$sql.= " img_width = '" . data_input($_POST["img_width"]). "' , ";
$sql.= " img_height = '" . data_input($_POST["img_height"]) . "' ";
$sql .= 'WHERE img_id = ' . $_POST["img_id"] ;

print $sql;

global $conn;

$result = $conn->query($sql);

var_dump($result);}
header('Location: ../overzicht_steden.php');


