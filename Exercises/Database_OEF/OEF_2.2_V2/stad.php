<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "./library/connection.php";
require_once "./library/html_components.php";

//Define and execute query
PrintHead();
?>

<div class="container">
    <div class="row">

        <?php
        // get data
        $id = $_GET['img_id'];

        $rows = GetData( "SELECT * FROM images WHERE img_id =" .  $id );

        // get template
        $template = file_get_contents("./templates/col_9.html");

        //merge
        $body = MergeViewWithData( $template, $rows );
        print $body;


        ?>
    </div>
</div>

</body>
</html>


