<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rentacar</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
    <h1>Hello, {{ $user->name }}</h1>
    <a href="{{ url('/logout') }}">LOG OUT</a>
</nav>
<div class="back-div">
<h2 class="back-button"><a href="{{ url('/dashboard') }}"> < BACK</a></h2>
</div>
<section class="update-section">
    @foreach ($user->bookings as $booking)
    <div class="booking-div">
        <form method="POST" action="/bookings/{{ $booking->id }}">
            @csrf
            @method('PATCH')
            <h2>Booking {{ $booking->id }}</h2>

            <!-- Add form fields for each booking attribute that you want to be able to edit -->
            <label for="start_date">Start date:</label>
            <input id="start_date" name="start_date" type="date" value="{{ $booking->start_date }}">

            <label for="end_date">End date:</label>
            <input id="end_date" name="end_date" type="date" value="{{ $booking->end_date }}">

            <label for="passengers">Passengers: {{ $booking->passengers }}</label>
            <input id="passengers" name="passengers" type="hidden" value="{{ $booking->passengers }}">

            <label for="brand">Car: {{ $booking->car->brand }}</label>
            <input id="car_id" name="car_id" type="hidden" value="{{ $booking->car_id }}">

            <label for="model">Model: {{ $booking->car->model }}</label>

            <button type="submit">Save changes</button>
        </form>
    </div>
@endforeach
</section>
<script>
    document.getElementById('start_date').addEventListener('change', function() {
        document.getElementById('end_date').min = this.value;
    });
    </script>
</body>
</html>
