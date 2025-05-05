<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
                /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Background with image */
        body {
            background: url('/Admin/images/360_F_487692869_V8MZ1hLvhXQZKT50EV8Sh13AkdibGJb3.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login container */
        .login-container {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        /* Form styling */
        .login-form h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        /* Input group */
        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Button styling */
        button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            background-color:darkgreen;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 36px;
        }

        button:hover {
            background-color:limegreen;
        }

        /* Forgot password link */
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-password a {
            text-decoration: none;
            color: #007bff;
            font-size: 0.9rem;
        }

        .forgot-password a:hover {
            color: #0056b3;
        }
        /* Error message styling */
        .error-message {
            color: #ff0000;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="{{route('login')}}" method="post">
            @csrf
            <h2>Staff Login</h2>
                      <!-- Email Field -->
                      <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            <button type="submit">Login</button>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </div>
</body>
</html>
