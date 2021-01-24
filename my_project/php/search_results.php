<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../library/autoload.php";
require_once "../library/search.php";

$errors = [];

if (key_exists('errors', $_SESSION) and is_array($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}

// PRINT HEAD

echo PrintHead();
$output = file_get_contents('./templates/search_output.html');
$extra_elements['csrf_token'] = GenerateCSRF( "search_results.php"  );
$output = MergeViewWithExtraElements( $output, $extra_elements );
print $output;

