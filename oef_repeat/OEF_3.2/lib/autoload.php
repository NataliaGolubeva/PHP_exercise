<?php
session_start();
require_once 'connection.php';
require_once 'html_functions.php';
require_once 'pdo.php';
require_once 'save.php';
require_once 'security.php';
require_once 'strings.php';
require_once 'sanitize.php';
require_once 'validate.php';
require_once 'form_elements.php';

$errors = [];

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}