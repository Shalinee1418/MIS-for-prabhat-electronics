
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Form</title>
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
        }

        .supplier-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-header {
            background: #3085c3;
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

        .form-header span {
            font-size: 13px;
            color: #d6eaf8;
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
            padding-top: 9px;
        }

        .field label span {
            color: red;
        }

        .field input,
        .field textarea {
            flex: 1;
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
        <form action="/supplier/store" method="post" style="flex:1; display:flex; flex-direction:column;">
            <div class="supplier-form">

                <div class="form-header">
                    <h2>New Supplier</h2>
                    <span>Admin</span>
                </div>

                <div class="form-body">
                    <div class="field">
                        <label>Supplier Name <span>*</span></label>
                        <input type="text" name="supplierName" placeholder="Enter the full name of the supplier" required>
                    </div>
                    <div class="field">
                        <label>Phone Number <span>*</span></label>
                        <input type="text" name="phone" placeholder="Enter a valid contact number" required>
                    </div>
                    <div class="field">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email" placeholder="Enter a valid email address" required>
                    </div>
                    <div class="field">
                        <label>Address <span>*</span></label>
                        <textarea name="address" placeholder="Enter the complete address" required></textarea>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>

</body>
</html>