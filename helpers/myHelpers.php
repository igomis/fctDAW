<?php
use \Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;

function dd($param)
{
    var_dump($param);
    exit();
}

function loadWhoops()
{
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();
    return $whoops;
}

