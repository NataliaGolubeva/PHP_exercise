

<body>

<div class="jumbotron text-center">
    <h1>Steden die je moet bezoeken</h1>
    <p>Kies jow bestemming!</p>
</div>

<?php
$head = file_get_contents("./templates/head.html");
print($head);
require_once "connection.php";
require_once "connection_data.php";
//Define and execute query
$table = 'images';

$query = "select * from " .$table ;

$result = $mysqli->query($query);

//show result (if there is any)
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {$link_image = "img/" . $row['img_filename'];
        echo "<div class='col-sm-4'>";
        echo '<h3>' . $row["img_title"] . '</h3>';
        echo '<p>' . $row["img_width"] . " x " . $row["img_height"] . "pixels" . '</p>';
        echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>';
        print '<img class="img-fluid" src="' . $link_image . '">';
        $id = $row['img_id'];
        echo ('<a href="steden.php?img_id=' . $id . '">'.  "Meer info" . '</a>');

        echo '</div>';
            } }
else{
                echo "No records found";
            }
            $mysqli->close();

        ?>

</body>
</html>


