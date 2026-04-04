<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use mysqli;
use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class AuthenticationController
{
    static function authenticate()
    {
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        $connection = DbConfig::getConnection();
        $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password=SHA1('$password')";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['email'] = $user_id;
            header("location:/user/admin-dashboard");
        } else
            echo "Authentication failed!";

        $connection->close();
    }
}
