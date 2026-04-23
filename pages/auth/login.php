<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <img src="/assets/images/Prabhat_electronics.png" alt="Official_Photo">
  <style>
    * {
      margin: 10;
      padding: 20;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 500px;
      margin-top: 100px;
      padding-right: 200px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: whitesmoke;

    }
    
   .login-container {
      display: grid;
      justify-content: center;
      background: skyblue;
      margin: 300px;
      padding: 10px;
      align-content: center;
      border-radius: 20px;
      width: 500px;
      height: 500px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
    }


    /* .input{
      width: 80%;
      margin-bottom: 15px;
      text-align: left;
      border: #1e293b;
      max-width: 20px;
      margin: 30px;
      padding: 20px;
      
    }
    .login-container h1{
      text-decoration: underline;
      margin-top: 0px;
    
    }

    /* .input-group {
      font-size: 15px;
      margin-bottom: 10px;
      display: block;
      color: rgb(52, 156, 201);
    } */

    /* .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      
    }

    .input-group input:focus {
      border-color: #1e293b;
    } */

     /*.login-btn {
      width: 30px;
      padding: 50px;
      background: #1e293b;
      color: white;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      font-size: 30px;
      margin-top: 10px;
    }

    .login-btn:hover {
      background: #0f172a;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 15px;
      color: #555;
    }

    .footer-text a {
      color: #1e293b;
      text-decoration: none;
      font-weight: bold;
    } */
      input {
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

button {
  background-color: #2b7cff;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 6px;
  cursor: pointer;
}

button:hover {
  background-color: #1a5edb;
}

  </style>
</head>
<div>
<body>
  
  <form action="/auth/authenticate" method="post">
    <div class="login-container">
      <h1> Login - Prabhat Electronics !</h1>
     
          <input type="text" name="user_id" id="user_id" placeholder="User Id">
          <br>
    
            <input type="password" name="password" id="password" placeholder="Password">
        <br>
        
            <button type="submit">Login</button>
        <br>

         <div class="footer-text">
    Forgot password? <a href="#">Reset</a>
  </div>

    </div>
    </form>
</div>
</div>
</form>
 
</span>
  </div>


</body>

</html>