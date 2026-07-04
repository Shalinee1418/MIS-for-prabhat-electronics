<?php
session_start();
if (empty($_SESSION['email'])) {
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Service Request — Prabhat Electronics</title>
  <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
 
    body { display: flex; background-color: #f4f6f9; min-height: 100vh; }
 
    /* ── Sidebar ── */
    .sidebar {
      width: 220px;
      min-height: 100vh;
      background: #1e3a5f;
      color: white;
      display: flex;
      flex-direction: column;
      padding: 0;
      flex-shrink: 0;
    }
 
    .sidebar-logo {
      background: white;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
 
    .sidebar-logo img {
      height: 48px;
      width: auto;
    }
 
    .sidebar nav {
      display: flex;
      flex-direction: column;
      padding: 10px 0;
      flex: 1;
    }
 
    .sidebar nav a {
      text-decoration: none;
      color: #cdd8e8;
      padding: 13px 24px;
      font-size: 15px;
      transition: background 0.15s;
    }
 
    .sidebar nav a:hover,
    .sidebar nav a.active {
      background: #2a4f7c;
      color: white;
    }
 
    /* ── Main ── */
    .main { flex: 1; display: flex; flex-direction: column; }
 
    /* ── Top header bar ── */
    .page-header {
      background: #3a8cc4;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 17px;
      font-weight: 600;
    }
 
    /* ── Form wrapper ── */
    .form-wrapper {
      flex: 1;
      padding: 30px;
    }
 
    .form-card {
      background: white;
      border-radius: 4px;
      padding: 30px 40px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    }
 
    /* ── Field rows ── */
    .field-row {
      display: flex;
      align-items: center;
      margin-bottom: 22px;
    }
 
    .field-row label {
      width: 180px;
      flex-shrink: 0;
      font-size: 14px;
      color: #444;
    }
 
    .field-row input,
    .field-row select,
    .field-row textarea {
      flex: 1;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 9px 12px;
      font-size: 14px;
      color: #333;
      background: white;
      outline: none;
      transition: border-color 0.15s;
    }
 
    .field-row input:focus,
    .field-row select:focus,
    .field-row textarea:focus {
      border-color: #3a8cc4;
      box-shadow: 0 0 0 2px rgba(58,140,196,0.15);
    }
 
    /* SI No read-only */
    .field-row input[readonly] {
      background: #f8f8f8;
      color: #666;
    }
 
    /* Estimate cost prefix */
    .cost-wrapper {
      flex: 1;
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 4px;
      overflow: hidden;
    }
 
    .cost-wrapper:focus-within {
      border-color: #3a8cc4;
      box-shadow: 0 0 0 2px rgba(58,140,196,0.15);
    }
 
    .cost-prefix {
      padding: 9px 12px;
      background: #f4f6f9;
      border-right: 1px solid #ccc;
      color: #555;
      font-size: 14px;
    }
 
    .cost-wrapper input {
      border: none;
      border-radius: 0;
      flex: 1;
      padding: 9px 12px;
    }
 
    .cost-wrapper input:focus {
      box-shadow: none;
    }
 
    /* ── Footer bar with submit ── */
    .form-footer {
      background: #e9ecef;
      padding: 15px 30px;
      display: flex;
      justify-content: flex-end;
    }
 
    .btn-submit {
      background: #3a8cc4;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px 32px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.15s;
    }
 
    .btn-submit:hover { background: #2e73a8; }
  </style>
</head>
<body>
 
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <img src="/assets/images/Prabhat_electronics.jpg" alt="Prabhat Electronics">
    </div>
    <nav>
      <a href="/user/admin-dashboard">Dashboard</a>
      <a href="#">Stock Item</a>
      <a href="#">Purchase</a>
      <a href="/service-request/create" class="active">Service Requests</a>
      <a href="#">Sales</a>
      <a href="#">Suppliers</a>
      <a href="#">Customers</a>
      <a href="#">Reports</a>
      <a href="#">Settings</a>
      <a href="#">Logout</a>
    </nav>
  </aside>
 
  <!-- Main -->
  <div class="main">
 
    <!-- Header bar -->
    <div class="page-header">
      <span>New Service Request</span>
      <span>Admin</span>
    </div>
 
    <!-- Form -->
    <div class="form-wrapper">
      <div class="form-card">
        <form action="/service-request/save" method="post">
 
          <div class="field-row">
            <label for="sl_no">Sl No.</label>
            <input type="text" id="sl_no" name="sl_no" value="1" readonly>
          </div>
 
          <div class="field-row">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Service type">
          </div>
 
          <div class="field-row">
            <label for="device">Device</label>
            <input type="text" id="device" name="device" placeholder="Device name / model">
          </div>
 
          <div class="field-row">
            <label for="issue">Issue</label>
            <input type="text" id="issue" name="issue" placeholder="Describe the issue">
          </div>
 
          <div class="field-row">
            <label for="service_required">Service Required</label>
            <select id="service_required" name="service_required">
              <option value="" disabled selected>-- Select --</option>
              <option value="repair">Repair</option>
              <option value="replacement">Replacement</option>
              <option value="inspection">Inspection</option>
              <option value="installation">Installation</option>
              <option value="amc">AMC</option>
            </select>
          </div>
 
          <div class="field-row">
            <label for="customer_detail">Customer Detail</label>
            <input type="text" id="customer_detail" name="customer_detail" placeholder="Customer name / ID">
          </div>
 
          <div class="field-row">
            <label for="estimate_cost">Estimate Cost</label>
            <div class="cost-wrapper">
              <span class="cost-prefix">₹</span>
              <input type="number" id="estimate_cost" name="estimate_cost"
                     placeholder="0.00" step="0.01" min="0">
            </div>
          </div>
 
        </form>
      </div>
    </div>
 
    <!-- Footer with Submit -->
    <div class="form-footer">
      <button type="submit" form="service-request-form" class="btn-submit"
              onclick="this.closest('.main').querySelector('form').submit()">
        Submit
      </button>
    </div>
 
  </div>
</body>
</html>