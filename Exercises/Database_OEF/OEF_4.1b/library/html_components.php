<?php

function PrintHead (){
    $head = file_get_contents("./templates/head_new.html");
    return $head;
}

PrintHead();

function PrintJumbo($title = "", $subtitle = "" ){
    $jumbo = file_get_contents("./templates/jumbo.html");
    $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
    $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );
    return $jumbo;

}
function PrintNavbar(){
    $navbar = file_get_contents("./templates/navbar.html");
        return $navbar;
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

