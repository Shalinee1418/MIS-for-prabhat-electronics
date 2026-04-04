<?php
namespace Sarma\MisForPrabhatElectronics\App\Config;

use mysqli;

class DbConfig{
    static function getConnection()
    {
        $credentials = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/env.ini");
        return new mysqli($credentials['server'], $credentials['user'], $credentials['password'], $credentials['database']);
    }
}