<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/pdo.php";
require_once "lib/html_functions.php";

PrintHead();
PrintJumbo();

?>

<div class="container">
    <div class="row">

<?php
//validate GET argument
if ( ! is_numeric($_GET['img_id']))
{
    die("Wrong parameter");
}
$rows = GetData( "select * from images where img_id=" . $_GET['img_id'] );

//get template
$template = file_get_contents("templates/column_full.html");
//merge
$html = MergeViewWithData( $template, $rows );
print $html;
?>

    </div>
</div>

</body>
</html>
