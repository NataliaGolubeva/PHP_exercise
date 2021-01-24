<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "./library/autoload.php";
require_once "./library/search.php";


// PRINT HEAD
echo PrintHead();


// NAVIGATION
echo PrintNavigation();
if ( isset($msgs['success']) ) {
    printAlertSuccess($msgs['success']);
}

if ( isset($msgs['danger']) ) {
    printAlertDanger($msgs['danger']);
}
if (isset($_POST["search"])){
    Search();
}
$extra_elements['csrf_token'] = GenerateCSRF( "index.php"  );
/// Sign In
$data = [ 0 => [ "usr_name" => "", "usr_last_name" => "","usr_phone_nr" => "", "usr_email" => "", "usr_password" => "" ]];

$signIn = file_get_contents("./templates/myFormSignIn.html");
$signIn = MergeViewWithData( $signIn, $data );
$signIn = MergeViewWithExtraElements( $signIn, $extra_elements );
$signIn = MergeViewWithErrors($signIn, $errors );
$signIn = RemoveEmptyErrorTags( $signIn, $data );

print $signIn;

//// REGISTER

$data = [ 0 => [ "usr_name" => "", "usr_last_name" => "","usr_phone_nr" => "", "usr_email" => "", "usr_password" => "",
    "usr_street" => "", "usr_h_nr" => "", "usr_postcode" => "", "usr_city" => "", "usr_country" => ""]];

$row = $data[0];


$extra_elements['select_specialty'] = MakeSelect( $fkey = 'usr_spec_id',
    $value = $row['select_specialty'] ,
    $sql = "select spec_id, spec_name from specialty" );
$register = file_get_contents("./templates/register.html");

//merge
$register = MergeViewWithData( $register, $data );
$register = MergeViewWithExtraElements( $register, $extra_elements );
$register = MergeViewWithErrors( $register, $errors );
$register = RemoveEmptyErrorTags( $register, $data );

print $register;

/// LOGIN

$data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];

$login = file_get_contents("./templates/login.html");
$login = MergeViewWithData( $login, $data );
$login = MergeViewWithExtraElements( $login, $extra_elements );

print $login;


echo PrintSection();

?>;

<script src="./dist/icomoon/svgxuse.js"></script>
<script src="./src/js/index.js"></script>

</body>
</html>



