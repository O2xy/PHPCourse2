<?php

namespace services;

class Autoloader
{
    public $paths = [
        'models',
        'services'
    ];

    public function loadClass(string $classname)
    {
        //include $_SERVER['DOCUMENT_ROOT'] . "/../models/{$classname}.php";
        foreach ($this->paths as $dir){
            $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$dir}/{$classname}.php";
            if (file_exists($filename)){
                require $filename;
                return true;
            }
        }
        return false;
    }
}