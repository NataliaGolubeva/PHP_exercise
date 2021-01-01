<?php

require_once "./library/get_data.php";
require_once "./library/html_components.php";
require_once "./library/connection.php";
//require_once "./library/save.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Bewerk afbeelding", $subtitle = "");

?>

<div class="container">
    <div class="row">

        <?php

        // get data
        $id = $_GET['img_id'];

        $rows = GetData( "SELECT * FROM images WHERE img_id =" .  $id );

        // get template
       $template = file_get_contents("./templates/form.html");

        //merge
        $body = MergeViewWithData( $template, $rows );
        print $body;

        ?>
    </div>

</div>
</body>
</html>


