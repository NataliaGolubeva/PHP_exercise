<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin-left: 10px;
        }
        p {
            padding-left: 10px;
        }
        img {
            width: 75%;
            height: auto;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            color: green;
        }
    </style>
</head>
<body>
<?php

require_once "connection.php";
require_once "connection_data.php";
//Define and execute query
$id = $_GET['img_id'];

$query = "SELECT * FROM images WHERE img_id =" .  $id;
$result = $mysqli->query($query);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()){
        echo '<h3>'. $row["img_title"] . '</h3>';
        echo '<p> Filename: ' . $row["img_filename"] . '</p>';
        echo '<p>' . $row["img_width"] . " x " . $row["img_height"] . "pixels" . '</p>';
        echo "<br>";
        $link_image = "img/" . $row['img_filename'];
        print '<img class="img-fluid" width=75% src="' . $link_image . '"><br>';
        echo '<a href="OEF_2.1.php">Terug naar overzicht</a>';

    }
}
else{
    echo "No records found";
}

$mysqli->close();


?>
</body>
</html>
