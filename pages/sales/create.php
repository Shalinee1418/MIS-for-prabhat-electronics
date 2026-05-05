<?php

use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

$stockItem = new StockItem();
$productNames = $stockItem->getProductName();

$current_date = date('d-m-Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Sale</title>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <!-- Main Content -->
    <div class="main">
        <div class="header">
            <h1>New Sale </h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <form action="/sale/store" method="post">
            <div class="form-container">
                <div class="customer">
                    <div class="left">
                        <span>
                            <p>Customer name : <input type="text"> </p>
                        </span>
                        <span>
                            <div class="date-row">
                                <input type="text" value="<?= $current_date ?>" readonly>

                        </span>
                    </div>
                    <style>
                        .header-row {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            font-weight: bold;
                        }

                        .date-row {
                            margin-top: 5px;

                            color: #555;
                        }
                    </style>

                    <div class="header-row">
                        <span>New Sale</span>
                        <span>Admin</span>
                    </div>


                    </style>
                    </head>

                    <body>

                        <table border="1" id="invoiceTable">
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Per</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="item" id="item" list="product_names">
                                    <datalist id="product_names">
                                        <?php foreach ($productNames as $productName) { ?>
                                            <option value="<?= $productName[0] ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                </td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                            </tr>
                        </table>
                        <button class="primary">Submit</button>

                        <button type="button" onclick="addRow()">Add Item</button>
        </form>

        <script>
            let count = 1;

            function addRow() {
                let table = document.getElementById("invoiceTable");

                let row = table.insertRow();

                row.innerHTML = ` 
        <td><input type="text" name="item${count}" list="product_names"></td>
        <td>
            <label></label>
            <input type="number" name="qty${count}">
        </td>
        <td>
            <label></label>
            <input type="number" name="rate${count}">
        </td>
        <td><input type="text" name="per${count}"></td>
        <td><input type="number" name="amount${count}"></td>
        
    `;

                count++;
            }

            function calculateGST() {

            
                    let subtotal = 0;
                document.querySelectorAll('[id^="rowamount"]').forEach(input => {
                    subtotal += parseFloat(input.value) || 0;
                });

                let subtotalEl = document.getElementById('amount');
                if (subtotalEl) subtotalEl.value = subtotal.toFixed(2);

                let gstRate = parseFloat(document.getElementById('gstRate').value) || 0;

                let cgst = (subtotal * (gstRate / 2)) / 100;
                let sgst = (subtotal * (gstRate / 2)) / 100;
                let total = subtotal + cgst + sgst;

                let cgstEl = document.getElementById('cgst');
                let sgstEl = document.getElementById('sgst');
                let totalEl = document.getElementById('total');

                if (cgstEl) cgstEl.value = cgst.toFixed(2);
                if (sgstEl) sgstEl.value = sgst.toFixed(2);
                if (totalEl) totalEl.value = total.toFixed(2);
            }
        </script>

        </script>


</body>

</html>