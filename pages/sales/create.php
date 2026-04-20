<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="form-container">
    <p> Sale No: <input type="text"></p>
    <div class="Id"></div>
</div>
<div class="customer">
    <div class="left">
        <p> Customer name : <input type="text"></p>
</div>
   <!DOCTYPE html>
<html>
<head>
    <title>Dynamic Invoice</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
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
</table>

<button onclick="addRow()">Add Item</button>

<script>
let count = 1;

function addRow() {
    let table = document.getElementById("invoiceTable");

    let row = table.insertRow();

    row.innerHTML = ` 
        <td><input type="text" name="item${count}"></td>
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