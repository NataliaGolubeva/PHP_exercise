<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "./library/autoload.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo( $title = "Leuke plekken in Europa" ,
    $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
echo PrintNavbar();

?>

<div class="container">
    <div class="row">

<?php
 // get data
$rows = getData("select * from images");

// get template
$template = file_get_contents("./templates/col_4.html");

//merge
$body = MergeViewWithData( $template, $rows );
print $body;


?>
    </div>
</div>

</body>
</html>


