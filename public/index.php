<?php

use models\Product;

spl_autoload_register([new \services\Autoloader(), 'loadClass']);

$product = new \logic\Product();