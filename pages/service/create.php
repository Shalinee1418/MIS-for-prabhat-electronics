<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New service </title>
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
            <h1>New Service Request</h1>
            <span>Admin</span>
        </div>

        <!-- Table -->
        <div class="form-container">
            <form action="" class="form-type-1" method="post">
                <label for="">Sl No:-</label>
                <input type="number" name="" id="">
                <label for="">Type</label>
                <input type="text" name="" id="">
                <label for="">Device</label>
                <input type="text" name="" id="">
                <label for="">Issue</label>
                <input type="text" name="" id="">
                <label for="">Service Required</label> 
                <select name="serviceRequired">
                    <option value="Repairing">Repair</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <label for="">Customer Detail</label>
                <input type="text" name="" id="">
                <label for="">Estimate Cost </label>
                <input type="text" name="" id="">


                <button class="primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>