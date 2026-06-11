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
    <style>

    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <!-- Main Content -->
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
            }

            .table-container {
                border-top: 1px solid #ccc;
            }

            table {
                width: 100%;
                border-collapse: collapse;
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

            input[type="text"],
            input[type="number"] {
                width: 100%;
                border: none;
                outline: none;
                padding: 5px;
            }

            .add-btn {
                margin: 10px;
                padding: 5px 12px;
                cursor: pointer;
            }

            .bottom {
                display: flex;
                justify-content: space-between;
                padding: 15px;
            }

            .narration {
                width: 65%;
            }

            .narration textarea {
                width: 100%;
                height: 100px;
                resize: none;
                padding: 10px;
            }

            .summary {
                width: 30%;
            }

            .summary .field {
                display: flex;
                margin-bottom: 10px;
            }

            .summary label {
                width: 100px;
                font-weight: bold;
            }

            .summary input {
                flex: 1;
                padding: 6px;
            }

            .footer {
                background: #eaeaea;
                padding: 10px;
                display: flex;
                justify-content: space-around;
            }

            .footer button {
                padding: 8px 20px;
                cursor: pointer;
            }
        </style>
        </head>

        <body>
            <form action="/sale/store" method="post">


                <div class="sales-form">

                    <div class="header">
                        <h3>Sales Entry</h3>
                        <span><?php echo $current_date; ?></span>
                    </div>

                    <div class="voucher-info">

                        <div class="row">
                            <label>Party A/C Name</label>
                            <input type="text">
                        </div>

                        <div class="row">
                            <label>Sales Ledger</label>
                            <input type="text">
                        </div>

                    </div>

                    <div class="table-container">

                        <table>
                            <thead>
                                <tr>
                                    <th width="50%">Item Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Rate</th>
                                    <th>GST %</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody id="itemTable">
                                <tr>
                                    <td><input type="text"></td>
                                    <td><input type="number" class="qty"></td>
                                    <td><input type="text"></td>
                                    <td><input type="number" class="rate"></td>
                                    <td><input type="number" class="gst"></td>
                                    <td><input type="number" class="amount" readonly></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                    <div class="bottom">

                        <div class="narration">
                            <label><b>Narration</b></label>
                            <textarea></textarea>
                        </div>

                        <div class="summary">

                            <div class="field">
                                <label>Total</label>
                                <input type="text" id="total" readonly>
                            </div>

                            <div class="field">
                                <label>CGST</label>
                                <input type="text">
                            </div>

                            <div class="field">
                                <label>SGST</label>
                                <input type="text">
                            </div>

                            <div class="field">
                                <label>Discount</label>
                                <input type="text">
                            </div>

                            <div class="field">
                                <label>Sub Total</label>
                                <input type="text">
                            </div>

                        </div>

                    </div>

                    <div class="footer">

                        <div class="btn-row">
                            <button type="button" onclick="addRow()">Add Row</button>
                            <button type="button" onclick="removeRow()">Remove Row</button>
                        </div>

                        <br>

                        <button type="submit">Save Sale</button>

            </form>

            <script>
                row.innerHTML = `
                   
                function addRow() {

                    const table = document.getElementById('itemTable');

                    const row = document.createElement('tr');
                     <td><input type="text"></td>
                    <td><input type="number" class="qty"></td>
                    <td><input type="text"></td>
                    <td><input type="number" class="rate"></td>
                    <td><input type="number" class="gst"></td>
                    <td><input type="number" class="amount" readonly></td>
               

      
                    table.appendChild(row);
                }
 `;

                function removeRow() {

                    const table = document.getElementById('itemTable');

                    if (table.rows.length > 1) {
                        table.deleteRow(table.rows.length - 1);
                    }
                }
                document.addEventListener('input', function (e) {
                    if (e.target.classList.contains('qty') || e.target.classList.contains('rate') || e.target.classList.contains('gst')) {
                        const row = e.target.closest('tr');
                        const qty = parseFloat(row.querySelector('.qty').value) || 0;
                        const rate = parseFloat(row.querySelector('.rate').value) || 0;
                        const gst = parseFloat(row.querySelector('.gst').value) || 0;

                        const amount = qty * rate;
                        const gstAmount = amount * (gst / 100);
                        row.querySelector('.amount').value = (amount + gstAmount).toFixed(2);

                        calculateTotal();
                    }
                });
            </script>

        </body>

</html>