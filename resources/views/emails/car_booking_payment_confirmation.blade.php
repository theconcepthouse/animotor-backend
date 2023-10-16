<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Payment Confirmation</title>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f4f4;">
    <tr>
        <td align="center">
            <table cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; margin: 20px auto;">
                <tr>
                    <td>
                        <table cellpadding="20" cellspacing="0" width="100%">
                            <tr>
                                <td>
                                    <h1 style="color: #333333;">Booking Payment Confirmation</h1>
                                    <p style="margin-top: 20px">Dear {{ $booking?->customer?->name }},</p>
                                    <p>We are delighted to confirm your payment for your upcoming car booking. Thank you for choosing our services.</p>

                                    <h2 style="margin-top: 20px">Booking details:</h2>

                                    <table cellpadding="10" cellspacing="0" width="100%" style="border: 1px solid #ddd; border-radius: 20px; margin-top: 20px; margin-bottom: 20px">
                                        <tr>
                                            <td><strong>Booking Reference:</strong></td>
                                            <td>{{ $booking->reference }}</td>
                                        </tr>

                                        @if($booking->company)
                                            <tr>
                                                <td><strong>Booking Company:</strong></td>
                                                <td>{{ $booking?->company?->name }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td><strong>Car Model:</strong></td>
                                            <td>{{ $booking?->car?->model }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Pick-up Date & Time:</strong></td>
                                            <td>{{ $booking->pick_up_date }} at {{ $booking->pick_up_time }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Return Date & Time:</strong></td>
                                            <td>{{ $booking?->drop_off_date }} at {{ $booking->drop_off_time }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Pick-up Location:</strong></td>
                                            <td>{{ $booking?->pick_location }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Drop-off Location:</strong></td>
                                            <td>{{ $booking?->drop_off_location ?? $booking?->pick_location }}</td>
                                        </tr>
                                        @if($booking?->driver)
                                            <tr>
                                                <td><strong>Driver:</strong></td>
                                                <td>{{ $booking?->driver?->name }}</td>
                                            </tr>
                                        @endif


                                        <tr>
                                            <td><strong>View Details:</strong></td>
                                            <td><a href="{{ route('booking', $booking->id) }}">Booking Info</a> </td>
                                        </tr>

                                    </table>

                                    <div style="margin-top: 30px">
                                        <h2>Payment Details:</h2>
                                        <ul>
                                            <li>Payment Method: {{ $payment->payment_method }}</li>
                                            <li>Payment Amount: ${{ $payment->amount }}</li>
                                            <li>Payment Status: ${{ $payment->payment_status }}</li>
                                        </ul>
                                    </div>

                                    <div style="margin-top: 30px">
                                        <p>Please ensure that you arrive at the pick-up location on time.
                                            If you have any questions or need to make changes to your booking,
                                            feel free to contact our customer support team at
                                          @if($booking->company)
                                                <br/>{{ $booking?->company?->contact_email }} or
                                                <br/>{{ $booking?->company?->contact_phone }}.
                                            @else
                                                <br/>{{ settings('contact_email') }}

                                          @endif

                                        </p>

                                        <p>Safe travels, and we look forward to serving you!</p>

                                        <p>Sincerely,</p>
                                        <p>{{ settings('site_name') }}</p>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
