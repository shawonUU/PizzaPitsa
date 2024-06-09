<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #ee6e2d;
            color: #ffffff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }
        .header h4 {
            margin: 0;
        }
        .order-status {
            padding: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .order-status h2 {
            margin-top: 0;
        }
        .order-status p {
            margin: 5px 0;
        }
        .footer {
            background-color: #f4f4f4;
            color: #555555;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img style="width: 100px;" src="https://pizzapitsa.fi/frontend/assets/images/logo/2%20pizza%20logo-02.png" alt="Pizzapitsa Logo">
            <h4>Payment Status Update</h4>
        </div>
        <div class="order-status">
            <h2>Your payment status has been updated!</h2>
            <p>Order Number: <strong>#{{ $id }}</strong></p>
            <p>Order Status: <strong>
                @php ;
                    $status = $data->newStatus == '1'?'Paid':'Unpaid';
                @endphp
                {{ $status }}    
            </strong></p>
        </div>
        <div class="footer">
            <p>If you have any questions, please contact us at <a href="mailto:info@pizzapitsa.fi">info@pizzapitsa.fi</a></p>
            <p>&copy; 2024 Pizzapitsa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
