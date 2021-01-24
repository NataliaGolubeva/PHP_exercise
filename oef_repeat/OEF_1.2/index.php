<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

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
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Steden die je moet bezoeken</h1>
    <p>Kies jow bestemming!</p>
</div>

<div class="container">
    <div class="row">

<?php
$images = array("london", "paris", "berlin");
$names = array("Londen", "Parijs", "Berlijn");


function columns($imgcity, $imgname) {
    $column = 0;
    foreach(array_combine($imgcity, $imgname) as $image => $name) {
        $column = $column + 1;
        echo "<div class='col-sm-4'>";
        echo "<h3>$name</h3>";
        echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
        echo "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
        echo "<img width='auto' height='auto' src='img/$image.jpg' alt='city'> <br>";
        echo "</div>";
    }}
echo columns($images, $names)
?>

</body>
</html>

