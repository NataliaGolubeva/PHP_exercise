<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "autoload.php";


function Search()
{
    $resultList = [];
    $search = $_POST["search"];
    $list = explode(" ", $search);

    foreach ($list as $a) {

        $sql = "SELECT * FROM specialty WHERE spec_name LIKE '%$a%' ";
        $data = getData($sql);
        //$data -> bindValue('%$a%', $_POST["search"], PDO::PARAM_STR, 50) ;

        foreach ($data as $row) {

            $resultList[$row['spec_name']] = $row;
        }
        foreach($resultList as $row){
           //echo '<div class="result" style="color: white">' .$row['spec_name'] . '</div>';
           //echo '<div class="result" style="color: white">' .$row['spec_id'] . '</div>';

        }
    }
}
//if ($_POST["search"] > "" ) header("Location: ./" . $_POST["search"] );

//header('Location: ./php/search_results.php');

