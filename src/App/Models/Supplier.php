<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Supplier
{
    public static function all(): array
    {
        $connection = DbConfig::getConnection();
        $sql = "SELECT * FROM supplier";
        $result = $connection->query($sql);
        $connection->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find(int $id): array
    {
        $connection = DbConfig::getConnection();
        $sql = "SELECT * FROM supplier WHERE supplier_id=?";
        $statement = $connection->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        $connection->close();
        return $result->fetch_assoc();
    }
}