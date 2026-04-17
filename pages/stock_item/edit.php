<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
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
            <h1>Edit Stock Item</h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <div class="form-container">
            <form action="/stock-item/save" method="post" class="form-type-1">
                <span class="input-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </span>
                <span class="input-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="brand">
                </span>
                <span class="input-group">
                    <label for="group">Group</label>
                    <input type="text" name="group" id="group">
                </span>
                <span class="input-group">
                    <label for="unit">Unit</label>
                    <input type="text" name="unit" id="unit">
                </span>
                <button class="primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>