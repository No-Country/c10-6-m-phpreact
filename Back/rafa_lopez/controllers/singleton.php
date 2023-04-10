<?php

/**
 * controlador singletos para dobleinstanciadeclases
 * especialemtne en DB class
 * 
 */
class Singleton
{
    private static $instances = array();

    public static function getInstance($class)
    {
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }

        return self::$instances[$class];
    }

    private function __construct()
    {
        // Constructor privado para evitar la creación de instancias directamente.
    }
}
