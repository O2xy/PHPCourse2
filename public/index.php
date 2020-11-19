<?php

include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

//$product = new \app\models\Product();
//$p = $product->getById(2);
//$a = $p->create();
//$p->price = 120;
//$a = $p->update();