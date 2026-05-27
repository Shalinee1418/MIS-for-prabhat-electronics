<!DOCTYPE html>
<html>

<head>
    <title>Customer Entry</title>
    <style>
        .body {
            align-content: normal;
        }

        .container {
            width: 400px;
            margin: right;
        }

        label {
            margin-right: 20px;
        }

        label {
            display: grid;
            align-items: center;
            gap: 20px;
        
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>
    <div class="main">
        <div class="header">

            <div class="container">
 
                <h2>Add Customer</h2>

                <form action="/customer/store" method="POST">
                    <div>
                        <label>Customer Name</label>
                        <input type="text" name="customerName" required>
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="phone">
                    </div>
                    <div>
                        <label>pincode</label>
                        <input type="number" name="pincode">
                    </div>
                    <div>
                        <label>city</label>
                        <input type="text" name="city">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Address</label>
                        <textarea name="address"></textarea>
                    </div>
                    <button type="submit">Save Customer</button>

                </form>

            </div>

</body>

</html>
