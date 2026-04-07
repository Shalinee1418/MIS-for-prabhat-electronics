<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      margin: 10;
      padding: 20;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #c0c5d1, #506fa1);
    }

    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 320px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #1e293b;
    }

    .input-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .input-group label {
      font-size: 14px;
      margin-bottom: 25px;
      display: block;
      color: rgb(42, 128, 165);
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .input-group input:focus {
      border-color: #1e293b;
    }

    .login-btn {
      width: 100%;
      padding: 10px;
      background: #1e293b;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    .login-btn:hover {
      background: #0f172a;
    }

    .footer-text {
      margin-top: 15px;
      font-size: 13px;
      color: #555;
    }

    .footer-text a {
      color: #1e293b;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

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