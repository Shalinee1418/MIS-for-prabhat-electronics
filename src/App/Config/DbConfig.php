<?php
namespace Sarma\MisForPrabhatElectronics\App\Config;

use mysqli;

class DbConfig{
    static function getConnection()
    {
        return new mysqli(getenv('DB_HOST'), $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
    }
}