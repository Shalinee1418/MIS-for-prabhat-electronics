<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Supplier Form</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f1f1f3;
    padding:20px;
}

/* TOP TITLE BOX */

.header{
    background:white;
    padding:30px;
    border-radius:12px;
    margin-bottom:25px;
}

.header h1{
    font-size:60px;
    font-weight:bold;
}

/* FORM BOX */

.form-box{
    background:white;
    padding:40px;
    border-radius:12px;
}

/* EACH ROW */

.form-group{
    display:flex;
    align-items:flex-start;
    margin-bottom:35px;
}

/* LEFT LABEL */

.form-label{
    width:300px;
}

.form-label label{
    font-size:22px;
    font-weight:bold;
}

.form-label span{
    color:red;
}

/* RIGHT SIDE */

.form-input{
    flex:1;
}

.form-input p{
    color:#666;
    font-size:18px;
    margin-bottom:10px;
}

input,
textarea{
    width:100%;
    padding:15px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

textarea{
    height:140px;
}

/* BUTTON */

button{
    background:#1565ff;
    color:white;
    border:none;
    padding:15px 35px;
    font-size:22px;
    border-radius:8px;
    cursor:pointer;
}

button:hover{
    background:#0d56e0;
}

</style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <div class="header">
        <h1>New Supplier</h1>
    </div>

    <form action="/supplier/store" method="post">
        <div class="form-container">

    <div class="form-group">

        <div class="form-label">
            <label>Supplier Name <span>*</span></label>
        </div>

        <div class="form-input">
            <p>Enter the full name of the supplier.</p>
            <input type="text" name="supplierName" required>
        </div>

    </div>

    <div class="form-group">

        <div class="form-label">
            <label>Phone Number <span>*</span></label>
        </div>

        <div class="form-input">
            <p>Enter a valid contact number.</p>
            <input type="text" name="phone" required>
        </div>

    </div>

    <div class="form-group">

        <div class="form-label">
            <label>Email <span>*</span></label>
        </div>

        <div class="form-input">
            <p>Enter a valid email address.</p>
            <input type="email" name="email" required>
        </div>

    </div>

    <div class="form-group">

        <div class="form-label">
            <label>Address <span>*</span></label>
        </div>

        <div class="form-input">
            <p>Enter the complete address.</p>
            <textarea name="address" required></textarea>
        </div>

    </div>

    <button type="submit">Submit</button>

        </div>
    </form>

</body>
</html>

    

   