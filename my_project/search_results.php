<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Find your doctor</title>
    <link rel="stylesheet" href="dist/style.css" />
    <link rel="stylesheet" href="dist/icomoon/style.css" />
    <style>
* {
    color: white;
}
    </style>

</head>
<body>



<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "./library/autoload.php";


if (isset($_POST["search"])){
    Search();
}


?>;



</body>
</html>


