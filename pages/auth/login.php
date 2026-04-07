<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="assets/css/style.css">
<body>
    <h1> Login - Prabhat Electronics !</h1>
    <form action="/auth/authenticate" method="post">
      <div class="cards">
        <div class="card"><span>
        <input type="text" name="user_id" id="user_id" placeholder="User Id">
        <input type="password" name="password" id="password" placeholder="Password">
        </span>
        <button>Login</button>
    </form>
        <div class="footer-text">
      Forgot password? <a href="#">Reset</a>
    </div>
  </div>


</body>
</html>