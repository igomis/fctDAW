<?php
function dd($param)
{
    var_dump($param);
    exit();
}

function loadWhoops()
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    return $whoops;
}

function ucParagraph(String $text):String
{
    return $text;
}

function greetins():String
{
    return '';
}

function valDate():String
{
    return '';
}

function paintLine(Array $linea):String
{
    return '';
}

