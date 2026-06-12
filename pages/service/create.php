<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Service Request</title>
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

       
        .service-form {
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

        .field input,
        .field select {
            flex: 1;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .field select {
            cursor: pointer;
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
        <form action="" method="post" style="flex:1; display:flex; flex-direction:column;">
            <div class="service-form">

                <div class="form-header">
                    <h2>New Service Request</h2>
                    <span>Admin</span>
                </div>

                <div class="form-body">
                    <div class="field">
                        <label>Sl No.</label>
                        <input type="number" name="sl_no" placeholder="Serial number">
                    </div>
                    <div class="field">
                        <label>Type</label>
                        <input type="text" name="type" placeholder="Service type">
                    </div>
                    <div class="field">
                        <label>Device</label>
                        <input type="text" name="device" placeholder="Device name / model">
                    </div>
                    <div class="field">
                        <label>Issue</label>
                        <input type="text" name="issue" placeholder="Describe the issue">
                    </div>
                    <div class="field">
                        <label>Service Required</label>
                        <select name="serviceRequired">
                            <option value="">-- Select --</option>
                            <option value="Repairing">Repair</option>
                            <option value="Replacement">Replacement</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Inspection">Inspection</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Customer Detail</label>
                        <input type="text" name="customer_detail" placeholder="Customer name / ID">
                    </div>
                    <div class="field">
                        <label>Estimate Cost</label>
                        <input type="text" name="estimate_cost" placeholder="₹ 0.00">
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