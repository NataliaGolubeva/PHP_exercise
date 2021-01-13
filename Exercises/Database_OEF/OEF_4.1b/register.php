<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "library/autoload.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Register", $subtitle = "");
echo PrintNavbar();

?>

<div class="container">
    <div class="row">

        <?php

        //insert data

        $data = [ 0 => [ "usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => "" ]];


        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        $output = file_get_contents("./templates/register.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        $sPassword =  password_hash("password", PASSWORD_DEFAULT );
        echo $sPassword;

        //get template




        ?>
    </div>

</div>
</body>
</html>


