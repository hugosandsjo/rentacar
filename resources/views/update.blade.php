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
        <form method="POST" action="/bookings/{{ $booking->id }}">
            @csrf
            @method('PATCH')
            <h2>Booking {{ $booking->id }}</h2>

            <!-- Add form fields for each booking attribute that you want to be able to edit -->
            <label for="start_date">Start date:</label>
            <input id="start_date" name="start_date" type="date" value="{{ $booking->start_date }}">

            <label for="end_date">End date:</label>
            <input id="end_date" name="end_date" type="date" value="{{ $booking->end_date }}">

            <label for="passengers">Passengers:</label>
            <input id="passengers" name="passengers" type="number" value="{{ $booking->passengers }}">

            <label for="car_id">Car ID:</label>
            <input id="car_id" name="car_id" type="number" value="{{ $booking->id }}">

            <button type="submit">Save</button>
        </form>
    </div>
@endforeach
<a href="{{ url('/dashboard') }}">BACK</a>
</body>
</html>
