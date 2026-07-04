<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\StockItemController;

$stockItemController = new StockItemController();
$stock_items = $stockItemController->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>stock_items</title>
</head>

<body>
  <aside class="sidebar">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
  </aside>


  <div class="main">
    <div class="header">
      <h1>Stock-item</h1>
      <span>Admin</span>
    </div>


    <div class="cards">
      <div class="card">
        <h3>Total Stock</h3>    
        <p> 50</p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>
        </p>
      </div>
      <div class="card">
        <h3>Pending Stock</h3>
        <p></p>
      </div>
      <div class="card">
        <h3><a href="/stock-item/create" class="button">New Stock Item</a></h3>
        <p></p>
      </div>
    </div>

    <div class="table-container">
      <h3>Stock-item-list</h3>
      <br>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($stock_items as $stock_item) {
            $product_id = $stock_item['product_id'];
          ?>
            <tr>
              <td><?= $product_id ?></a> </td>
              <td><a href="/stock-item/edit?id=<?= $product_id ?>"><?= $stock_item['name'] ?></a></td>
              <td><?= $stock_item['category_id'] ?></td>
              <td><?= $stock_item['brand'] ?></td>
              <td><span class="status pending">Pending</span></td>
            </tr>
          <?php } ?>
    </div>
    </tbody>
    </table>

  </div>
  </div>

</body>

</html>
