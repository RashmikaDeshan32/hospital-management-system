<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

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
  
@if(session('success'))
    <script>
         swal("'Your registration is done successfully!","{{ Session::get('message') }}",'success',{
            button:true,
            button:"OK",
     
        });
    </script>
@endif

@include('header')@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
        <strong>Error!</strong> {{ $errors->first() }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="wrapper">
  <div class="login-container">
    <h2>Login</h2>
    <form action="/login" method="POST" >
      @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                <div class="error-message">{{ $errors->first('email') }}</div>
              @endif
        </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
          @if ($errors->has('password'))
            <div class="error-message">{{ $errors->first('password') }}</div>
          @endif
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
