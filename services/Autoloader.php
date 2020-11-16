<?php

namespace services;

class Autoloader
{
    
    public function loadClass(string $classname)
    {
        $filename = ROOT_DIR . $classname . '.php';
        if (file_exists($filename)){
            require $filename;
            return true;
        }
        return false;
    }
}