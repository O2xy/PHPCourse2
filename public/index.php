<?php

include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new \services\Autoloader(), 'loadClass']);

$product = new \models\Product();