<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\CustomerController;

$customerController = new CustomerController();
$customers = $customerController->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>customer</title>
</head>

<body>
  <aside class="sidebar">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
  </aside>
  <div class="main">
    <div class="header">
      <h1>customer</h1>
      <span>Admin</span>
    </div>
    <div class="cards">
      <div class="card">
        <h3>Total Customers</h3>
        <p> 50</p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>
        </p>
      </div>
      <div class="card">
        <h3>Pending Purchase</h3>
        <p></p>
      </div>
      <div class="card">
        <h3><a href="/customer/create" class="button">New Customer</a></h3>
        <p></p>
      </div>
    </div>

    <div class="table-container">
      <h3>Customer</h3>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>City</th>
            <th>Pincode</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach($customers as $customer) { ?>
              <tr>
                <td><?= $customer['customer_id'] ?></td>
                <td><?= $customer['customer_name'] ?></td>
                <td><?= $customer['address'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['city'] ?></td>
                <td><?= $customer['pincode'] ?></td>
              </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
