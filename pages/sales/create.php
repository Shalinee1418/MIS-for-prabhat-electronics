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
            <form action="" class="form-type-1"> 
            <label for="">Customer Name :</label>
                <input type="text" name="" id="">
                <label for="">Phone Number :</label>
                <input type="text" name="" id="">
                <label for="">Product :</label>
                <input type="text" name="" id="">
                <label for="">Quantity:</label>
                <input type="text" name="" id="">
                <button class="primary">Add Sale</button>
            </form>
        </div>
    </div>
</body>

</html>