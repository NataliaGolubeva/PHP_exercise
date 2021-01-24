<?php

function PrintHead (){
    $head = file_get_contents("./templates/head.html");
    return $head;
}
function PrintNavigation(){
    $navigation = file_get_contents("./templates/navigation.html");
    return $navigation;
}
function PrintHeader(){
    $header = file_get_contents("./templates/header.html");
    return $header;
}

function PrintSection(){
    $section = file_get_contents("./templates/section.html");
        return $section;
}

function PrintLogIn(){
    $login = file_get_contents("./templates/login.html");
    return $login;
}
function PrintSignIn(){
    $signIn = file_get_contents("./templates/myFormSignIn.html");
    return $signIn;
}
function PrintRegister(){
    $register = file_get_contents("./templates/register.html");
    return $register;
}


function printAlertSuccess($msgs) {
    $alert = file_get_contents("./templates/alert-success.html");
    $alert = str_replace("%msgs%", "$msgs", $alert);
    print $alert;
}
function printAlertDanger($msgs) {
    $alert = file_get_contents("./templates/alert-danger.html");
    $alert = str_replace("%msgs%", "$msgs", $alert);
    print $alert;
}
function MergeViewWithData( $template, $data )
{
    $returnvalue = "";
    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }
    return $returnvalue;
}

function MergeViewWithExtraElements( $template, $selects )
{
    foreach ( $selects as $key => $select )
    {
        $template = str_replace( "@$key@", $select, $template );
    }
    return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:#ff0000'>$error</p>", $template );
    }
    return $template;
}
function RemoveEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}

