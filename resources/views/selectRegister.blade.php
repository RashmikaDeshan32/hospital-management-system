<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Navigation</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-size: 16px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            font-size: 24px;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            text-align: center;
            padding: 30px;
            border: 2px solid #007bff;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 50px;
            color:green;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #303137 !important;
            color: white;
        }

        .btn:hover {
            background-color:#f8f9fa;
        }

    </style>
</head>
<body>
    @include('header')

    <div class="container">
        <div class="row justify-content-center">
            <!-- Patient Registration Box -->
            <div class="col-md-4">
                <div class="card">
                    <i class="fas fa-user-injured icon"></i>
                    <h3>Patient Registration</h3>
                    <p>Register as a patient to access medical services.</p>
                    <a href="/patient/regiter-form" class="btn btn-primary">Register Now</a>
                </div>
            </div>

            <!-- Doctor Registration Box -->
            <div class="col-md-4">
                <div class="card">
                    <i class="fas fa-user-md icon"></i>
                    <h3>Doctor Registration</h3>
                    <p>Register as a doctor to manage patients and appointments.</p>
                    <a href="/doctor/regiter-form" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and FontAwesome Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
