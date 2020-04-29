<?php

use App\Tools\DatabaseTools;

$loader = require '../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$dbTools = new DatabaseTools("mysql", "vtc", "root", "root");



switch ($uri) {
    case '/' :
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/vehicule':
        require __DIR__ . '/pages/vehicule.php';
        break;
    case '/conducteur':
        require __DIR__ . '/pages/conducteur.php';
        break;
    case '/association':
        require __DIR__ . '/pages/association.php';
        break;
    default :
        require __DIR__ . '/pages/homepage.php';
        break;
}