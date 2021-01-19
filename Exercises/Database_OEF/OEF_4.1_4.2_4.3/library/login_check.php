<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";


if (loginCheck() ){
    $sql = "SELECT * FROM user WHERE usr_email = '" . $_POST['usr_email'] . "'";
    $user = getData($sql);
    $_SESSION['user'] = $user[0];
    $_SESSION['msgs']['success'] =  $user[0]['usr_firstname'] . " you're logged in!";
    header("Location: ./../overzicht_steden.php");

} else {
    unset($_SESSION['user']);
    print "Try again";
}

function LoginCheck(): bool
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        $usr_email = $_POST['usr_email'];
        $usr_password = $_POST['usr_password'];

        //controle CSRF token
        if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

// check usr_email in database
        $sql = "SELECT * FROM user WHERE usr_email = '" . $usr_email . "'";
        $user = getData($sql);
        if (count($user) === 0) {
            return false;
        }

        // check password
        $password = $user[0]['usr_password'];
        if (password_verify($usr_password, $password)) {
            return true;
        } else {
            return false;
        }

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        CompareWithDatabase( $table, $pkey );


        $str_keys_values = implode(" , ", $keys_values );

        //extend SQL with key-values
        $sql .= $str_keys_values;

        //extend SQL with WHERE
        $sql .= $where;
        //run SQL
        $result = ExecuteSQL( $sql );

        //output if not redirected
        print $sql ;
        print "<br>";
        //print $result->rowCount() . " records affected";

        $_SESSION["message"]="MESSAGE OF SUCCESS";

    }
}

