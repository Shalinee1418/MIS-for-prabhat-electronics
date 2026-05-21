<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class service
{
    public $serviceRequestId;
    public $customerId;
    public $productId;
    public $deliveryDate;
    public $warrantyStatus;

    private $connection;
    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM service_requests";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function create()
    {
       $query = "INSERT INTO purchase (service_request_id) VALUE (?)";
       $statement = $this->connection->prepare($query);
       $statement->bind_param("id", $this->serviceRequestId);
       return $statement->execute();
    }
    public function save()
    {
        $sql = "INSERT INTO service_requests(serviceRequestId) VALUE('$this->serviceRequesstId')";
        $this->connection->query($sql);
        return $this->connection->insert_id;
    }
    public function getById($id)
    {
        $query = "SELECT * FROM service_requests WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
