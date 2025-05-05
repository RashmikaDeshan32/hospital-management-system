<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
  <style>
   

   .wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Full height of viewport */
}
    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 24px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .form-group input {
      width: 94%;
      padding: 12px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .form-group input:focus {
      border-color: #007BFF;
      outline: none;
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background-color:darkgreen;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color:limegreen;
    }

    .form-footer {
      text-align: center;
      margin-top: 16px;
    }

    .form-footer a {
      color: #007BFF;
      text-decoration: none;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
@include('header')
<div class="wrapper">
  <div class="login-container">
    <h2>Login</h2>
    <form action="/login" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="submit-btn">Login</button>
      
      <div class="form-footer">
        <p>Don't have an account? <a href="/select-register">Register here</a></p>
      </div>
    </form>
  </div>
</div>

</body>
</html>
