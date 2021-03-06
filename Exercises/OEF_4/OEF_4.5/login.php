<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access =  true;
require_once "library/autoload.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Login", $subtitle = "");


?>

<div class="container">
    <div class="row">

        <?php

        if ( isset($_GET['logout']) AND $_GET['logout'] == "true" )
        {
            print '<div class="container">';
            print' <div class="alert alert-success" role="alert">';
            print '<div class="msgs">U bent uitgelogd.</div>';

            print'</div>';
            print'</div>';
        }


        $data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];
        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );

        $output = file_get_contents("./templates/login.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );


        print $output;


        ?>
    </div>

</div>
</body>
</html>


