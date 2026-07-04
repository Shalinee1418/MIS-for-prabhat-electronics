<?php

use Sarma\MisForPrabhatElectronics\App\Models\Supplier;
use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

$suppliers = Supplier::all();
$stockItem  = new StockItem();
$products = $stockItem->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Purchase</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <style>
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 6px 10px;
            text-align: left;
        }

        input[type="number"],
        input[type="text"],
        select {
            width: 90%;
            padding: 4px;
        }

        .totals-box {
            margin-top: 15px;
            text-align: right;
            line-height: 2;
        }

        .btn-row {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php"; ?>
    </aside>

    <!-- Main Content -->
    <div class="main">

        <div class="header-row">
            <h1>New Purchase</h1>
            <span>Admin</span>
        </div>

        <!-- Build a JS-accessible product map for per/unit lookups -->
        <script>
            const productPerMap = {
                <?php foreach ($products as $product): ?>
                    "<?= $product['product_id'] ?>": "<?= htmlspecialchars($product['per']) ?>",
                <?php endforeach; ?>
            };
        </script>

        <form action="/purchase/store" method="post">
            <div class="form-container">

                <div class="top-bar">
                    <span>
                        Supplier:
                        <select name="supplierId" id="supplier-id">
                            <?php foreach ($suppliers as $supplier): ?>
                                <option value="<?= $supplier['supplier_id'] ?>">
                                    <?= $supplier['supplier_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </span>
                    <input type="text" name="purchaseDate" value="<?= date('Y-m-d') ?>" readonly style="padding:5px;">
                </div>

                <table border="1" id="invoiceTable">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Rate (₹)</th>
                            <th>Per</th>
                            <th>GST (%)</th>
                            <th>Amount (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="productId[]" id="product_id0" oninput="calculateRow(0); updatePer(0)">
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['product_id'] ?>"><?= $product['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity[]" id="quantity0" oninput="calculateRow(0)">
                            </td>
                            <td>
                                <input type="number" name="price[]" id="rate0" oninput="calculateRow(0)">
                            </td>
                            <td>
                                <!-- FIX 1: was missing opening <select> tag and had orphaned </select> -->
                                <input type="text" name="per[]" id="per0" readonly>
                            </td>
                            <td>
                                <input type="number" name="gst[]" id="gst0" oninput="calculateRow(0)" value="18">
                            </td>
                            <td>
                                <input type="number" name="subTotal[]" id="amount0" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="totals-box">
                    <div>CGST: ₹<span id="totalCgst">0.00</span></div>
                    <div>SGST: ₹<span id="totalSgst">0.00</span></div>
                  
                    <div><strong>Grand Total: ₹<input type="text" name="totalAmount" id="totalAmount" readonly></strong></div>
                </div>

           
                <div class="btn-row">
                    <button type="button" onclick="addRow()">+ Add Item</button>
                    <button type="submit" class="primary">Submit</button>
                </div>

            </div>
        </form>
    </div>

    <script>
        let count = 1;

      
        function updatePer(index) {
            const productSelect = document.getElementById(`product_id${index}`);
            const perInput = document.getElementById(`per${index}`);
            if (productSelect && perInput) {
                perInput.value = productPerMap[productSelect.value] || '';
            }
        }


        window.addEventListener('DOMContentLoaded', () => updatePer(0));

        function addRow() {
            const tbody = document.querySelector("#invoiceTable tbody");
            const row = tbody.insertRow();

            const productOptions = `<?php foreach ($products as $p): ?><option value="<?= $p['product_id'] ?>"><?= $p['name'] ?></option><?php endforeach; ?>`;

            row.innerHTML = `
                <td>
                    <select name="productId[]" id="product_id${count}"
                        oninput="calculateRow(${count}); updatePer(${count})">
                        ${productOptions}
                    </select>
                </td>
                <td><input type="number" name="quantity[]" id="quantity${count}" oninput="calculateRow(${count})"></td>
                <td><input type="number" name="price[]"    id="rate${count}"     oninput="calculateRow(${count})"></td>
                <td><input type="text"   name="per[]"      id="per${count}"      readonly></td>
                <td><input type="number" name="gst[]"      id="gst${count}"      oninput="calculateRow(${count})" value="18"></td>
                <td><input type="number" name="subTotal[]" id="amount${count}"   readonly></td>
            `;

            updatePer(count); // pre-fill "per" for the newly added row
            count++;
        }

        function calculateRow(index) {
            const quantity = parseFloat(document.getElementById(`quantity${index}`).value) || 0;
            const rate     = parseFloat(document.getElementById(`rate${index}`).value)     || 0;
            const gst      = parseFloat(document.getElementById(`gst${index}`).value)      || 0;

            const amount = quantity * rate;
            const cgst   = (amount * (gst / 2)) / 100;
            const sgst   = (amount * (gst / 2)) / 100;
            const total  = amount + cgst + sgst;

            document.getElementById(`amount${index}`).value = total.toFixed(2);
            updateTotalAmount();
        }

        function updateTotalAmount() {
            let totalAmount = 0;
            let totalCgst   = 0;
            let totalSgst   = 0;

            for (let i = 0; i < count; i++) {
                const quantityEl = document.getElementById(`quantity${i}`);
                const rateEl     = document.getElementById(`rate${i}`);
                const gstEl      = document.getElementById(`gst${i}`);

                if (!quantityEl) continue;

                const quantity = parseFloat(quantityEl.value) || 0;
                const rate     = parseFloat(rateEl.value)     || 0;
                const gst      = parseFloat(gstEl.value)      || 0;

                const amount = quantity * rate;
                const cgst   = (amount * (gst / 2)) / 100;
                const sgst   = (amount * (gst / 2)) / 100;

                totalCgst   += cgst;
                totalSgst   += sgst;
                totalAmount += amount + cgst + sgst;
            }

            document.getElementById("totalCgst").textContent  = totalCgst.toFixed(2);
            document.getElementById("totalSgst").textContent  = totalSgst.toFixed(2);
            document.getElementById("totalAmount").value      = totalAmount.toFixed(2);
        }
    </script>

</body>

</html>