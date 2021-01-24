<?php
session_start();

require_once "connection_data.php";
require_once "pdo.php";
require_once "html_components.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

$errors = [];
$msgs = [];
$old_post = [];
$mail = [];

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}
if ( key_exists( 'old_post', $_SESSION ) AND is_array( $_SESSION['old_post']) )
{
    $old_post = $_SESSION['old_post'];
    $_SESSION['old_post'] = null;
}

if ( key_exists( 'msgs', $_SESSION ) && is_array( $_SESSION['msgs']) )
{
    $msgs = $_SESSION['msgs'];
    $_SESSION['msgs'] = null;

}

if ( key_exists( 'mail', $_SESSION )) //AND is_array( $_SESSION['msgs']) )
{
    $msgs = $_SESSION['mail'];
    $_SESSION['mail'] = null;
}
