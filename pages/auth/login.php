<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login!</h1>
    <form action="/auth/authenticate" method="post">
        <input type="text" name="user_id" id="user_id" placeholder="User Id">
        <input type="password" name="password" id="password" placeholder="Password">
        <button>Login</button>
    </form>
</body>
</html>