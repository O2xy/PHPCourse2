<?php
class A {
    public static $message = 'A';

    public static function display()
    {
        echo static::$message;
    }
}

class B extends A {
    public static $message = 'B';
}


A::display();
B::display();