<?php

function PrintHead (){
    $head = file_get_contents("./templates/head.html");
    return $head;
}

PrintHead();

function PrintJumbo($title = "", $subtitle = "" ){
    $jumbo = file_get_contents("./templates/jumbo.html");
    $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
    $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );
    return $jumbo;

}
function PrintJumbo2(){
    $jumbo2 = file_get_contents("./templates/jumbo2.html");
    return $jumbo2;

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


