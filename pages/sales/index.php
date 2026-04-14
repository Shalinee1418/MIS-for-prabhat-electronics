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
          <h3>Total Sales</h3>
          <p></p>
        </div>
        <div class="card">
          <h3>Orders</h3>
          <p>
          </p>
        </div>
        <div class="card">
          <h3>Pending Repairs</h3>
          <p></p>
        </div>
        <div class="card">
          <h3>Completed Services</h3>
          <p></p>
        </div>
      </div>

      <!-- Table -->
      <div class="table-container">
        <h3>Recent Service Requests</h3>
        <br>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Device</th>
              <th>Issue</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#101</td>
              <td>Name</td>
              <td>Television</td>
              <td>Screen issue</td>
              <td><span class="status pending">Pending</span></td>
            </tr>
            <tr>
              <td>#102</td>
              <td>Anita Singh</td>
              <td>Mobile</td>
              <td>Battery replacement</td>
              <td><span class="status inprogress">In Progress</span></td>
            </tr>
            <tr>
              <td>#103</td>
              <td>Vikas Sharma</td>
              <td>TV</td>
              <td>No display</td>
              <td><span class="status completed">Completed</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</body>

</html>