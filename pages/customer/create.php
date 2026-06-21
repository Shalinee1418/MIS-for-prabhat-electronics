<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Entry</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f0f2f5;
        }

        .main {
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 100vh;
            min-width: 0;
        }

        .customer-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;        /* was max-width: 600px — removed */
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-header {
            background: #0a1628;
            color: white;
            padding: 12px 20px;
            border-radius: 4px 4px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-header h2 {
            font-size: 16px;
            font-weight: 500;
            color: white;
        }

        .form-body {
            flex: 1;
            padding: 30px;
        }

        .field {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .field label {
            width: 180px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            padding-top: 7px;
        }

        .field input,
        .field textarea {
            flex: 1;
            min-width: 0;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .field textarea {
            height: 90px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }
        .field-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .field-row .sub-label {
            width: 180px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 400;
            color: #333;
        }

        .field-row .sub-input {
            flex: 1;
            min-width: 0;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .field-row .pincode-label {
            width: 120px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            padding-left: 20px;
        }

        .field-row .pincode-input {
            flex: 1;
            min-width: 0;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .form-footer {
            background: #eaeaea;
            padding: 12px 20px;
            border-top: 1px solid #ddd;
            border-radius: 0 0 4px 4px;
            display: flex;
            justify-content: flex-end;
        }

        .form-footer button {
            padding: 9px 28px;
            background: #3085c3;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <div class="main">
        <form action="/customer/store" method="POST" style="flex:1; display:flex; flex-direction:column;">
            <div class="customer-form">

                <div class="form-header">
                    <h2>Add Customer</h2>
                </div>

                <div class="form-body">
                    <div class="field">
                        <label>Customer Name</label>
                        <input type="text" name="customerName" required placeholder="Full name">
                    </div>
                    <div class="field">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="Phone number">
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email address">
                    </div>

                    <div class="field-row">
                        <span class="sub-label">City</span>
                        <input class="sub-input" type="text" name="city" placeholder="City">
                        <span class="pincode-label">Pincode</span>
                        <input class="pincode-input" type="number" name="pincode" placeholder="Pincode">
                    </div>

                    <div class="field">
                        <label>Address</label>
                        <textarea name="address" placeholder="Full address"></textarea>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit">Save Customer</button>
                </div>

            </div>
        </form>
    </div>

</body>
</html>