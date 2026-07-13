<?php
 
use Sarma\MisForPrabhatElectronics\App\Helpers\Auth;
use Sarma\MisForPrabhatElectronics\App\Controllers\ReportController;
 
// Auth::require();
 
$ReportController = new ReportController();
 
$type = $_GET['type'] ?? 'sales';
$allowedTypes = ['sales', 'stock', 'service', 'purchase'];
if (!in_array($type, $allowedTypes)) $type = 'sales';
 
$data = match ($type) {
    'sales'    => $ReportController->salesReport(),
    'stock'    => $ReportController->stockReport(),
    'service'  => $ReportController->serviceReport(),
    'purchase' => $ReportController->purchaseReport(),
};
 
function fmt($value): string
{
    return '₹' . number_format((float)$value, 2);
}
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports — Prabhat Electronics</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .report-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
 
        .report-tab {
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            background: white;
            color: #334155;
            border: 1px solid #e2e8f0;
        }
 
        .report-tab.active {
            background: #3085c3;
            color: white;
            border-color: #3085c3;
        }
 
        .date-filter {
            background: white;
            padding: 16px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .08);
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }
 
        .date-filter label {
            font-size: 13px;
            color: #555;
        }
 
        .date-filter input {
            padding: 6px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13px;
        }
 
        .date-filter button {
            padding: 7px 16px;
            background: #3085c3;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }
 
        .export-btn {
            display: inline-block;
            padding: 8px 18px;
            background: #16a34a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 16px;
        }
 
        .export-btn:hover {
            background: #15803d;
        }
 
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }
 
        .s-card {
            background: white;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .08);
        }
 
        .s-card h4 {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 6px;
        }
 
        .s-card p {
            font-size: 22px;
            font-weight: 600;
            color: #1e293b;
        }
 
        .badge-paid {
            background: #dcfce7;
            color: #166534;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
 
        .badge-due {
            background: #fee2e2;
            color: #991b1b;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
 
        .badge-part {
            background: #fef9c3;
            color: #854d0e;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
 
        .badge-warranty {
            background: #e0f2fe;
            color: #075985;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
 
        .badge-no {
            background: #fee2e2;
            color: #991b1b;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
 
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
            font-size: 15px;
        }
    </style>
</head>
 
<body>
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>
 
    <div class="main">
        <div class="header">
            <h1>Reports</h1>
            <span>Admin</span>
        </div>
 
        <!-- Report type tabs -->
        <div class="report-tabs">
            <?php foreach (['sales' => 'Sales', 'stock' => 'Stock', 'service' => 'Service', 'purchase' => 'Purchase'] as $t => $label): ?>
                <a href="/reports?type=<?= $t ?>" class="report-tab <?= $type === $t ? 'active' : '' ?>">
                    <?= $label ?>
                </a>
            <?php endforeach; ?>
        </div>
 
        <!-- Date filter (not needed for stock) -->
        <?php if ($type !== 'stock'): ?>
            <form method="get" action="/reports" class="date-filter">
                <input type="hidden" name="type" value="<?= $type ?>">
                <label>From <input type="date" name="from" value="<?= htmlspecialchars($data['from']) ?>"></label>
                <label>To   <input type="date" name="to"   value="<?= htmlspecialchars($data['to'])   ?>"></label>
                <button type="submit">Apply</button>
            </form>
        <?php endif; ?>
 
        <!-- Export CSV button -->
        <a class="export-btn"
           href="/reports/export?type=<?= $type ?>&from=<?= $data['from'] ?? '' ?>&to=<?= $data['to'] ?? '' ?>">
            ⬇ Export as CSV
        </a>
 
        <!-- ======================== SALES REPORT ======================== -->
        <?php if ($type === 'sales'): ?>
            <div class="summary-cards">
                <div class="s-card"><h4>Total Orders</h4>   <p><?= $data['summary']['total_orders']     ?? 0 ?></p></div>
                <div class="s-card"><h4>Total Revenue</h4>  <p><?= fmt($data['summary']['total_revenue']    ?? 0) ?></p></div>
                <div class="s-card"><h4>Total Tax</h4>      <p><?= fmt($data['summary']['total_tax']        ?? 0) ?></p></div>
                <div class="s-card"><h4>Total Discount</h4> <p><?= fmt($data['summary']['total_discount']   ?? 0) ?></p></div>
                <div class="s-card"><h4>Avg Order Value</h4><p><?= fmt($data['summary']['avg_order_value']  ?? 0) ?></p></div>
            </div>
            <div class="table-container">
                <h3>Daily Sales Breakdown</h3><br>
                <?php if (empty($data['daily'])): ?>
                    <div class="empty-state">No sales found for this date range.</div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th><th>Orders</th><th>Revenue</th><th>Tax</th><th>Discount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['daily'] as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['sale_date']) ?></td>
                                    <td><?= $row['orders'] ?></td>
                                    <td><?= fmt($row['revenue']) ?></td>
                                    <td><?= fmt($row['tax']) ?></td>
                                    <td><?= fmt($row['discount']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
 
        <!-- ======================== STOCK REPORT ======================== -->
        <?php elseif ($type === 'stock'): ?>
            <div class="summary-cards">
                <div class="s-card"><h4>Total Products</h4>   <p><?= $data['totals']['total_products']    ?? 0 ?></p></div>
                <div class="s-card"><h4>Total Stock Value</h4><p><?= fmt($data['totals']['total_stock_value'] ?? 0) ?></p></div>
            </div>
            <div class="table-container" style="margin-bottom:20px">
                <h3>By Category</h3><br>
                <table>
                    <thead>
                        <tr><th>Category</th><th>Total Items</th><th>Total Value</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['by_category'] as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['category_name'] ?? 'Uncategorised') ?></td>
                                <td><?= $row['total_items'] ?></td>
                                <td><?= fmt($row['total_value']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="table-container">
                <h3>All Products</h3><br>
                <?php if (empty($data['products'])): ?>
                    <div class="empty-state">No products found in the database.</div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th><th>Code</th><th>Name</th>
                                <th>Brand</th><th>Category</th><th>Purchase Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['products'] as $p): ?>
                                <tr>
                                    <td><?= $p['product_id'] ?></td>
                                   <td><?= htmlspecialchars($p['product_code'] ?? '—') ?></td>
                                    <td><?= htmlspecialchars($p['name']) ?></td>
                                    <td><?= htmlspecialchars($p['brand']) ?></td>
                                    <td><?= htmlspecialchars($p['category_name'] ?? '—') ?></td>
                                    <td><?= fmt($p['purchase_price']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
 
        <!-- ======================== SERVICE REPORT ======================== -->
        <?php elseif ($type === 'service'): ?>
            <div class="summary-cards">
                <div class="s-card"><h4>Total Requests</h4><p><?= $data['totals']['total_requests'] ?? 0 ?></p></div>
                <?php foreach ($data['summary'] as $s): ?>
                    <div class="s-card">
                        <h4><?= ucfirst($s['warranty_status']) ?></h4>
                        <p><?= $s['total'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="table-container">
                <h3>Service Requests</h3><br>
                <?php if (empty($data['requests'])): ?>
                    <div class="empty-state">No service requests found for this date range.</div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th><th>Customer</th><th>Phone</th>
                                <th>Product</th><th>Delivery Date</th><th>Warranty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['requests'] as $r): ?>
                                <tr>
                                    <td>#<?= $r['service_request_id'] ?></td>
                                    <td><?= htmlspecialchars($r['customer_name'] ?? '—') ?></td>
                                    <td><?= htmlspecialchars($r['phone']         ?? '—') ?></td>
                                    <td><?= htmlspecialchars($r['product_name']  ?? '—') ?></td>
                                    <td><?= htmlspecialchars($r['delivery_date']) ?></td>
                                    <td>
                                        <span class="badge-<?= $r['warranty_status'] === 'yes' ? 'warranty' : 'no' ?>">
                                            <?= $r['warranty_status'] === 'yes' ? 'In Warranty' : 'Out of Warranty' ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
 
        <!-- ======================== PURCHASE REPORT ======================== -->
        <?php elseif ($type === 'purchase'): ?>
            <div class="summary-cards">
                <div class="s-card"><h4>Total Purchases</h4><p><?= $data['summary']['total_purchases'] ?? 0 ?></p></div>
                <div class="s-card"><h4>Total Spent</h4>    <p><?= fmt($data['summary']['total_spent']     ?? 0) ?></p></div>
            </div>
            <div class="summary-cards">
                <?php foreach ($data['by_status'] as $s): ?>
                    <div class="s-card">
                        <h4><span class="badge-<?= $s['payment_status'] ?>"><?= ucfirst($s['payment_status']) ?></span></h4>
                        <p><?= fmt($s['amount']) ?> <small style="font-size:14px;font-weight:400">(<?= $s['total'] ?>)</small></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="table-container">
                <h3>Purchase List</h3><br>
                <?php if (empty($data['purchases'])): ?>
                    <div class="empty-state">No purchases found for this date range.</div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th><th>Date</th><th>Supplier</th>
                                <th>Total</th><th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['purchases'] as $p): ?>
                                <tr>
                                    <td>#<?= $p['purchase_id'] ?></td>
                                    <td><?= htmlspecialchars($p['purchase_date']) ?></td>
                                    <td><?= htmlspecialchars($p['supplier_phone'] ?? '—') ?></td>
                                    <td><?= fmt($p['total_amount']) ?></td>
                                    <td>
                                        <span class="badge-<?= $p['payment_status'] ?>">
                                            <?= ucfirst($p['payment_status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        <?php endif; ?>
 
    </div>
</body>
</html>
 