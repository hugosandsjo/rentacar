<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <a href="{{ url('/logout') }}">LOG OUT</a>

    @foreach ($user->bookings as $booking)
    <div>
        <h2>Booking {{ $booking->id }}</h2>

        <p>Start date: {{ $booking->start_date}}</p>
        <p>End date: {{ $booking->end_date }}</p>
        <p>Passengers: {{ $booking->passengers }}</p>
        <p>Car ID: {{ $booking->car_id}}</p>
        <button >Edit</button>
        {{-- {{ print_r($booking->start_date)}} --}}
        <!-- Add more fields for each booking attribute -->
    </div>
@endforeach
<a href="{{ url('/dashboard') }}">BACK</a>
</body>
</html>
