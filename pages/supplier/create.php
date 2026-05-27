<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <!-- Main Content -->
    <div class="main">

        <!-- Header -->
        <div class="header">
            <h1>New Supplier</h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <div class="form-container">
            <form action="" class="form-type-1" method="post">
                <div>
                    <label for="">Supplier Name</label>
                    <input type="text" name="" id="">
                    <label for="">Phone Number</label>
                    <input type="text" name="" id="">
                    <label for="">Email</label>
                    <input type="text" name="" id="">
                    <label for="">Address</label>
                    <input type="text" name="" id="">



                    <button class="primary">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>