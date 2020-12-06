<?php
require_once "connection.php";

function getData ($query)  {
    //define and execute query
    global $conn;
    $result = $conn->query( $query );

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
