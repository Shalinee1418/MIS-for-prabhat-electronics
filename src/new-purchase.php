<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PE-New Purchase</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
    </header>
    <main>
        <section>
            <h2> Purchase Form </h2>
            <form class="form-1">
                <span>
                    <label for="Purchase"> Purchase No:</label>
                    <input type="text" id="name" purchase="name">
                </span>
                <span class="column-2">
                    <label for="name"> Invoice No: </label>
                    <input type="text" id="name" name="name">
                </span>
                <span>
                    <label for="supplier">Supplier</label>
                    <input type="text" name="supplier" id="supplier">
                </span>
                <span class="column-2">
                    <label for="invoice_date">Invoice Date</label>
                    <input type="text" name="invoice_date" id="invoice_date">
                </span>
                <table>
                        <thead>
                            <tr>
                                <th>Name of the Item</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Unit</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="name_of_the_item" id="name_of_the_item"></td> 
                                <td><input type="text" name="quantity" id="quantity"></td>
                                <td><input type="text" name="rate" id="rate"></td>
                                <td><input type="text" name="unit" id="unit"></td>
                                <td><input type="text" name="amount" id="amount"></td>
                            </tr>
                            <tr>
                                <td><button class="button">Submit</button></td>
                            </tr>
                        </tbody>
                </table>
            </form>
        </section>
</body>

</html>