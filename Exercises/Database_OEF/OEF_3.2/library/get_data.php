<?php
require_once "connection.php";

function getData ($sql)  {
    //define and execute query
    global $conn;

    $result = $conn->query( $sql );

    //show result (if there is any)
    if ( $result->rowCount() > 0 )
    {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    else
    {
        return [];
    }

}
function ExecuteSQL( $sql )
{
    global $conn;

    //define and execute query
    $result = $conn->query( $sql);

    return $result;
}