<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <style>
        .date-row {
            margin-top: 20px;
            color: #555;
            margin-left: 1000px;
            align-items: end;
        }

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
            <h1>New Purchase</h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <form action="/purchase/store" method="post">
            <div class="form-container">
                <div class="customer">
                    <div class="left">
                        <span>
                            <p>Supplier name : <input type="text" name="supplierName" id="supplier-name"> </p>
                        </span>
                        <span>
                            <div class="date-row">
                                <?php $current_date = date('d-m-Y'); ?>
                                <input type="text" value="<?= $current_date ?>" readonly style="text-align: right; padding: 5px">
                        </span>
                    </div>

                    <div class="header-row">
                        <span>New purchase</span>
                        <span>Admin</span>
                    </div>

                    <table border="1" id="invoiceTable">
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="item" id="item" list="product_names">
                                <datalist id="product_names">
                                    <?php foreach ($purchaseName as $purchaseName) { ?>
                                        <option value="<?= $purchaseName[0] ?>"></option>
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
    </div>
    </div>
</body>

</html>