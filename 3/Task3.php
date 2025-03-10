<?php

class Authenticator
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Authenticator();
        }
        return self::$instance;
    }
}


