<?php

require_once "./library/get_data.php";
require_once "./library/html_components.php";

//Define and execute query
echo PrintHead();
echo PrintJumbo();?>

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


