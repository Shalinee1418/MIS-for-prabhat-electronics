<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
</head>

<body>
    <header>
        <?php require 'header.php'; ?>
    </header>
    <main>
        <aside>
            <?php require 'aside.php' ?>
        </aside>
        <section>
            <h2>Add new product</h2>
            <form class="form-1">
                <span>
                    <label for="name"> product Name: </label>
                    <input type="text" id="name" name="name">
                </span>
                <span>
                    <label for="id"> product-id:</label>
                    <input type="int" id="product" name="product">
                </span>
                <span>
                    <label for="Service">Select Product: </label>
                    <select id="product" name="product">
                        <option value="">-- Choose status of the product --</option>
                        <option value="Delivered">Delivered</option>
                        <option value="other"> Not Delivered </option>
                    </select>
                </span>
                <span>
                    <label for="date">Preferrred Date:</label>
                    <input type="date" id="date" name="time">
                </span>
                <span>
                    <label for="notes"> Additional Notes:</label>
                    <input type="notes" name="notes" rows="4">
                </span>
                <span>
                    
                </span>
                <div>
                    <button class="button">Submit</button>
</div>
            </form>
        </section>
    </main>
    <footer>
        <?php require 'footer.php' ?>
    </footer>
</body>

</html>