<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Doctor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Container for the layout */
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            gap:100px;
          
        }

        /* Left side: Find Your Doctor form */
        .find-doctor-form {
            flex: 1;
            background-color:white;
            padding:20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            align-items:left;
        }

        .find-doctor-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .find-doctor-form .form-group {
            margin-bottom: 15px;
        }

        .find-doctor-form .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .find-doctor-form .form-group input,
        .find-doctor-form .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .find-doctor-form .submit-btn {
            width: 100%;
            padding: 10px;
            background-color:darkgreen;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .find-doctor-form .submit-btn:hover {
            background-color:limegreen;
        }

        /* Right side: Doctor profiles */
        .doctor-list {
            flex: 3;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .doctor-box {
            background-color: #f1f1f1;
            padding:5px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex-basis: calc(33.333% - 20px);
            height: 180px;
        }

        .doctor-box img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .doctor-box h3 {
            margin-bottom:-20px;
            font-size: 1.2em;
        }

        .doctor-box p {
            margin-bottom: 5px;
            color: #666;
        }

        /* .doctor-box .view-profile {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        } */
        .no-doctors-message {
            text-align: center;
            color: #888; /* Soft gray color for the message */
            font-size: 18px; /* Slightly larger font size */
            margin: 20px 0;
        }

        .doctor-box {
    border: 1px solid #ddd; /* Add a border */
    border-radius: 8px; /* Rounded corners */
    padding: 10px; /* Add padding */
    margin: 10px; /* Space between boxes */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
    background-color: #f9f9f9; /* Default background color */
}

.doctor-box:hover {
    transform: scale(1.05); /* Scale up on hover */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
    background-color: #e9ecef; /* Change background color on hover */
}


        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .doctor-box {
                flex-basis: 100%;
            }
        }

    </style>
</head>
<body>
    <!-- Header Inclusion (assuming you're using a template engine) -->
    @include('header')

    <div class="container">
        <!-- Left Side: Find Your Doctor Form -->
        <div class="find-doctor-form">
            <h2>Find Your Doctor</h2>
            <form id="find-doctor-form">
                <!-- Input field for Name or Specialty -->
                <div class="form-group">
                    <label for="name">Doctor Name </label>
                    <input type="text" id="name" name="name" placeholder="Enter doctor's name">
                </div>

                <!-- Dropdown for Selecting a Specialty -->
                <div class="form-group">
                    <label for="specialty">Specialty</label>
                    <select id="specialty" name="specialty">
                        <option value="">Select Specialty</option>
                        @foreach($Specilities as $specialty)
                        <option value="{{$specialty->id}}">{{$specialty->type}}</option>
                        <!-- Add more specialties as needed -->
                        @endforeach
                    </select>
                </div>

                <!-- Input field for Selecting a Date -->
                <div class="form-group">
                    <label for="date">Available Date</label>
                    <input type="date" id="date" name="date">
                </div>

                <!-- Submit button -->
                <button type="submit" class="submit-btn">Find Your Doctor</button>
            </form>
        </div>

        <!-- Right Side: Doctor Profiles List -->
        <div class="doctor-list" id="doctor-list">
           
        </div>
    </div>

    
    <script>
        $(document).ready(function() {
            // Attach the CSRF token to every AJAX request header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#find-doctor-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: '/patient/find-doctor-result',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#doctor-list').empty(); // Clear previous results
                        if (response.doctors.length > 0) {
                            response.doctors.forEach(function(doctor) {
                                $('#doctor-list').append(`
                                    <div class="doctor-box" data-doctor-id="${doctor.doctor_id}">
                                        <img src="{{ asset('/profile_pictures') }}/${doctor.profile_picture}" alt="Doctor Profile">
                                        <div>
                                            <h3>${doctor.first_name} ${doctor.last_name}</h3>
                                            <b><p style="color:blue">${doctor.specialty}</p></b>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            $('#doctor-list').append('<p style="text-align:center; color:red; font-size: 18px; margin: 20px 0; font-weight: bold;">No doctors found.</p>');

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            });
        });

        $('#doctor-list').on('click', '.doctor-box', function() {
            const doctorId = $(this).data('doctor-id');
            // Navigate to the doctor's profile page
            window.location.href = `/patient/view/booking-information-view/${doctorId}`;
        });
    </script>


</body>
</html>
