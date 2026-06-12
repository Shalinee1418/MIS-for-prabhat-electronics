<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
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

        .stock-form {
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
            align-items: center;
            margin-bottom: 20px;
        }

        .field label {
            width: 180px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 400;
            color: #333;
        }

        .field input {
            flex: 1;
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
        <form action="/stock-item/save" method="post" style="flex:1; display:flex; flex-direction:column;">
            <div class="stock-form">

                <div class="form-header">
                    <h2>New Product</h2>
                    <span>Admin</span>
                </div>

                <div class="form-body">
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Product name">
                    </div>
                    <div class="field">
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" id="brand" placeholder="Brand name">
                    </div>
                    <div class="field">
                        <label for="group">Group</label>
                        <input type="text" name="group" id="group" placeholder="Product group / category">
                    </div>
                    <div class="field">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" placeholder="e.g. Pcs, Box">
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