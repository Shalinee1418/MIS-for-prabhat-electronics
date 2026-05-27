<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers\SupplierController;

use Sarma\MisForPrabhatElectronics\App\Controllers\SupplierController;

$supplierController = new SupplierController();
$supplier = $supplierController->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
  </aside>

  <!-- Main Content -->
  <div class="main">

    <!-- Header -->
    <div class="header">
      <h1>Dashboard</h1>
      <span>Admin</span>
    </div>

    <!-- Cards -->
    <div class="cards">
      <div class="card">
        <h3>Total Purchases</h3>
        <p></p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>
        </p>
      </div>
      <div class="card">
        <h3>Pending Orders</h3>
        <p></p>
      </div>
      <div class="card">
        <h3><a href="/supplier/create" class="button">New Supplier</a></h3>
        <p></p>
      </div>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h3>Supplier Details</h3>
      <br>
      <table>
        <thead>
          <tr>
            <th> Supplier ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($supplier as $supplier) { ?>
            <tr>
              <td><?= $supplier['supplier_id'] ?></td>
              <td><?= $supplier['supplier_name'] ?></td>
              <td><?= $supplier['phone'] ?></td>
              <td><?= $supplier['email'] ?></td>
              <td><?= $supplier['address'] ?></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</body>

</html>