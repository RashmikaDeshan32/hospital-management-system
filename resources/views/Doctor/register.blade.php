<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
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

        h2 {
            color: #343a40;
            font-weight: bold;
            font-size: 24px;
        }

        .container {
            margin-top: 20px;
            max-width: 1000px; /* Increased form width */
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

        .btn {
            background-color:darkgreen ;
            font-size: 16px;
        }

        .btn:hover {
            background-color: limegreen;
        }

        /* Border around the form */
        .form-border {
            border: 1px solid #ced4da; /* Adding border */
            padding: 20px;
            border-radius: 10px;
            background-color: #fff; /* Background color inside the border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for better look */
        }

        .add-more-btn {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
@include('header')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center mt-5">Doctor Registration</h2>
                <div class="form-border">
                    <form id="registrationForm" class="mt-4" enctype="multipart/form-data" action="{{route('register.doctor')}}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Left Section -->
                            <div class="col-md-6">
                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Last Name -->
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Specialty Dropdown -->
                                <div class="form-group">
                                    <label for="specialty">Specialty</label>
                                    <select id="specialty" class="form-control @error('specialty') is-invalid @enderror" name="specialty" required>
                                        <option value="">Select Specialty</option>
                                        @foreach($specialities as $speciality)
                                            <option value="{{ $speciality->id }}" {{ old('specialty') == $speciality->id ? 'selected' : '' }}>{{ $speciality->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('specialty')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter your phone number" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- National ID -->
                                <div class="form-group">
                                    <label for="national_id">National ID</label>
                                    <input type="tel" id="national_id" class="form-control @error('national_id') is-invalid @enderror" placeholder="Enter your National ID" name="national_id" value="{{ old('national_id') }}" required>
                                    @error('national_id')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" id="gender_male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" id="gender_female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="gender_female">Female</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Profile Picture Upload -->
                                <div class="form-group">
                                    <label for="profile_picture">Upload Profile Picture</label>
                                    <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture" required>
                                    
                                    @error('profile_picture')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror

                                    @if(isset($doctor) && $doctor->profile_picture)
                                        <div class="mt-2">
                                            <p>Current Profile Picture:</p>
                                            <img src="{{ asset('storage/' . $doctor->profile_picture) }}" alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <!-- Right Section -->
                            <div class="col-md-6">
                                <!-- City -->
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select id="city" class="form-control" name="city" required>
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Street -->
                                <div class="form-group">
                                    <label for="street">Street</label>
                                    <textarea id="address" class="form-control @error('street') is-invalid @enderror" placeholder="Enter your address" rows="3" name="street" required>{{ old('street') }}</textarea>
                                    @error('street')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Qualifications -->
                                <div class="form-group">
                                    <label for="qualification">Qualification</label>
                                    <div id="qualifications-container">
                                        @if(old('qualification') && is_array(old('qualification')))
                                            @foreach(old('qualification') as $index => $qual)
                                                <div class="qualification-row d-flex align-items-center mb-2">
                                                    <input type="text" class="form-control me-2 @error('qualification.*') is-invalid @enderror" placeholder="Enter your qualification" name="qualification[]" value="{{ $qual }}" required>
                                                    <button type="button" class="btn btn-danger remove-qualification-btn">X</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="qualification-row d-flex align-items-center mb-2">
                                                <input type="text" class="form-control me-2 @error('qualification.*') is-invalid @enderror" placeholder="Enter your qualification" name="qualification[]" value="{{ old('qualification.0') }}" required>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-success" id="addQualificationBtn">Add More Qualifications</button>
                                    @error('qualification')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Bio -->
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Tell us about yourself" rows="3" name="bio" required>{{ old('bio') }}</textarea>
                                    @error('bio')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Experience -->
                              

                                <!-- Consultation Fee -->
                                <div class="form-group">
                                    <label for="consultation_fee">Consultation Fee</label>
                                    <input type="text" id="consultation_fee" class="form-control @error('consultation_fee') is-invalid @enderror" placeholder="Enter consultation fee" name="consultation_fee" value="{{ old('consultation_fee') }}" required>
                                    @error('consultation_fee')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required>
                                    @error('password')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm your password" name="password_confirmation" required>
                                    @error('confirm_password')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary  btn-block" style="background-color:green;" id="registerButton" >Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

    <!-- JS to add more qualification fields -->
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    const addQualificationBtn = document.getElementById('addQualificationBtn');
    const qualificationsContainer = document.getElementById('qualifications-container');

    // Function to add a new qualification input
    addQualificationBtn.addEventListener('click', function() {
        const newQualificationRow = document.createElement('div');
        newQualificationRow.classList.add('qualification-row', 'd-flex', 'align-items-center', 'mb-2');

        newQualificationRow.innerHTML = `
            <input type="text" class="form-control me-2" placeholder="Enter your qualification" name="qualification[]" required>
            <button type="button" class="btn btn-danger remove-qualification-btn">X</button>
        `;

        qualificationsContainer.appendChild(newQualificationRow);
        toggleRemoveButtons(); // Update visibility of remove buttons
    });

    // Event delegation to handle removal of qualification rows
    qualificationsContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-qualification-btn')) {
            const qualificationRow = event.target.closest('.qualification-row');
            if (qualificationRow) {
                qualificationRow.remove(); // Remove the specific qualification row
                toggleRemoveButtons(); // Update visibility of remove buttons
            }
        }
    });

    // Function to toggle visibility of remove buttons
        function toggleRemoveButtons() {
            const qualificationRows = qualificationsContainer.getElementsByClassName('qualification-row');
            const removeButtons = qualificationsContainer.querySelectorAll('.remove-qualification-btn');

            // Only show the remove button if there is more than one qualification
            removeButtons.forEach((btn) => {
                if (qualificationRows.length > 1) {
                    btn.style.display = 'inline-block';
                } else {
                    btn.style.display = 'none'; // Hide the button if there's only one qualification
                }
            });
        }
    });

    // Change background color on mouse over
    button.addEventListener('mouseover', function() {
        button.style.backgroundColor = 'limegreen'; // Hover color
        button.style.color = 'black'; // Change text color on hover
    });

    // Revert to original colors when mouse leaves
    button.addEventListener('mouseout', function() {
        button.style.backgroundColor = 'green'; // Original color
        button.style.color = 'white'; // Original text color
    });
    </script>
</body>
</html>
