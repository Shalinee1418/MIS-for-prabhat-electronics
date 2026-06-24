<?php
namespace Sarma\MisForPrabhatElectronics\App\Controllers;
 
use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;
 
/**
 * ReportController
 * Handles all report queries for Prabhat Electronics MIS.
 *
 * Reports available:
 *  - salesReport()       : Total sales, revenue, tax grouped by date range
 *  - stockReport()       : All products with stock status
 *  - serviceReport()     : Service requests grouped by status
 *  - purchaseReport()    : Purchases grouped by date range
 */
class ReportController
{
    private $connection;
 
    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }
 
    // ---------------------------------------------------------------
    // SALES REPORT
    // Returns: daily sales totals within a date range
    // ---------------------------------------------------------------
    public function salesReport(): array
    {
        // Date range from GET params — default to current month
        $from = $this->sanitizeDate($_GET['from'] ?? date('Y-m-01'));
        $to   = $this->sanitizeDate($_GET['to']   ?? date('Y-m-t'));
 
        // Summary totals
        $summaryStmt = $this->connection->prepare("
            SELECT
                COUNT(sale_id)          AS total_orders,
                SUM(total_amount)       AS total_revenue,
                SUM(tax_amount)         AS total_tax,
                SUM(discount)           AS total_discount,
                AVG(total_amount)       AS avg_order_value
            FROM sale
            WHERE sale_date BETWEEN ? AND ?
        ");
        $summaryStmt->bind_param("ss", $from, $to);
        $summaryStmt->execute();
        $summary = $summaryStmt->get_result()->fetch_assoc();
        $summaryStmt->close();
 
        // Daily breakdown
        $dailyStmt = $this->connection->prepare("
            SELECT
                sale_date,
                COUNT(sale_id)      AS orders,
                SUM(total_amount)   AS revenue,
                SUM(tax_amount)     AS tax,
                SUM(discount)       AS discount
            FROM sale
            WHERE sale_date BETWEEN ? AND ?
            GROUP BY sale_date
            ORDER BY sale_date ASC
        ");
        $dailyStmt->bind_param("ss", $from, $to);
        $dailyStmt->execute();
        $daily = $dailyStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $dailyStmt->close();
 
        return [
            'from'    => $from,
            'to'      => $to,
            'summary' => $summary,
            'daily'   => $daily,
        ];
    }
 
    // ---------------------------------------------------------------
    // STOCK REPORT
    // Returns: all products with category, brand, and purchase price
    // ---------------------------------------------------------------
    public function stockReport(): array
    {
        // All products joined with category
        $result = $this->connection->query("
            SELECT
                p.product_id,
                p.product_code,
                p.name,
                p.brand,
                p.purchase_price,
                c.category_name
            FROM product p
            LEFT JOIN category c ON p.category_id = c.category_id
            ORDER BY c.category_name, p.name
        ");
        $products = $result->fetch_all(MYSQLI_ASSOC);
 
        // Summary: count and total value per category
        $categoryResult = $this->connection->query("
            SELECT
                c.category_name,
                COUNT(p.product_id)         AS total_items,
                SUM(p.purchase_price)       AS total_value
            FROM product p
            LEFT JOIN category c ON p.category_id = c.category_id
            GROUP BY c.category_name
            ORDER BY total_items DESC
        ");
        $byCategory = $categoryResult->fetch_all(MYSQLI_ASSOC);
 
        // Overall totals
        $totalsResult = $this->connection->query("
            SELECT
                COUNT(product_id)       AS total_products,
                SUM(purchase_price)     AS total_stock_value
            FROM product
        ");
        $totals = $totalsResult->fetch_assoc();
 
        return [
            'products'    => $products,
            'by_category' => $byCategory,
            'totals'      => $totals,
        ];
    }
 
    // ---------------------------------------------------------------
    // SERVICE REPORT
    // Returns: service requests grouped by status + detailed list
    // ---------------------------------------------------------------
    public function serviceReport(): array
    {
        // Date range
        $from = $this->sanitizeDate($_GET['from'] ?? date('Y-m-01'));
        $to   = $this->sanitizeDate($_GET['to']   ?? date('Y-m-t'));
 
        // Status summary
        $summaryStmt = $this->connection->prepare("
            SELECT
                warranty_status,
                COUNT(service_request_id) AS total
            FROM service_request
            WHERE delivery_date BETWEEN ? AND ?
            GROUP BY warranty_status
        ");
        $summaryStmt->bind_param("ss", $from, $to);
        $summaryStmt->execute();
        $summary = $summaryStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $summaryStmt->close();
 
        // Detailed list with customer name and product name
        $listStmt = $this->connection->prepare("
            SELECT
                sr.service_request_id,
                c.customer_name,
                c.phone,
                p.name          AS product_name,
                sr.delivery_date,
                sr.warranty_status
            FROM service_request sr
            LEFT JOIN customer c ON sr.customer_id = c.customer_id
            LEFT JOIN product  p ON sr.stock_item_id = p.product_id
            WHERE sr.delivery_date BETWEEN ? AND ?
            ORDER BY sr.delivery_date DESC
        ");
        $listStmt->bind_param("ss", $from, $to);
        $listStmt->execute();
        $requests = $listStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $listStmt->close();
 
        // Total count
        $countStmt = $this->connection->prepare("
            SELECT COUNT(service_request_id) AS total_requests
            FROM service_request
            WHERE delivery_date BETWEEN ? AND ?
        ");
        $countStmt->bind_param("ss", $from, $to);
        $countStmt->execute();
        $totals = $countStmt->get_result()->fetch_assoc();
        $countStmt->close();
 
        return [
            'from'     => $from,
            'to'       => $to,
            'summary'  => $summary,
            'requests' => $requests,
            'totals'   => $totals,
        ];
    }
 
    // ---------------------------------------------------------------
    // PURCHASE REPORT
    // Returns: purchases grouped by date range with supplier info
    // ---------------------------------------------------------------
    public function purchaseReport(): array
    {
        $from = $this->sanitizeDate($_GET['from'] ?? date('Y-m-01'));
        $to   = $this->sanitizeDate($_GET['to']   ?? date('Y-m-t'));
 
        // Summary totals
        $summaryStmt = $this->connection->prepare("
            SELECT
                COUNT(purchase_id)      AS total_purchases,
                SUM(total_amount)       AS total_spent,
                SUM(tax_amount)         AS total_tax
            FROM purchase
            WHERE purchase_date BETWEEN ? AND ?
        ");
        $summaryStmt->bind_param("ss", $from, $to);
        $summaryStmt->execute();
        $summary = $summaryStmt->get_result()->fetch_assoc();
        $summaryStmt->close();
 
        // Breakdown by payment status
        $statusStmt = $this->connection->prepare("
            SELECT
                payment_status,
                COUNT(purchase_id)  AS total,
                SUM(total_amount)   AS amount
            FROM purchase
            WHERE purchase_date BETWEEN ? AND ?
            GROUP BY payment_status
        ");
        $statusStmt->bind_param("ss", $from, $to);
        $statusStmt->execute();
        $byStatus = $statusStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $statusStmt->close();
 
        // Detailed list with supplier info
        $listStmt = $this->connection->prepare("
            SELECT
                p.purchase_id,
                p.purchase_date,
                p.total_amount,
                p.tax_amount,
                p.payment_status,
                s.phone     AS supplier_phone,
                s.email     AS supplier_email
            FROM purchase p
            LEFT JOIN supplier s ON p.supplier_id = s.supplier_id
            WHERE p.purchase_date BETWEEN ? AND ?
            ORDER BY p.purchase_date DESC
        ");
        $listStmt->bind_param("ss", $from, $to);
        $listStmt->execute();
        $purchases = $listStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $listStmt->close();
 
        return [
            'from'      => $from,
            'to'        => $to,
            'summary'   => $summary,
            'by_status' => $byStatus,
            'purchases' => $purchases,
        ];
    }
 
    // ---------------------------------------------------------------
    // Helper: sanitize date input to prevent injection in BETWEEN
    // ---------------------------------------------------------------
    private function sanitizeDate(string $date): string
    {
        // Validate format YYYY-MM-DD, fall back to today if invalid
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return ($d && $d->format('Y-m-d') === $date) ? $date : date('Y-m-d');
    }
    public function exportCsv(string $type): void
{
    // Get data based on report type
    $data = match($type) {
        'sales'    => $this->salesReport(),
        'stock'    => $this->stockReport(),
        'service'  => $this->serviceReport(),
        'purchase' => $this->purchaseReport(),
        default    => null
    };

    if (!$data) {
        header("location:/reports");
        exit;
    }

    // Set headers to force browser to download as CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $type . '_report_' . date('Y-m-d') . '.csv"');
    header('Pragma: no-cache');

    $output = fopen('php://output', 'w');

    // Write CSV rows based on report type
    match($type) {

        'sales' => (function() use ($output, $data) {
            // Summary section
            fputcsv($output, ['SALES REPORT']);
            fputcsv($output, ['From', $data['from'], 'To', $data['to']]);
            fputcsv($output, []);
            fputcsv($output, ['SUMMARY']);
            fputcsv($output, ['Total Orders',     $data['summary']['total_orders']     ?? 0]);
            fputcsv($output, ['Total Revenue',    $data['summary']['total_revenue']    ?? 0]);
            fputcsv($output, ['Total Tax',        $data['summary']['total_tax']        ?? 0]);
            fputcsv($output, ['Total Discount',   $data['summary']['total_discount']   ?? 0]);
            fputcsv($output, ['Avg Order Value',  $data['summary']['avg_order_value']  ?? 0]);
            fputcsv($output, []);
            // Daily breakdown
            fputcsv($output, ['DAILY BREAKDOWN']);
            fputcsv($output, ['Date', 'Orders', 'Revenue', 'Tax', 'Discount']);
            foreach ($data['daily'] as $row) {
                fputcsv($output, [
                    $row['sale_date'],
                    $row['orders'],
                    $row['revenue'],
                    $row['tax'],
                    $row['discount'],
                ]);
            }
        })(),

        'stock' => (function() use ($output, $data) {
            fputcsv($output, ['STOCK REPORT']);
            fputcsv($output, ['Generated on', date('Y-m-d')]);
            fputcsv($output, []);
            fputcsv($output, ['SUMMARY']);
            fputcsv($output, ['Total Products',    $data['totals']['total_products']    ?? 0]);
            fputcsv($output, ['Total Stock Value', $data['totals']['total_stock_value'] ?? 0]);
            fputcsv($output, []);
            fputcsv($output, ['BY CATEGORY']);
            fputcsv($output, ['Category', 'Total Items', 'Total Value']);
            foreach ($data['by_category'] as $row) {
                fputcsv($output, [
                    $row['category_name'] ?? 'Uncategorised',
                    $row['total_items'],
                    $row['total_value'],
                ]);
            }
            fputcsv($output, []);
            fputcsv($output, ['ALL PRODUCTS']);
            fputcsv($output, ['ID', 'Code', 'Name', 'Brand', 'Category', 'Purchase Price']);
            foreach ($data['products'] as $p) {
                fputcsv($output, [
                    $p['product_id'],
                    $p['product_code'],
                    $p['name'],
                    $p['brand'],
                    $p['category_name'] ?? '—',
                    $p['purchase_price'],
                ]);
            }
        })(),

        'service' => (function() use ($output, $data) {
            fputcsv($output, ['SERVICE REPORT']);
            fputcsv($output, ['From', $data['from'], 'To', $data['to']]);
            fputcsv($output, []);
            fputcsv($output, ['SUMMARY']);
            fputcsv($output, ['Total Requests', $data['totals']['total_requests'] ?? 0]);
            foreach ($data['summary'] as $s) {
                fputcsv($output, [ucfirst($s['warranty_status']), $s['total']]);
            }
            fputcsv($output, []);
            fputcsv($output, ['SERVICE REQUESTS']);
            fputcsv($output, ['ID', 'Customer', 'Phone', 'Product', 'Delivery Date', 'Warranty']);
            foreach ($data['requests'] as $r) {
                fputcsv($output, [
                    '#' . $r['service_request_id'],
                    $r['customer_name']  ?? '—',
                    $r['phone']          ?? '—',
                    $r['product_name']   ?? '—',
                    $r['delivery_date'],
                    $r['warranty_status'] === 'yes' ? 'In Warranty' : 'Out of Warranty',
                ]);
            }
        })(),

        'purchase' => (function() use ($output, $data) {
            fputcsv($output, ['PURCHASE REPORT']);
            fputcsv($output, ['From', $data['from'], 'To', $data['to']]);
            fputcsv($output, []);
            fputcsv($output, ['SUMMARY']);
            fputcsv($output, ['Total Purchases', $data['summary']['total_purchases'] ?? 0]);
            fputcsv($output, ['Total Spent',     $data['summary']['total_spent']     ?? 0]);
            fputcsv($output, []);
            fputcsv($output, ['BY PAYMENT STATUS']);
            fputcsv($output, ['Status', 'Count', 'Amount']);
            foreach ($data['by_status'] as $s) {
                fputcsv($output, [ucfirst($s['payment_status']), $s['total'], $s['amount']]);
            }
            fputcsv($output, []);
            fputcsv($output, ['PURCHASE LIST']);
            fputcsv($output, ['ID', 'Date', 'Supplier', 'Total', 'Payment Status']);
            foreach ($data['purchases'] as $p) {
                fputcsv($output, [
                    '#' . $p['purchase_id'],
                    $p['purchase_date'],
                    $p['supplier_phone'] ?? '—',
                    $p['total_amount'],
                    ucfirst($p['payment_status']),
                ]);
            }
        })(),
    };

    fclose($output);
    exit;
}
}
 