<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            text-align: center; /* Centered header */
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
        }
        .invoice-info {
            display: table; /* Use table layout for equal columns */
            width: 100%; /* Full width */
            margin-bottom: 20px;
        }
        .invoice-pay-to, .invoice-to {
            display: table-cell; /* Use table cell for equal width */
            padding: 10px;
            border: 1px solid #eee; /* Optional border for better separation */
            border-radius: 5px; /* Rounded corners */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            width: 50%; /* Ensure both columns take up half the space */
        }
        .invoice-to strong, .invoice-pay-to strong {
            display: block; /* Strong headings on a new line */
            margin-bottom: 5px;
        }
        .invoice-details, .invoice-items {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .invoice-details td, .invoice-items th, .invoice-items td {
            border: 1px solid #eee;
            padding: 8px;
        }
        .invoice-items th {
            background-color: #f7f7f7;
        }
        .total {
            font-weight: bold;
        }
        .logo {
            text-align: center;
            margin-bottom: -20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="logo">
            <img src="{{ public_path('/images/Healthlink-Insurance-Logo.png') }}" width="160px" height="160px" alt="Logo">
        </div>
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>HealthLink Hospital</p>
            <p>No 10 main Road, Panadura, Srilanka</p>
            <p>0332256368</p>
        </div>

        <!-- Combined "Pay To" and "Invoice To" Section in a single table layout -->
        <div class="invoice-info">
            <div class="invoice-pay-to">
                <strong>Pay To:</strong>
                <p>HealthLink Hospital</p>
                <p>No 10 main Road, Panadura</p>
                <p>Srilanka</p>
            </div>

            <div class="invoice-to">
                <strong>Invoice To:</strong>
                <p>{{$patient_first_name}}{{$patient_last_name}}</p>
                <p>{{ $patient_street }}</p>
                <p>{{ $patient_phone_number }}</p>
            </div>
        </div>

        <table class="invoice-details">
            <tr>
                <td><strong>Doctor Name:</strong> {{ $first_name }} {{ $last_name }}</td>
                <td><strong>Patient Name:</strong> {{ $patient_first_name}} {{$patient_last_name}}</td>
            </tr>
            <tr>
                <td><strong>Doctor email:</strong> {{ $doctor_email }}</td>
                <td><strong>Appintment date:</strong> {{ $date }}</td>
            </tr>
            <tr>
                <td><strong>Doctor Contact:</strong> {{ $phone_number }}</td>
                <td><strong>Apppointment time:</strong> {{ $appointment_time}}</td>
            </tr>
            <tr>
            <td><strong>Invoice Date:</strong> {{ now()->format('Y-m-d H:i:s') }}</td>
                <td><strong>Invoice Number:</strong> {{ $appointment_id }}</td>
            </tr>
            <td><strong>Speciality :</strong> {{ $speciality_name }}</td>
    
            </tr>
            
        </table>

        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount (Rs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Consultation Fee</td>
                    <td>{{ number_format($consultation_fee, 2) }}</td>
                </tr>
                <tr>
                    <td>Service Charge</td>
                    <td>{{ number_format($service_charge, 2) }}</td>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <td>{{ number_format($amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <p>Thank you for choosing our hospital services.</p>
    </div>
</body>
</html>
