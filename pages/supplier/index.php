<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\SupplierController;

$supplierController = new SupplierController();
$suppliers = $supplierController->getAll();
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
          <?php if (!empty($suppliers)): ?>
            <?php foreach ($suppliers as $supplier): ?>
              <tr>
                <td><?= htmlspecialchars($supplier['supplier_id']) ?></td>
                <td><?= htmlspecialchars($supplier['supplier_name']) ?></td>
                <td><?= htmlspecialchars($supplier['phone']) ?></td>
                <td><?= htmlspecialchars($supplier['email']) ?></td>
                <td><?= htmlspecialchars($supplier['address']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No suppliers found.</td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>
    </div>
  </div>
</body>

</html>