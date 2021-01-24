<?php
function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintJumbo( $title = "", $subtitle = "" )
{
    $jumbo = file_get_contents("templates/jumbo.html");

    $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
    $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );

    print $jumbo;
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
function printNavbar() {
    $navbar = file_get_contents("./templates/navigation.html");
    if (isset($_SESSION['user'])) {
        $navbar = str_replace('%log-link%', 'no_access.php', $navbar);
        $navbar = str_replace('%log%', 'Logout', $navbar);
    } else {
        $navbar = str_replace('%log-link%', 'login.php', $navbar);
        $navbar = str_replace('%log%', 'Login', $navbar);
    }
    print $navbar;
}
function MakeSelect( $fkey, $value, $sql )
{
    $select = "<select id=$fkey name=$fkey value=$value>";
    $select .= "<option value='0'></option>";

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
function MergeViewWithExtraElements( $template, $elements )
{
    foreach ( $elements as $key => $element )
    {
        $template = str_replace( "@$key@", $element, $template );
    }
    return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
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