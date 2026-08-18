<?php

namespace Sarma\MisForPrabhatElectronics\App\Config;

use mysqli;

class DbConfig
{
    private static $connection = null;


    static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new mysqli(getenv('DB_HOST'), $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
        }
        return self::$connection;
    }// singleton implementation to ensure only one connection is created and reused throughout the application
}
