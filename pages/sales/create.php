<?php

use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

$stockItem = new StockItem();
$productNames = $stockItem->getProductName();
$current_date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Entry</title>
</head>

<body>
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <div class="main">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            body {
                background: #f5f5f5;
                padding: 20px;
            }

            .sales-form {
                width: 100%;
                max-width: 1200px;
                margin: auto;
                background: white;
                border: 1px solid #ccc;
            }

            .header {
                background: #3085c3;
                color: white;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .voucher-info {
                padding: 15px;
            }

            .row {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .row label {
                width: 150px;
                font-weight: bold;
            }

            .row input {
                width: 300px;
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .table-container {
                border-top: 1px solid #ccc;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            colgroup col:first-child {
                width: 35%;
            }

            thead {
                background: #f2f2f2;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            td input {
                width: 100%;
                border: none;
                outline: none;
                padding: 4px;
            }

            .bottom {
                display: flex;
                justify-content: space-between;
                padding: 15px;
                gap: 20px;
            }

            .narration {
                flex: 1;
            }

            .narration label {
                display: block;
                margin-bottom: 6px;
                font-weight: bold;
            }

            .narration textarea {
                width: 100%;
                height: 100px;
                resize: none;
                padding: 10px;
                border: 1px solid #ccc;
            }

            .summary {
                width: 260px;
                flex-shrink: 0;
            }

            .summary .field {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .summary label {
                width: 90px;
                font-weight: bold;
                font-size: 14px;
            }

            .summary input {
                flex: 1;
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .footer {
                background: #eaeaea;
                padding: 10px 15px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-top: 1px solid #ccc;
            }

            .btn-row {
                display: flex;
                gap: 8px;
            }

            .footer button {
                padding: 8px 20px;
                cursor: pointer;
                border: 1px solid #ccc;
                border-radius: 4px;
                background: white;
            }

            .footer button.save-btn {
                background: #3085c3;
                color: white;
                border-color: #3085c3;
                font-weight: bold;
            }
        </style>

        <form action="/sale/store" method="post">
            <div class="sales-form">

                <div class="header">
                    <h3>Sales Entry</h3>
                    <span><?php echo $current_date; ?></span>
                </div>

                <div class="voucher-info">
                    <div class="row">
                        <label>Party A/C Name</label>
                        <input type="text" name="party_name">
                    </div>
                    <div class="row">
                        <label>Sales Ledger</label>
                        <input type="text" name="sales_ledger">
                    </div>
                </div>

                <div class="table-container">
                    <table>
                        <colgroup>
                            <col style="width:35%">
                            <col style="width:10%">
                            <col style="width:12%">
                            <col style="width:13%">
                            <col style="width:10%">
                            <col style="width:20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Rate</th>
                                <th>GST %</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="itemTable">
                            <tr>
                                <td><input type="text" name="items[0][name]"></td>
                                <td><input type="number" class="qty" name="items[0][qty]" min="0"></td>
                                <td><input type="text" name="items[0][unit]"></td>
                                <td><input type="number" class="rate" name="items[0][rate]" min="0"></td>
                                <td><input type="number" class="gst" name="items[0][gst]" min="0"></td>
                                <td><input type="number" class="amount" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bottom">
                    <div class="narration">
                        <label><b>Narration</b></label>
                        <textarea name="narration"></textarea>
                    </div>
                    <div class="summary">
                        <div class="field">
                            <label>Total</label>
                            <input type="text" id="total" name="total" readonly>
                        </div>
                        <div class="field">
                            <label>CGST</label>
                            <input type="text" id="cgst" name="cgst" readonly>
                        </div>
                        <div class="field">
                            <label>SGST</label>
                            <input type="text" id="sgst" name="sgst" readonly>
                        </div>
                        <div class="field">
                            <label>Discount</label>
                            <input type="text" id="discount" name="discount">
                        </div>
                        <div class="field">
                            <label>Sub Total</label>
                            <input type="text" id="subtotal" name="subtotal" readonly>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="btn-row">
                        <button type="button" onclick="addRow()">+ Add Row</button>
                        <button type="button" onclick="removeRow()">− Remove Row</button>
                    </div>
                    <button type="submit" class="save-btn">Save Sale</button>
                </div>

            </div>
        </form>

        <script>
            let rowIndex = 1;

            function addRow() {
                const table = document.getElementById('itemTable');
                const row = document.createElement('tr');
                row.innerHTML = `
                <td><input type="text" name="items[${rowIndex}][name]"></td>
                <td><input type="number" class="qty" name="items[${rowIndex}][qty]" min="0"></td>
                <td><input type="text" name="items[${rowIndex}][unit]"></td>
                <td><input type="number" class="rate" name="items[${rowIndex}][rate]" min="0"></td>
                <td><input type="number" class="gst" name="items[${rowIndex}][gst]" min="0"></td>
                <td><input type="number" class="amount" readonly></td>
            `;
                table.appendChild(row);
                rowIndex++;
            }

            function removeRow() {
                const table = document.getElementById('itemTable');
                if (table.rows.length > 1) {
                    table.deleteRow(table.rows.length - 1);
                    calculateTotal();
                }
            }

            function calculateTotal() {
                let subtotal = 0,
                    totalGst = 0;
                document.querySelectorAll('#itemTable tr').forEach(row => {
                    const qty = parseFloat(row.querySelector('.qty').value) || 0;
                    const rate = parseFloat(row.querySelector('.rate').value) || 0;
                    const gst = parseFloat(row.querySelector('.gst').value) || 0;
                    const base = qty * rate;
                    subtotal += base;
                    totalGst += base * (gst / 100);
                });
                const discount = parseFloat(document.getElementById('discount').value) || 0;
                const half = totalGst / 2;
                document.getElementById('total').value = subtotal.toFixed(2);
                document.getElementById('cgst').value = half.toFixed(2);
                document.getElementById('sgst').value = half.toFixed(2);
                document.getElementById('subtotal').value = (subtotal + totalGst - discount).toFixed(2);
            }

            document.addEventListener('input', function(e) {
                const t = e.target;
                if (t.classList.contains('qty') || t.classList.contains('rate') || t.classList.contains('gst')) {
                    const row = t.closest('tr');
                    const qty = parseFloat(row.querySelector('.qty').value) || 0;
                    const rate = parseFloat(row.querySelector('.rate').value) || 0;
                    const gst = parseFloat(row.querySelector('.gst').value) || 0;
                    const base = qty * rate;
                    row.querySelector('.amount').value = (base + base * (gst / 100)).toFixed(2);
                    calculateTotal();
                }
                if (t.id === 'discount') calculateTotal();
            });
        </script>

    </div>
</body>

</html>