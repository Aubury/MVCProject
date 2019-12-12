<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE','http://pkgim.de/');

include_once ROOT . "/components/Router.php";

$router = new Router();

$router->start();

//echo "Index.php";
//echo "<br>";
//echo trim($_SERVER["REQUEST_URI"],'/');
