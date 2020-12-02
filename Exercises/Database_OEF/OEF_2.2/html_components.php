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