<?php

use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

$stockItem = new StockItem();
$productNames = $stockItem->getProductName();
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

        <!-- Header -->
        <div class="header">
            <h1>New Sale </h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <form action="/sale/store" method="post">
            <div class="form-container">

                <div class="Id"></div>
            </div>
            <div class="customer">
                <div class="left">
                    <p> Customer name : <input type="text"></p>
                    <Br>
                    </Br>
                </div>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th,
                    td {
                        padding: 10px;
                    }

                    input {
                        width: 100%;
                    }

                    button {
                        margin-top: 10px;
                        padding: 8px 15px;
                    }
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
        </script>


</body>

</html>