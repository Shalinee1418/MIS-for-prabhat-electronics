<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>New Supplier Form</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f1f1f3;
            padding:20px;
        }

        .title-box{
            background:white;
            padding:30px;
            border-radius:12px;
            margin-bottom:25px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        .title-box h1{
            font-size:48px;
            font-weight:bold;
        }

        .form-container{
            background:white;
            padding:40px;
            border-radius:12px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        .form-group{
            display:flex;
            align-items:flex-start;
            margin-bottom:30px;
            gap:40px;
        }

        .form-group label{
            width:250px;
            font-size:20px;
            font-weight:bold;
        }

        .form-group span{
            color:red;
        }

        .input-area{
            flex:1;
        }

        .input-area p{
            color:#666;
            margin-bottom:10px;
            font-size:16px;
        }

        input,
        textarea{
            width:100%;
            padding:15px;
            border:1px solid #cfcfcf;
            border-radius:6px;
            font-size:16px;
        }

        textarea{
            height:120px;
            resize:vertical;
        }

        .btn{
            background:#0d6efd;
            color:white;
            border:none;
            padding:14px 30px;
            font-size:20px;
            border-radius:8px;
            cursor:pointer;
        }

        .btn:hover{
            background:#0b5ed7;
        }
    </style>
</head>
<body>

    <div class="title-box">
        <h1>New Supplier</h1>
    </div>

    <div class="form-container">

        <div class="form-group">
            <label>
                Supplier Name <span>*</span>
            </label>

            <div class="input-area">
                <p>Enter the full name of the supplier.</p>
                <input type="text">
            </div>
        </div>

        <div class="form-group">
            <label>
                Phone Number <span>*</span>
            </label>

            <div class="input-area">
                <p>Enter a valid contact number.</p>
                <input type="text">
            </div>
        </div>

        <div class="form-group">
            <label>
                Email <span>*</span>
            </label>

            <div class="input-area">
                <p>Enter a valid email address.</p>
                <input type="email">
            </div>
        </div>

        <div class="form-group">
            <label>
                Address <span>*</span>
            </label>

            <div class="input-area">
                <p>Enter the complete address.</p>
                <textarea></textarea>
            </div>
        </div>

        <button class="btn">Submit</button>

    </div>

</body>
</html>