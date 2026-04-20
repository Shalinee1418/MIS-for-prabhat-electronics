<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\SaleController;

$saleController = new SaleController();
$sales = $saleController->getAll();
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
      <h1>Sales</h1>
      <span>Admin</span>
    </div>

    <!-- Cards -->
    <div class="cards">
      <div class="card">
        <h3>Total Sales</h3>
        <p></p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>
        </p>
      </div>
      <div class="card">
        <h3><a href="/sale/create" class="button">New Sale Item</a></h3>
        <p></p>
      </div>
      <div class="card">
        <h3><a href="/sale/create" class="button">Edit Sale</a></h3>
        <p></p>
      </div>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h3>Recent Sale Item</h3>
      <br>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Device</th>
            <th>Payment</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($sales as $sale) {
          ?>
            <tr>
              <td><?= $sale[0] ?></td>
              <td><?= $sale[1] ?></td>
              <td><?= $sale[2] ?></td>
              <td><?= $sale[3] ?></td>
              <p>
  Sale No:
  <input type="text" value="<?php echo $sale[0] + 1; ?>">
</p>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>