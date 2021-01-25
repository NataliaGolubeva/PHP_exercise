<?php
require_once "autoload.php";

function MakeSelect( $fkey, $value, $sql )
{
    $select = "<select id=$fkey name=$fkey value=$value>";
    $select .= "<option value='0'>Choose specialty</option>";

    $data = GetData($sql);

    foreach ( $data as $row )
    {
        if ( $row[0] == $value ) $selected = " selected ";
        else $selected = "";

        $select .= "<option $selected value=" . $row[0] . ">" . $row[1] . "</option>";
    }
    $select .= "</select>";


    return $select;
}
function MakeSelectSpec( $fkey, $value, $sql )
{
    $select = "<select id=$fkey name=$fkey value=$value>";
    $select .= "<option value='0'>Choose specialty</option>";

    $data = GetData($sql);

    foreach ( $data as $row )
    {
        if ( $row[0] == $value ) $selected = " selected ";
        else $selected = "";

        $select .= "<option $selected value=" . $row[0] . "><a href='search_results.php' >" . $row[1] . "</a></option>";
    }
    $select .= "</select>";


    return $select;
}
