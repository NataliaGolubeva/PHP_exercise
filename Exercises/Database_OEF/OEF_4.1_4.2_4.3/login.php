
<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "library/autoload.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Login", $subtitle = "");
echo PrintNavbar();

?>

<div class="container">
    <div class="row">

        <?php

        //insert data


        $data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];
        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        $output = file_get_contents("./templates/login.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );


        print $output;


        //get template




        ?>
    </div>

</div>
</body>
</html>


