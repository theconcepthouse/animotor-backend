<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCN Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Full viewport height */
        }

        .container {
            max-width: 650px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align: center; color: #343a40;">PCN Notification</h2>

    <p>Dear {{ $pcn->driver->fullname() ?? '' }},</p>
    <p>Here are the details of your PCN:</p>

    <table class="table">
        <tbody>
        <tr>
            <th>Date Post Received</th>
            <td>{{ $pcn->date_post_received ?? ''}}</td>
        </tr>
        <tr>
            <th>VRM</th>
            <td>{{ $pcn->vrm ?? ''}}</td>
        </tr>
        <tr>
            <th>PCN No</th>
            <td>{{ $pcn->pcn_no ?? ''}}</td>
        </tr>
        <tr>
            <th>Date of Issue</th>
            <td>{{ $pcn->date_of_issue ?? ''}}</td>
        </tr>
        <tr>
            <th>Date of Contravention</th>
            <td>{{ $pcn->date_of_contravention ?? ''}}</td>
        </tr>
        <tr>
            <th>Deadline Date</th>
            <td>{{ $pcn->deadline_date ?? ''}}</td>
        </tr>
        <tr>
            <th>Issuing Authority</th>
            <td>{{ $pcn->issuing_authority ?? ''}}</td>
        </tr>
        <tr>
            <th>Priority</th>
            <td>{{ $pcn->priority ?? ''}}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ $pcn->notes ?? ''}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $pcn->status ?? ''}}</td>
        </tr>
        <tr>
            <th>Linkup with Driver</th>
            <td>{{ $pcn->linkup_with_driver ?? ''}}</td>
        </tr>
        <tr>
            <th>Linkup with Vehicle Registration No</th>
            <td>{{ $pcn->linkup_with_vehicle_registration_no ?? ''}}</td>
        </tr>
        <tr>
            <th>Reminder</th>
            <td>{{ $pcn->reminder ?? ''}}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $pcn->type ?? ''}}</td>
        </tr>
        </tbody>
    </table>

    <p>Thank you,</p>
    <p><strong>{{ env('APP_NAME') }}</strong></p>

    <div class="footer">
        &copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.
    </div>
</div>

</body>
</html>
