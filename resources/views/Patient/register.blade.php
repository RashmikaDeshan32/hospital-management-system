<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-size: 16px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
        }

        .btn {
            background-color: darkgreen;
        }

        .btn:hover {
            background-color: limegreen;
        }

        .form-control {
            font-size: 16px !important;
            border: 1px solid #ced4da !important;
            border-radius: 4px;
            padding: 10px;
            box-shadow: none !important;
            visibility: visible !important;
            display: block;
        }

        .form-control:focus {
            border-color: #007bff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
            outline: none !important;
        }

        #registrationForm {
            border: 1px solid #ced4da; /* Adding border */
            border-radius: 10px; /* Adding border radius for rounded corners */
            padding: 20px; /* Adding padding inside the form */
            background-color: #ffffff; /* Adding background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Adding a subtle shadow for a better look */
        }

        .form-section {
            margin-bottom: 20px; /* Adding space between sections */
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mt-5">Patient Registration</h2>
                <form id="registrationForm" class="mt-4" action="{{ route('register.patient')}}" method="post">
                    @csrf
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Personal Information</h5>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name" name="last_name"  value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter your phone number" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="national_id">National ID</label>
                                    <input type="tel" id="national_id" class="form-control @error('national_id') is-invalid @enderror" placeholder="Enter your National ID" name="national_id" value="{{ old('national_id') }}" required>
                                    @error('national_id')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" class="form-control  @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                                    @error('dob')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Account Information</h5>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select id="city" class="form-control  @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                        @endforeach
                                       
                                    </select>
                                    @error('city')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Street</label>
                                    <textarea id="address" class="form-control @error('street') is-invalid @enderror" placeholder="Enter your address" rows="3" name="street" required>{{ old('street') }}</textarea>
                                    @error('street')
                                        <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" value="{{ old('password') }}" required>
                                    @error('password')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" id="confirmPassword" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm your password" name="password_confirmation"  value="{{ old('confirm_password') }}"  required>
                                    @error('confirm_password')
                                    <div style="color:red" id="first_name_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block">Register</button>
                    <div class="form-footer text-center">
                        <p>Already have an account? <a href="/login-form">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>



    
</body>
</html>
