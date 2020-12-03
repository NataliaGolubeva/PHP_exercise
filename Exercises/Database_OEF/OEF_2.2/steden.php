
<?php
require_once "connection.php";
require_once "connection_data.php";
require_once "html_components.php";

echo PrintHead();
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
        echo '<a href="OEF_2.2.php">Terug naar overzicht</a>';

    }
}
else{
    echo "No records found";
}

$mysqli->close();


?>
</body>
</html>
