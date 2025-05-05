<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            display: flex;
            align-items: center;
        }
        .header img {
            width: 60px;
            margin-right: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .details-section {
            width: 48%;
        }
        .details-section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 8px;
        }
        .details-section .field {
            margin-bottom: 10px;
        }
        .details-section .field span {
            display: block;
            color: #555;
            font-weight: bold;
        }
        .summary-footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .summary-footer .total {
            font-size: 18px;
            font-weight: bold;
        }
        .confirm-button {
            background-color: #009688;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Removes the underline */
        }
        .confirm-button:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
    <img src="/images/Healthlink-Insurance-Logo.png" width="160px" height="160px" alt="Logo">
        <h1>Healthlink Hospitals PLC</h1>
    </div>

    <div class="details">
        <div class="details-section">
            <h2>Patient Details</h2>
            <div class="field">
                <span>Name</span>
                {{$booking_data->patient_first_name}}
            </div>
            <div class="field">
                <span>NIC</span>
               {{$booking_data->patient_last_name}}
            </div>
            <div class="field">
                <span>Phone</span>
                {{$booking_data->patient_phone_number}}
            </div>
            <div class="field">
                <span>Email</span>
                {{$booking_data->email}}
            </div>
        </div>

        <div class="details-section">
            <h2>Appointment Details</h2>
            <div class="field">
                <span>Doctor Name</span>
                Dr. {{$booking_data->doctor_first_name}} {{$booking_data->doctor_last_name}}
            </div>
            <div class="field">
                <span>Specialization</span>
                {{$booking_data->specialition}}
            </div>
            <div class="field">
                <span>Appointment Date</span>
                {{$booking_data->date}}
            </div>
            <div class="field">
                <span>Doctor Arrival Time</span>
                {{$booking_data->start_time}}
            </div>
            <div class="field">
                <span>appointment time</span>
                {{$booking_data->appointment_time}}
            </div>
            <div class="field">
                <span>Appointment No</span>
                {{$booking_data->appoinment_number}}
            </div>
        </div>
    </div>

    <div class="summary-footer">
        <div class="total">
            Total Payable (Rs.): <strong>{{$booking_data->amount}}</strong>
        </div>
        <a href="/patient/view/pending-appointments" class="confirm-button">Ok</a>



    </div>
</div>

</body>
</html>
