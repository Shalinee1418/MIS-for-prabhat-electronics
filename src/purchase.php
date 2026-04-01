<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
    </header>
    <main>
        <h2> Purchases </h2>
        <br>
        <a href="new-purchase.php" ><button class="button">New Purchase</button></a>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Purchase No.</th>
                    <th>Invoice No.</th>
                    <th>Invoice Date</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </main>
</body>

</html>