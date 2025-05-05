<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking information</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
  <style>
   
   body {
            background-color: #f9f9f9;
        }
        .profile-section {
            background-color:#2d5b58;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        .profile-section h2 {
            color: yellow;
        }
        .booking-section {
            padding: 20px;
        }
        .booking-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px; /* Reduced padding */
            margin-bottom: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .booking-box h5 {
            font-size: 16px; /* Adjusted font size */
            margin-bottom: -20px; /* Reduced margin */
        }
        .booking-box p {
            margin-bottom: 5px; /* Reduced space between elements */
        }
        .booking-box .booking-count {
            color:dodgerblue;
            font-weight: bold;
            margin-bottom: 8px; /* Small margin before button */
        }
        .booking-box .btn-book {
            background-color:darkgreen;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .booking-box .btn-book:hover {
            background-color:limegreen;
        }
  </style>
</head>
<body>
@include('header')
<div class="container mt-5">
    <div class="row">
        <!-- Profile Section -->
        <div class="col-md-4">
    <div class="profile-section">
        <img src="{{ asset('/profile_pictures/' . $doctor->profile_picture) }}" class="rounded-circle" alt="Doctor" width="260px">
        <h2>{{ $doctor->first_name }} {{ $doctor->last_name }}</h2>
       

        <p><strong>Professional Qualifications :</strong>
        @if($qualifications->isEmpty())
            N/A
        @else
            {{ $qualifications->pluck('qualification')->implode(', ') }}
        @endif
        </p>

        <p><strong>Areas of Specialisations:</strong> {{$speciality->type ?? 'N/A' }}</p>
        <p><strong>Contact:</strong> {{ $doctor->phone_number ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $doctor_email->email ?? 'N/A' }}</p>
    </div>
</div>

        <!-- Booking Section -->
        <div class="col-md-8">
            <h3 class="mb-4">Booking Information</h3>
            <div class="row">
            @if($schedules->isEmpty())
                <p>No schedule available for this doctor.</p>
            @else
                    @foreach($schedules as $schedule)
                        <div class="col-md-6">
                            <div class="booking-box" data-doctor-id="{{ $doctor->doctor_id }}" data-schedule-id="{{ $schedule->id }}">


                                <h5>{{ \Carbon\Carbon::parse($schedule->date)->format('Y M d') }}</h5>

                                
                                <b><p style="color:crimson;">Appointments: {{ $schedule->appointment_count }}</p></b>

                                <form action="{{route ('booking.session') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="doctor_id" value="{{ $doctor->doctor_id }}">
                                    <input type="hidden" name="schedule_id" value="{{ $schedule->id  }}">
                                    <input type="hidden" name="schedule_date" value="{{ $schedule->date }}">
                                    <input type="hidden" name="appointment_id" value="{{$schedule->id}}">
                                    <button type="submit"  class="btn-book">Book Now</button>
                                </form>

                            </div>
                        </div>
                    @endforeach
            @endif


            </div>
        </div>
    </div>
</div>
</body>
</html>
