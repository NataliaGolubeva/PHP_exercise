
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
        img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Steden die je moet bezoeken</h1>
    <p>Kies jow bestemming!</p>
</div>

<?php
require_once "connection.php";
require_once "connection_data.php";
//Define and execute query
$sql = "select * from images";
$result = $conn->query($sql);

//show result (if there is any)
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {$link_image = "img/" . $row['img_filename'];
        echo "<div class='col-sm-4'>";
        echo $row["img_id"];
        echo '<h3>' . $row["img_title"] . '</h3>';
        echo '<p>' . $row["img_width"] . " x " . $row["img_height"] . "pixels" . '</p>';
        echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
        print '<img class="img-fluid" src="' . $link_image . '">';
        echo "</div>";
    }
            }




        else{
                echo "No records found";
            }
            $conn->close();
        ?>

</body>
</html>


