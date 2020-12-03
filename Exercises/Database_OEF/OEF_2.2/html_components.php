<?php

function PrintHead (){
    $head= file_get_contents("./templates/head.html");
    return $head;
}

PrintHead();

function PrintJumbo(){
    $jumbo = file_get_contents("./templates/jumbo.html");
    return $jumbo;

}

function PrintCol(){
    $col_4 = file_get_contents("./templates/col_4.html");
    return $col_4;
}
function PrintColLg(){
    $col_9 = file_get_contents("./templates/col_9.html");
    return $col_9;
}